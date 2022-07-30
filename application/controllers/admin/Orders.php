<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __construct(){
	    parent::__construct();
		if (empty($_SESSION['email']) && is_user_allow('manage_orders') === false) {
			redirect(base_url('login'));
		}
        $this->layout = 'template';
		$this->load->model('admin/Offers_model','offers');
		$this->load->model('admin/Multimedia_model','multimedia');
		$this->load->model('admin/Campaigns_model','campaigns');
		$this->load->model('admin/Orders_model','orders');
	}
	public function index()
    {
		$data = [];
        $where = "campaigns.campaign_id > 0";
        $campaigns = $this->campaigns->get_where('*', $where, true, '', '', '');
        if(!empty($campaigns)){
            $data['campaigns'] = $campaigns;
        }
		$this->load->view('admin/orders/orders', $data);
    }

	public function orders_list()
	{
		$this->layout = '';
/////////////////////////////////////////////
		$data = $row = array();

		// Fetch member's records
		$memData = $this->orders->getRows($_POST);
        $compaingn_id = $this->input->post('compaign_filter');
		//$i = $_POST['start'];
		foreach($memData as $member){
			$singleField = array();
			if(!empty($compaingn_id) && $compaingn_id !== $member->campaign_id){
				continue;
			}
			$slug = $member->offer_slug;
			$offer_url = base_url('/')."product/".$slug."?geo=".strtolower($member->country);
			$free_offer_url = base_url('/')."free/product/".$slug."?geo=".strtolower($member->country);
			$singleField['offer_title'] = $member->offer_title;
			$singleField['offer_price'] = "$".$member->offer_price;
			$singleField['offer_url'] = '<a target="_blank" href="'.$offer_url.'">'.$offer_url.'</a>';
			$singleField['free_offer_url'] = '<a target="_blank" href="'.$free_offer_url.'">'.$free_offer_url.'</a>';
			$singleField['offer_country'] = $member->country;
			$singleField['edit'] = '<button type="button" class="btn btn-primary btn-flat editBtn"  data-toggle="modal" data-target="#edit-offers" data-id="'.$member->offer_id.'">
															Edit
															</button>';
			$singleField['delete'] = '<form class="deleteProduct">
															<input type="hidden" name="offer_id" value="'.$member->offer_id.'">
															<button type="submit" class="btn btn-block btn-danger btn-flat">Delete</button>
														</form>';
			$data[] = $singleField;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->orders->countAll(),
			"recordsFiltered" => $this->orders->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
	
}
