<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/2/2016
 * Time: 8:29 AM
 */
class doctor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /***
     * Returns information on a doctor for a given doc id
     * @param $doc_id
     * @return mixed
     */
    function doc_info($doc_id){
        $this->db->select("*");
        $this->db->where('doctor_id', $doc_id);
        $query = $this->db->get('doctors');

        return $query->result_array();
    }

}