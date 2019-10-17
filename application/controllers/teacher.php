<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('teacher_model');
		$type = $this->session->userdata('type');
		if(!empty($type)){
			if($type == 0){
				redirect('admin');
			}elseif($type == 2){
				redirect('student');
			}
		}else{
			redirect('home');
		}
	}

	public function index()
	{
		$data = array(
			'page' => 'teacher_dashboard',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes()
		);

		$this->load->view('load/loadt', $data);
	}

	public function class(){
		$data = array(
			'page' => 'classes',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class()
		);

		$this->load->view('load/loadt', $data);
	}

	public function add_class(){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = ''; 
	
		for ($i = 0; $i < 10; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		} 
		$this->form_validation->set_rules('class', 'Class Name', 'required');
		if($this->form_validation->run() == true){
			$data = array(
				'owner' => $this->session->userdata('id'),
				'class' => $this->input->post('class'),
				'code' => $randomString,
				'status' => 1 
			);
			$this->teacher_model->add_class($data);
			$data = array(
				'page' => 'classes',
				'info' => $this->teacher_model->get_info(),
				'class' => $this->teacher_model->get_classes(),
				'Aclass' => $this->teacher_model->get_archived_class(),
				'message' => 'Class Successfully Created',
				'type' => 'alert alert-success'
			);
	
			$this->load->view('load/loadt', $data);
		}else{
			$this->class();
		}
	}

	public function archive_class(){
		$data = array(
			'status' => 0
		);
		$this->teacher_model->archive_class($data, $this->uri->segment(3));
		$data = array(
			'page' => 'classes',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class(),
			'message' => 'Archived Class',
			'type' => 'alert alert-warning'
		);
		$this->load->view('load/loadt', $data);
	}

	public function archived_class(){
		$data = array(
			'page' => 'archived_classes',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class()
		);
		$this->load->view('load/loadt', $data);
	}

	public function restore_class(){
		$data = array(
			'status' => 1
		);
		$this->teacher_model->restore_class($data, $this->uri->segment(3));
		$data = array(
			'page' => 'classes',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class(),
			'message' => 'Restored Class',
			'type' => 'alert alert-success'
		);
		$this->load->view('load/loadt', $data);
	}

	public function update_class(){
		$data = array(
			'page' => 'update_class',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class(),
			'Uclass' => $this->teacher_model->get_class_to_update()
		);
		$this->load->view('load/loadt', $data);
	}

	public function process_update_class(){
		$data = array(
			'class' => $this->input->post('class')
		);
		$this->teacher_model->process_update_class($data, $this->input->post('classID'));
		$data = array(
			'page' => 'classes',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_archived_class(),
			'message' => 'Class Successfully Updated',
			'type' => 'alert alert-success'
		);
		$this->load->view('load/loadt', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	
}
