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

    function search_doctors($search_array){

        if($search_array['name']){$this->db->like('name', $search_array['name']);}
        if($search_array['address']){$this->db->like('address',$search_array['address']);}
        if($search_array['qualification']){$this->db->like('qualification',$search_array['qualification']);}
        if($search_array['rating']){$this->db->where('rating',$search_array['rating']);}

        $results = $this->db->get('doctors');

        return $results;
    }

    public function get_doctor_name($doctor_id){

        $this->db->select('name');
        $this->db->where('id',$doctor_id);
        $query = $this->db->get('doctors');
        return $query;
    }

    public function get_specialities(){
        $this->db->select('specialities');
        $query = $this->db->get('doctors');
        return $query;
    }

    public function get_address(){
        $this->db->select('address');
        $query = $this->db->get('doctors');
        return $query;
    }

    public function get_hospital(){
        $this->db->select('hospital');
        $query = $this->db->get('doctors');
        return $query;
    }
}