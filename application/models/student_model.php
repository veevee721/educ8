<?php
class Student_model extends CI_Model {
    public function get_info(){
        $this->db->where('userID', $this->session->userdata('id'));
        $query = $this->db->get('student');

        return $query->result();
    }

    public function get_classes(){
        $this->db->select('class.class as class, teacher.fname as fname, teacher.lname as lname, class.code as code, class.status as status, member.status as member, member.id as id');
        $this->db->join('member', 'member.classID = class.id');
        $this->db->join('teacher', 'teacher.userID = class.owner');
        $this->db->where('member.userID', $this->session->userdata('id'));
        $this->db->where('class.status', 1); 
        $query = $this->db->get('class');

        return $query->result();
    }

    public function archived_class(){
        $this->db->select('class.class as class, teacher.fname as fname, teacher.lname as lname, class.code as code, class.status as status, member.status as member, member.id as id');
        $this->db->join('member', 'member.classID = class.id');
        $this->db->join('teacher', 'teacher.userID = class.owner');
        $this->db->where('member.userID', $this->session->userdata('id'));
        $this->db->where('class.status', 1); 
        $query = $this->db->get('class');

        return $query->result();
    }

    public function check_class($code){
        $this->db->where('code', $code);
        $this->db->where('status', 1);
        $query = $this->db->count_all_results('class');

        return $query;
    }

    public function get_class_id($code){
        $this->db->where('code', $code);
        $this->db->where('status', 1);
        $query = $this->db->get('class');

        $id = 0;

        foreach($query->result() as $row){
            $id = $row->id;
        }

        return $id;
    }

    public function check_if_member($classID, $userID){
        $this->db->where('classID', $classID);
        $this->db->where('userID', $userID);
        $this->db->from('member');
        $query = $this->db->count_all_results();

        return $query;
    }

    public function process_join_class($data){
        $this->db->insert('member', $data);

        $data1 = array(
            'action' => 'Joined to a Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function leave_class($data, $id){
        $this->db->where('id', $id);
        $this->db->update('member', $data);

        $data1 = array(
            'action' => 'Left a Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }

    public function return_class($data, $id){
        $this->db->where('id', $id);
        $this->db->update('member', $data);

        $data1 = array(
            'action' => 'Rejoined a Class',
            'userID' => $this->session->userdata('id')
        );
        $this->db->insert('audit', $data1);
    }
}

?>