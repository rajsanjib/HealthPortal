<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/16/2016
 * Time: 6:29 PM
 */
class Appointment_user_profile extends MY_Controller
{

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

    /**
     *
     */
    public function user_appointments(){
        $user_id = appointments::$user_id;
        $user_appointments = $this->Appointment_model->get_appointment_by_user_id($user_id);

        foreach($user_appointments as $users_appointment) {
            $this->load->view('modules/appointment/users_appointments', $users_appointment);
        }

    }

    /**
     * @param $appointment_id
     * @return bool
     */
    public function cancel_appointment($appointment_id){
        if($this->Appointment_model->cancel_appointment($appointment_id)) return true;
        else return false;
    }

    public function check_notification(){
        $user_id = appointments::$user_id;
        $notifications = $this->Appointment_model->get_notifications($user_id);

        if(!$notifications){
            return false;
        } else {
            foreach($notifications as $notification){
                $this->load->view('modules/appointment/notifications');
            }
        }

    }

}