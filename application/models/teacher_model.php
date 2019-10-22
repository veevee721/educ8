<?php
class Teacher_model extends CI_Model {
    public function get_info(){
        $this->db->where('userID', $this->session->userdata('id'));
        $query = $this->db->get('teacher');

        return $query->result();
    }

    public function get_classes(){
        $this->db->where('owner', $this->session->userdata('id'));
        $this->db->where('status', 1);
        $query = $this->db->get('class');

        return $query->result();
    }
    
    public function add_class($data){
        $this->db->insert('class', $data);

        $data1 = array(
            'action' => 'Added Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function archive_class($data, $class){
        $this->db->where('id', $class);
        $this->db->update('class', $data);

        $data1 = array(
            'action' => 'Archived Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_archived_class(){
        $this->db->where('owner', $this->session->userdata('id'));
        $this->db->where('status', 0);
        $query = $this->db->get('class');

        return $query->result();
    }

    public function restore_class($data, $class){
        $this->db->where('id', $class);
        $this->db->update('class', $data);

        $data1 = array(
            'action' => 'Restored Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_class_to_update(){
        $this->db->where('id', $this->uri->segment(3));
        $query = $this->db->get('class');

        return $query->result();
    }

    public function process_update_class($data, $id){
        $this->db->where('id', $id);
        $this->db->update('class', $data);

        $data1 = array(
            'action' => 'Updated Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_active_class($id){
        $this->db->where('id', $id);
        $query = $this->db->get('class');

        return $query->result();
    }

    public function get_class_members($id){
        $this->db->where('member.classID', $id);
        $this->db->join('student', 'student.userID = member.userID');
        $this->db->select('student.userID as id, student.fname as fname, student.lname as lname, student.image as image, student.gender as gender, student.bdate as bdate, member.status as status');
        $query = $this->db->get('member');

        return $query->result();
    }

    public function accept_member($data, $classID, $userID){
        $this->db->where('classID', $classID);
        $this->db->where('userID', $userID);
        $this->db->update('member', $data);

        $data1 = array(
            'action' => 'Accepted a Member of the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function remove_member($data, $classID, $userID){
        $this->db->where('classID', $classID);
        $this->db->where('userID', $userID);
        $this->db->update('member', $data);

        $data1 = array(
            'action' => 'Removed a Member of the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_class_lessons($id){
        $this->db->where('classID', $id);
        $query = $this->db->get('lesson');

        return $query->result();
    }

    public function get_class_lesson($id){
        $this->db->where('id', $id);
        $query = $this->db->get('lesson');

        return $query->result();
    }

    public function add_lesson($data){
        $this->db->insert('lesson', $data);

        $data1 = array(
            'action' => 'Add Lesson to the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function archive_lesson($data, $classID, $id){
        $this->db->where('classID', $classID);
        $this->db->where('id', $id);
        $this->db->update('lesson', $data);

        $data1 = array(
            'action' => 'Archived a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function active_lesson($data, $classID, $id){
        $this->db->where('classID', $classID);
        $this->db->where('id', $id);
        $this->db->update('lesson', $data);

        $data1 = array(
            'action' => 'Activated a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_lesson_resources($lessonID){
        $this->db->where('lessonID', $lessonID);
        $query = $this->db->get('resources');

        return $query->result();
    }

    public function get_class_name($classID){
        $this->db->where('id', $classID);
        $query = $this->db->get('class');
        $title = '';

        foreach($query->result() as $row){
            $title = $row->class;
        }

        return $title;
    }

    public function add_resources($data){
        $this->db->insert('resources', $data);

        $data1 = array(
            'action' => 'Added Resources to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function archive_resource($data, $id){
        $this->db->where('id', $id);
        $this->db->update('resources', $data);

        $data1 = array(
            'action' => 'Archived a Resource to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }
    
    public function activate_resource($data, $id){
        $this->db->where('id', $id);
        $this->db->update('resources', $data);

        $data1 = array(
            'action' => 'Activated a Resource to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_questions($lessonID){
        $this->db->where('lessonID', $lessonID);
        $query = $this->db->get('assessment');

        return $query->result();
    }

    public function add_question($data){
        $this->db->insert('assessment', $data);

        $data1 = array(
            'action' => 'Activated a Resource to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function archive_question($data, $id){
        $this->db->where('id', $id);
        $this->db->update('assessment', $data);

        $data1 = array(
            'action' => 'Archived a Assessment to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }
    
    public function activate_question($data, $id){
        $this->db->where('id', $id);
        $this->db->update('assessment', $data);

        $data1 = array(
            'action' => 'Activated a Assessment to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function get_question($assessmentID){
        $this->db->where('id', $assessmentID);
        $query = $this->db->get('assessment');
        $question = '';
        foreach($query->result() as $row){
            $question = $row->question;
        }

        return $question;
    }

    public function get_choices($assessmentID){
        $this->db->where('assessmentID', $assessmentID);
        $query = $this->db->get('choices');

        return $query->result();
    }

    public function add_choices($data){
        $this->db->insert('choices', $data);

        $data1 = array(
            'action' => 'Added Choices to a Assessment Question to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function archive_choice($data, $id){
        $this->db->where('id', $id);
        $this->db->update('choices', $data);

        $data1 = array(
            'action' => 'Archived a Choice for the Assessment to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }
    
    public function activate_choice($data, $id){
        $this->db->where('id', $id);
        $this->db->update('choices', $data);

        $data1 = array(
            'action' => 'Activated a Choice for the Assessment to a Lesson in the Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }
}

?>