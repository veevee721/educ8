<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
		parent::__construct();
		#$this->load->model('home_model');
		#$type = $this->session->userdata('type');
		#if($type == 1){
		#	redirect('admin');
		#}elseif($type == 2){
		#	redirect('teacher');
		#}elseif($type == 3){
		#	redirect('student');
		#}
	}

	public function index()
	{
		
	}

	
}
