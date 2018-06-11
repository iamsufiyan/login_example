<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
    public function registration_insert($data) {

// Query to check whether username already exist or not
        $condition = "user_name =" . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {

// Query to insert data in database
            $this->db->insert('user_login', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($data) {

        $condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function check($id) {
        $query = $this->db->query("SELECT * FROM user_login where id='$id'");
        return $query->result();
    }

    public function earned_p1($createdby) {
        $query = $this->db->query("SELECT * FROM user_login where id='$createdby'");
        return $query->result();
    }

    public function get_username($id) {
        $query = $this->db->query("SELECT * FROM user_login where createdby='$id'");
        return $query->result();
    }

    public function insert_points($data2) {
        $q = $this->db->insert('wallet', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_points2($data2) {
        $q = $this->db->insert('wallet', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_points3($data2) {
        $q = $this->db->insert('wallet', $data2);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function sel_points($id) {
        $query = $this->db->query("SELECT points FROM wallet where user_ref='$id'");
        return $query->result();
    }

    public function check_count($id) {
        $query = $this->db->query("select count(id) as count from user_login where createdby='$id'");
        return $query->result();
    }

    public function get_points($id) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where user_ref='$id'");
        return $query->result();
    }
    public function get_poin($points, $user_ref) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where points='$points' and user_ref='$user_ref'");
        return $query->result();
    }

    public function get_all($user_ref) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where user_ref='$user_ref'");
        return $query->result();
    }
    
    public function get_first_level($id) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where user_ref='$id' and points = 3");
        return $query->result();
    }

    public function get_second_level($id) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where user_ref='$id' and points = 2");
        return $query->result();
    }

    public function get_third_level($id) {
        $query = $this->db->query("SELECT * FROM wallet JOIN user_login ON wallet.name=user_login.user_name where user_ref='$id' and points = 1");
        return $query->result();
    }
    public function get_name($createdy){
        $query = $this->db->query("SELECT user_name FROM user_login where id='$createdy'");
        return $query->result();
    }

}

?>