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
}

?>