<?php

class Appointment_doctor_profile extends MY_Controller{

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


    public function appointment_doctor_profile($doctor_id){

        // Fetch Schedule
        $schedule = new Schedule();
        $schedule_array = $schedule->prepare_schedule($doctor_id);
        $this->load->view('modules/appointment/take_appointment',$schedule_array);
    }

    /**
     * @param day
     * @param time
     * @return bool
     */
    public function make_appointment($day,$time){
        // Fetch posted data from appointment form
        $appointment_data = array(
            'doctor_id' => appointments::$doctor_id,
            'user_id' => appointments::$user_id,
            'date' => appointments::$date,
            'day' => $day,
            'time' => $time,
            'description' => $this->input->post('description'),
            'requested_on' => date_now()
        );

        $registered = $this->Appointment_model->register_appointment($appointment_data);

        if($registered){
            return true;
        } else {
            return false;
        }
    }
}