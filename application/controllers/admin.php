<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$type = $this->session->userdata('type');
		if(!empty($type)){
			if($type == 2){
				redirect('student');
			}elseif($type == 1){
				redirect('teacher');
			}
		}else{
			redirect('home');
		}
	}

	public function index()
	{
		echo 'admin';	
	}

	
}
