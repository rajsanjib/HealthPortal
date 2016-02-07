<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/30/2016
 * Time: 4:34 PM
 */
class Comments_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function fetch_comments($ds_id) {

        $this->db->select('*');
        $this->db->where('qs_id',$ds_id);
        $result = $this->db->get('comments');

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function new_comment($comment_data){

        if($this->db->insert('comments',$comment_data)){ return $this->db->insert_id(); }
        else return false;

    }

}