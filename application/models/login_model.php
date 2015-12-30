<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/26/2015
 * Time: 7:32 PM
 */
class Login_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Validate
     * @ null
     */
    public function login($data){
        $this->db->select('password');
        $this->db->where('username', $data['username']);
        $this->db->from('doctors');
        $hash = $this->db->get()->row('password');

        return $this->verify_password_hash($data['password'], $hash );
    }

    /*
     * Read data using username and password
     */
    public function read_user_information($username){

        $condition = "user_name =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('doctors');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    /**
     * verify_password_hash function.
     *
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {

        return password_verify($password, $hash);

    }
}