<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once('vendor/autoload.php');

use SecurionPay\SecurionPayGateway;
use SecurionPay\Exception\SecurionPayException;

class Home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->layout = 'digital_layout2';
		$this->load->model('admin/products_model','pmodel');
		$this->load->library('session');
    $this->load->library('cart');

	}
	public function index(){
		$this->layout = 'digital_layout';
		$this->load->view('pages/index');
	}

	public function pricingtable(){
		$result['data'] = $this->pmodel->showdata();
		$this->load->view('pages/pricingtable',$result);
	}
/// cart functionality start
	public function cartdata(){
		$this->layout = '';
		$data= [];
		$data['response'] = false;
		// $data['image_errors'] ="";
		$formdata = $this->input->post();

		// print_r($formdata);

		// exit;


	// 	$data = array(
	// 	  'id'      => $formdata['pkg_id'],
	// 	  'name'      => $formdata['pro_name']
		 
	// );

	$data = array(
        'id'      =>  $formdata['pkg_id'],
        'qty'     => 1,
        'price'   => 39.95,
        'name'    => $formdata['pro_name'],
        'coupon'         => 'XMAS-50OFF'
);

	// print_r($this->cart->contents());
	 $this->cart->insert($data);

	}
// update cart





public function updatecart()
{
  $formdata = $this->input->post();
  $this->cart->update($formdata);
  redirect('home/showcart');
  print_r($formdata);
exit;
}

	public function showcart(){
		$this->load->view('pages/showcart');
	}

	public function services(){
		$this->load->view('pages/ourservice');
	}
	public function contactus(){
		$this->load->view('pages/contactus');
	}
	public function aboutus(){
		$this->load->view('pages/aboutus');
	}
	public function blog(){
		$this->load->view('pages/blog');
	}
	public function faq(){
		$this->load->view('pages/faq');
	}
	public function ourteam(){
		$this->load->view('pages/ourteam');
	}
	public function portfolio(){
		$this->load->view('pages/portfolio');
	}
	
	public function logodesign(){
		$this->load->view('pages/logodesign');
	}
	public function bannerdesign(){
		$this->load->view('pages/bannerdesign');
	}
	public function businesscard(){
		$this->load->view('pages/businesscard');
	}
	public function signagedesign(){
		$this->load->view('pages/signageddesign');
	}
	public function tshirtdesign(){
		$this->load->view('pages/tshirtdesign');
	}
	public function socialmediadesign(){
		$this->load->view('pages/socialmediadesign');
	}
	public function bookcover(){
		$this->load->view('pages/bookcover');
	}
	public function labledesign(){
		$this->load->view('pages/labledesign');
	}
	public function stationarydesign(){
		$this->load->view('pages/stationarydesign');
	}
	public function howitworks(){
		$this->load->view('pages/howitworks');
	}
	public function blogdetails(){
		$this->load->view('pages/blogdetails');
	}
	public function useragreement(){
		$this->load->view('pages/useragreement');
	}

	public function privacypolicy(){
		$this->load->view('pages/privacypolicy');
	}




}
