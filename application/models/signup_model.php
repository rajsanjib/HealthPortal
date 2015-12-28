<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/25/2015
 * Time: 7:28 PM
 */

class signup_model extends CI_Model
{

    public $signup_data = array();
    public $matched_data = array();

    function __construct()
    {
        parent::__construct();

    }

    /*
     * Check to see if input username and email are available
     */
    public function validate(){
        $this->collect_all_fields();

        $query = "SELSECT * FROM `doctors`";
        $query .= "WHERE 'first_name' = ? AND
                    'last_name' = ? AND
                    `username` = ? AND
                    'email' = ? AND
                    'password' = ?";

        $result = $this->db->query($query, $this->signup_data);


        if($result->num_rows >= 1){
            $this->collect_matched_fields($result); // matched username or email found
            return $this->matched_data;
        } else {
            return $this->signup_data; // return signup data to be re-shown in the form
        }
    }

    public function collect_matched_fields($query){
        foreach($query->result as $row){
            if($row['username'] == $this->signup_data['username']){
                $this->matched_data['username'] = $row['username'];
            }
            elseif($row['email'] == $this->signup_data['email']){
                $this->matched_data['email'] = $row['email'];
            }
        }
        return;
    }

    private function collect_all_fields(){
        $this->signup_data['first_name'] = $this->input->post('first_name');
        $this->signup_data['last_name'] = $this->input->post('last_name');
        $this->signup_data['username'] = $this->input->post('username');
        $this->signup_data['email'] = $this->input->post('email');
        $this->signup_data['password'] = $this->input->post(md5('username'));

    }

    /*
     * Inserts collected inputs form signup form to the database
     */
    public function insert_into_db(){
        if($this->db->insert('doctors',$this->signup_data)){ return true;
        } else {return false;}

    }

}