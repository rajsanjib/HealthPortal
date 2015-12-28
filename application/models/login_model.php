<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/26/2015
 * Time: 7:32 PM
 */
class login_model extends CI_Model
{

    /*
     * Validate
     * @ null
     */
    function login($data){
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', $this->input->post('password'));
        $query = $this->db->get('users');

        if($query->num == 1){
            return true;
        } else {
            return false;
        }
    }

    /*
     * Read data using username and password
     */
    public function read_user_information($username){

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

}