<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('teacher_model');
		$this->load->library('upload');
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
			mkdir("resources/".$this->input->post('class'), 0700);
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

	public function classes(){
		$data = array(
			'page' => 'active_class',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3))
		);

		$this->load->view('load/loadt', $data);
	}

	public function class_members(){
		$data = array(
			'page' => 'members',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3)),
			'members' => $this->teacher_model->get_class_members($this->uri->segment(3)),

		);

		$this->load->view('load/loadt', $data);
	}

	public function accept_member(){
		$data = array(
			'status' => 1
		);

		$this->teacher_model->accept_member($data, $this->uri->segment(3), $this->uri->segment(4));
		redirect('teacher/class_members/'.$this->uri->segment(3).'/ok');
	}

	public function remove_member(){
		$data = array(
			'status' => 2
		);

		$this->teacher_model->accept_member($data, $this->uri->segment(3), $this->uri->segment(4));
		redirect('teacher/class_members/'.$this->uri->segment(3).'/no');
	}

	public function class_lesson(){
		$data = array(
			'page' => 'lessons',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3)),
			'lessons' => $this->teacher_model->get_class_lessons($this->uri->segment(3)),

		);

		$this->load->view('load/loadt', $data);
	}

	public function add_lesson(){
		$data = array(
			'lesson' => $this->input->post('lesson'),
			'status' => 1,
			'classID' => $this->input->post('classID')
		);
		$this->teacher_model->add_lesson($data);
		redirect('teacher/class_lesson/'.$this->input->post('classID').'/ok');
	}

	public function archive_lesson(){
		$data = array(
			'status' => 0
		);

		$this->teacher_model->archive_lesson($data, $this->uri->segment(3), $this->uri->segment(4));
		redirect('teacher/class_lesson/'.$this->uri->segment(3).'/b');
	}

	public function active_lesson(){
		$data = array(
			'status' => 1
		);

		$this->teacher_model->active_lesson($data, $this->uri->segment(3), $this->uri->segment(4));
		redirect('teacher/class_lesson/'.$this->uri->segment(3).'/a');
	}

	public function add_resources(){
		$data = array(
			'page' => 'resources',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3)),
			'lesson' => $this->teacher_model->get_class_lesson($this->uri->segment(4)),
			'resources' => $this->teacher_model->get_lesson_resources($this->uri->segment(4))

		);

		$this->load->view('load/loadt', $data);
	}

	public function process_add_resources(){
		$class = $this->teacher_model->get_class_name($this->input->post('classID'));
		$config['upload_path'] = './resources/'.$class.'/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|avi|mpg|mpeg|pdf|ppt|pptx|doc|docx';
		$config['max_size'] = 25000000;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('userfile')){
			redirect('teacher/add_resources/'.$this->input->post('classID').'/'.$this->input->post('lessonID').'/no');
        }
        else
        {
			$upload = $this->upload->data();
			$data = array(
				'file' => $upload['file_name'],
				'type' => $upload['file_ext'],
				'lessonID' => $this->input->post('lessonID'),
				'status' => 1
			);
			$this->teacher_model->add_resources($data);
			redirect('teacher/add_resources/'.$this->input->post('classID').'/'.$this->input->post('lessonID').'/ok');
        }
	}

	public function archive_resource(){
		$data = array(
			'status' => 0
		);

		$this->teacher_model->archive_resource($data, $this->uri->segment(5));
		redirect('teacher/add_resources/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/b');
	}

	public function active_resource(){
		$data = array(
			'status' => 1
		);

		$this->teacher_model->activate_resource($data, $this->uri->segment(5));
		redirect('teacher/add_resources/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/a');
	}

	public function class_assessment(){
		$data = array(
			'page' => 'assessment',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3)),
			'lessons' => $this->teacher_model->get_class_lessons($this->uri->segment(3)),

		);

		$this->load->view('load/loadt', $data);
	}

	public function assessment_lesson(){
		$data = array(
			'page' => 'list_questions',
			'info' => $this->teacher_model->get_info(),
			'class' => $this->teacher_model->get_classes(),
			'Aclass' => $this->teacher_model->get_active_class($this->uri->segment(3)),
			'lesson' => $this->teacher_model->get_class_lesson($this->uri->segment(4)),
			'questions' => $this->teacher_model->get_questions($this->uri->segment(4))
		);

		$this->load->view('load/loadt', $data);
	}

	public function process_add_assessment(){
		$data = array(
			'question' => $this->input->post('question'),
			'lessonID' => $this->input->post('lessonID'),
			'status' => 1
		);
		$this->teacher_model->add_question($data);

		redirect('teacher/assessment_lesson/'.$this->input->post('classID').'/'.$this->input->post('lessonID').'/ok');
	}

	public function archive_question(){
		$data = array(
			'status' => 0
		);

		$this->teacher_model->archive_question($data, $this->uri->segment(5));
		redirect('teacher/assessment_lesson/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/b');
	}

	public function active_question(){
		$data = array(
			'status' => 1
		);

		$this->teacher_model->activate_question($data, $this->uri->segment(5));
		redirect('teacher/assessment_lesson/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/a');
	}

	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

	
}
