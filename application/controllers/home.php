<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('home_model');
		$type = $this->session->userdata('type');
		if($type == 1){
			redirect('admin');
		}elseif($type == 2){
			redirect('teacher');
		}elseif($type == 3){
			redirect('student');
		}
	}

	public function index()
	{
		$data = array(
			'page' => 'home'
		);
        $this->load->view('load/load', $data);
	}

	public function login(){
		$data = array(
			'page' => 'login'
		);
        $this->load->view('load/loadl', $data);
	}

	public function register(){
		$data = array(
			'page' => 'register'
		);
        $this->load->view('load/loadr', $data);
	}

	public function about_us()
	{
		$data = array(
			'page' => 'about'
		);
        $this->load->view('load/load', $data);
	}

	public function contact_us()
	{
		$data = array(
			'page' => 'contact'
		);
        $this->load->view('load/load', $data);
	}

	public function register_process(){
		$this->form_validation->set_rules('username', 'Username', 'is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[8]');
		if($this->form_validation->run() == true){
			
			if($this->input->post('password') == $this->input->post('confpassword')){
				$data = array(
					'username' => $this->input->post('username'),
					'password' => md5($this->input->post('password')),
					'role' => $this->input->post('role'),
					'status' => 1
				);
				if($this->input->post('role') == 2){
					$data1 = array(
						'userID' => $this->home_model->add_user($data),
						'fname' => $this->input->post('fname'),
						'lname' => $this->input->post('lname'),
						'gender' => $this->input->post('gender'),
						'grade' => $this->input->post('grade'),
						'bdate' => $this->input->post('bdate'),
						'email' => $this->input->post('email'),
						
					);
					$this->home_model->add_student($data1);
				}else{
					$data1 = array(
						'userID' => $this->home_model->add_user($data),
						'fname' => $this->input->post('fname'),
						'lname' => $this->input->post('lname'),
						'gender' => $this->input->post('gender'),
						'bdate' => $this->input->post('bdate'),
						'email' => $this->input->post('email'),
						
					);
					$this->home_model->add_teacher($data1);
				}
				$pdata = array(
					'page' => 'register',
					'type' => 'alert alert-success',
					'message' => 'Account Successfully Created'
				);
				$this->load->view('load/loadr', $pdata);
			}else{
				$pdata = array(
					'page' => 'register',
					'type' => 'alert alert-danger',
					'message' => 'Please Confirm Password'
				);
				$this->load->view('load/loadr', $pdata);
			}

			
			
		}else{
			$this->register();
		}
	
	}

	public function login_process(){
		$chk = $this->home_model->login_process($this->input->post('username'), md5($this->input->post('password')));
		switch($chk){
			case 0:
				redirect('admin');
				break;
			case 1:
				redirect('teacher');
				break;
			case 2:
				redirect('student');
				break;
		}
		
		
	}
}
