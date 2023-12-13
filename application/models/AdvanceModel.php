<?php
class AdvanceModel extends CI_Model{

    public function isUserExists($email, $username) {
        // Check if the user with the given email or username already exists
        $this->db->where('email', $email);
        $this->db->or_where('username', $username);
        $query = $this->db->get('users');

        return $query->num_rows() > 0;
    }

    public function signup($data){
        return $this->db->insert('users', $data);
    }

    public function login_user($username, $password){
        return $this->db->get_where('users',['username'=>$username, 'password'=>$password ]);

    }

    

}