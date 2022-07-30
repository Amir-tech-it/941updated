<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function __construct(){
	    parent::__construct();
		if (empty($_SESSION['email']) && is_user_allow('manage_products') === false) {
			redirect(base_url('login'));
		}
        $this->layout = 'template';
		$this->load->model('admin/products_model','pmodel');
		$this->load->model('admin/Offers_model','offers');
		$this->load->model('admin/Multimedia_model','multimedia');
		$this->load->model('admin/Campaigns_model','campaigns');
	}
	public function offers()
    {
		$data = [];
        $where = "campaigns.campaign_id > 0";
        $campaigns = $this->campaigns->get_where('*', $where, true, '', '', '');
        if(!empty($campaigns)){
            $data['campaigns'] = $campaigns;
        }
		$offers = $this->offers->list();
        if(!empty($offers)){
            $data['offers'] = $offers;
        }
		$this->load->view('admin/offers/offers', $data);
    }
    

	//register package amir

	public function register(){	
		$data= [];
		$data['response'] = false;
		if(!$this->input->is_ajax_request()) {
		exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('offertitle','Email','required');
		$this->form_validation->set_rules('feature1','Feature 1','required');
		$this->form_validation->set_rules('feature2','Feature 2','required');
		$this->form_validation->set_rules('feature3','Feature 3','required');
		$this->form_validation->set_rules('feature4','Feature 4','required');
		$this->form_validation->set_rules('feature5','Feature 5','required');
		   if($this->form_validation->run() == false){
		  $data['form_errors'] = $this->form_validation->error_array();
			   $this->load->view('signup',$data); 
		   }
		  else { 
		   $formdata = $this->input->post(); 
			$response=$this->pmodel->register_user($formdata);
			if($response==true){	
	           $data['response'] = true;
				$data['redirect_url'] = "admin/showoffers";
				$data['success']  = "Added Successfully!";
			  }
			}
		echo json_encode($data);
		exit;
	   }	


	   //show package amir
	   public function view(){
        $result['data'] = $this->pmodel->showdata();
        $this->load->view('admin/showoffers',$result);
      }

      //edit package amir
	  public function edit(){ 
		 $data = "";
	     $id = $this->input->get('edit');
	   $result['data'] = $this->pmodel->showdatabyid($id);
	   $databyid = $this->load->view('admin/editpackages', $result);
	  }
   


	  //update package amir
	  public function update(){
		$data= [];
		$data['response'] = false;
	    $formdata = $this->input->post();
        $id = $formdata['id'];
		unset($formdata['id']);
		if(!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}
		$this->form_validation->set_rules('offertitle','Email','required');
		$this->form_validation->set_rules('feature1','Feature 1','required');
		$this->form_validation->set_rules('feature2','Feature 2','required');
		$this->form_validation->set_rules('feature3','Feature 3','required');
		$this->form_validation->set_rules('feature4','Feature 4','required');
		$this->form_validation->set_rules('feature5','Feature 5','required');
	     if($this->form_validation->run() == false){
		  $data['form_errors'] = $this->form_validation->error_array();
			$this->load->view('admin/editpackages',$data); 
		   }
		 else { 
		   $formdata = $this->input->post();
		   $response=$this->pmodel->updaterecord($formdata,$id);
	     if($response==true){	
	         $data['response'] = true;
				$data['redirect_url'] = "admin/showoffers";
				$data['success']  = "Updated pacakge Successfully!";
			  }
			}
		echo json_encode($data);
		exit;
	   }

	  //delete package amir
	  public function delete(){
		$id = $this->input->get('del');
		$deldata = $this->pmodel->deletebyid($id);
		if($deldata==true){
				echo "Package deleted Successfully";
		}
		else{
			echo "Package Not deleted";
		}
	   }	
}
