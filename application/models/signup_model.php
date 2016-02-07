<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/25/2015
 * Time: 7:28 PM
 */

class Signup_model extends CI_Model
{

    public $matched_data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /*
     * Check to see if input username and email are available
     * Return true if duplicate found
     */
    public function check_for_duplicate($username){
        $this->db->where('username', $username);
        $result = $this->db->get('login');
        if($result->num_rows() >= 1){
            return true;
        } else {
            return false;
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
    }



    /*
     * Inserts collected inputs form signup form to the database
     */
    public function insert_into_db($signup_data){

        if($this->db->insert('login',$signup_data)){ return true;
        } else {return false;}
    }

}