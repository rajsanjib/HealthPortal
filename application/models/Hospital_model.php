<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/8/2016
 * Time: 10:44 PM
 */
class Hospital_model extends CI_Model
{
    public function __construct(){

        parent::__construct();
        $this->load->database();
    }

    /**
     * Return array of rows of all hospitals in the database
     * @return mixed
     */
    public function get_hospitals(){

        $this->db->select('*');
        $query = $this->db->get('hospitals');
        return $query;
    }

    /**
     * Returns hospital by id
     * @param $hospital_id
     * @return mixed
     */
    public function get_hospital($hospital_id){
        $this->db->where('id',$hospital_id);
        $query = $this->db->get('hospitals');
        return $query;
    }

    public function get_hospital_by_name($name){
        $this->db->like('name',$name);
        $query = $this->db->get('hospitals');
        return $query;
    }

    public function get_hospital_by_location($location){
        $this->db->like('location',$location);
        $query = $this->db->get('hospitals');
        return $query;
    }

    public function get_specialities(){
        $this->db->select('specialities');
        $query = $this->db->get('hospitals');
        return $query;
    }

    public function get_address(){
        $this->db->select('address');
        $query = $this->db->get('hospitals');
        return $query;
    }
}