<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$type = $this->session->userdata('type');
		if(!empty($type)){
			if($type == 0){
				redirect('admin');
			}elseif($type == 1){
				redirect('teacher');
			}
		}else{
			redirect('home');
		}
		
	}

	public function index()
	{
		echo 'student';
	}

	
}
