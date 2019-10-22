<?php
class Home_model extends CI_Model {
    public function add_user($data){
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function add_teacher($data){
        $this->db->insert('teacher', $data);
    }

    public function add_student($data){
        $this->db->insert('student', $data);
    }

    public function login_process($username, $password){
        $this->db->where('username', $username);
        $this->db->password('password', $password);
        $query = $this->db->get('user');
        $role = 0;

        foreach($query->result() as $row){
            $data = array(
                'type' => $row->role,
                'id' => $row->id
            );
            $role = $row->role;
        }

        $this->session->user_data($data);

        return $role;
    }
}
