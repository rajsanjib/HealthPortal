<?php
/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/16/2016
 * Time: 6:28 PM
 */

class Appointment_doctor_dashboard extends MY_Controller{

    static $user_id;
    static $date;

    function __construct()
    {
        parent::__construct();

        // Models
        $this->load->model('Doctor_model');
        $this->load->model('Schedule_model');
        $this->load->model('user_model');

        // Initialize static variables
        appointments::$user_id = $this->User_model->get_user_id();
        appointments::$date = $this->date();
    }

    public function index(){
            $not_approved = $this->Appointment_model->get_appointment_by_approval(NOT_APPROVED);
            $appoinements_today = $this->Appointment_model->get_appointment_by_date_of_appointment(date());
            $coming_appoinments = $this->Appointment_model->get_appointment_by_date_of_appointment(date());

            $this->load->view('modules/appointment/appointment_request');
            $this->load->view('modules/appointment/appointments_today');
            $this->load->view('modules/appointment/appointments_tomorrow');
        }
    /**
     * @param $approve
     * @return bool
     */
    public function approve($approve){
        if($this->Appointment_model->update_approval($approve)){return true;}
        else {return false;}

    }
}