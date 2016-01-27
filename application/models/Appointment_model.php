<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/2/2016
 * Time: 8:26 AM
 */
class Appointment_model extends CI_Model
{
    public function __construct()
    {

        parent::__construct();

        $this->load->database();
    }

    /**
     * @param $appointment_data
     * @return bool
     */
    public function register_appointment($appointment_data){

        $query = $this->db->insert('appointments',$appointment_data);
        if(!$query){
            return false;
        } else return true;
    }

    public function get_unapproved_appointments($doctor_id){

        $this->db->select('*');
        $this->db->where('doctor_id',$doctor_id);
        $this->db->where('approved',NULL);
        $query = $this->db->get('appointments');

        return $query;
    }

    public function approve_appointment($appointment_id, $user_id){

        $this->db->where('id', $appointment_id);
        if($this->db->update('appointments',array('approved' => 1)))
            return true;
        return false;
    }

}