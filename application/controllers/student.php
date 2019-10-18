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
		$data = array(
			'page' => 'student_dashboard',
			'info' => $this->student_model->get_info(),
			'class' => $this->student_model->get_classes()
		);

		$this->load->view('load/loads', $data);
	}

	public function join_class(){
		$data = array(
			'page' => 'my_class',
			'info' => $this->student_model->get_info(),
			'class' => $this->student_model->get_classes(),
			'Aclass' => $this->student_model->archived_class()
		);

		$this->load->view('load/loads', $data);
	}

	public function process_join_class(){
		$this->form_validation->set_rules('code', 'Class Code', 'required');
		if($this->form_validation->run() == true){
			$chk = $this->student_model->check_class($this->input->post('code'));
			if($chk == 1){
				$member = $this->student_model->check_if_member($this->student_model->get_class_id($this->input->post('code')), $this->session->userdata('id'));
				if($member == 0){
					$data1 = array(
						'userID' => $this->session->userdata('id'),
						'status' => 0,
						'classID' => $this->student_model->get_class_id($this->input->post('code'))
					);
					$this->student_model->process_join_class($data1);
					$data2 = array(
						'page' => 'my_class',
						'info' => $this->student_model->get_info(),
						'class' => $this->student_model->get_classes(),
						'Aclass' => $this->student_model->archived_class(),
						'message' => 'Successfully Joined a Class',
						'type' => 'alert alert-success'
					);
			
					$this->load->view('load/loads', $data2);
				}else{
					$data3 = array(
						'page' => 'my_class',
						'info' => $this->student_model->get_info(),
						'class' => $this->student_model->get_classes(),
						'Aclass' => $this->student_model->archived_class(),
						'message' => 'Already a Member of the Class',
						'type' => 'alert alert-warning'
					);
			
					$this->load->view('load/loads', $data3);
				}
			}else{
				$data = array(
					'page' => 'my_class',
					'info' => $this->student_model->get_info(),
					'class' => $this->student_model->get_classes(),
					'Aclass' => $this->student_model->archived_class(),
					'message' => 'Class Code Incorrect. Class Not Found!',
					'type' => 'alert alert-danger'
				);
		
				$this->load->view('load/loads', $data);
			}
		}else{
			$this->join_class();
		}
	}

	public function leave_class(){
		$data = array(
			'status' => 2
		);
		$this->student_model->leave_class($data, $this->uri->segment(3));


		$data = array(
			'page' => 'my_class',
			'info' => $this->student_model->get_info(),
			'class' => $this->student_model->get_classes(),
			'Aclass' => $this->student_model->archived_class(),
			'message' => 'You Left the Class',
			'type' => 'alert alert-danger'
		);

		$this->load->view('load/loads', $data);
	}

	public function archived_class(){
		$data = array(
			'page' => 'my_archived_class',
			'info' => $this->student_model->get_info(),
			'class' => $this->student_model->get_classes(),
			'Aclass' => $this->student_model->archived_class()
		);

		$this->load->view('load/loads', $data);
	}

	public function return_class(){
		$data = array(
			'status' => 0
		);

		$this->student_model->return_class($data, $this->uri->segment(3));


		$data = array(
			'page' => 'my_class',
			'info' => $this->student_model->get_info(),
			'class' => $this->student_model->get_classes(),
			'Aclass' => $this->student_model->archived_class(),
			'message' => 'You Rejoined the Class',
			'type' => 'alert alert-success'
		);

		$this->load->view('load/loads', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	
}
