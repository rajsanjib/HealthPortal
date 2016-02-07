<?php

include_once(APPPATH.'controllers/Schedule.php');

class Appointment extends Schedule
{

    public $doctor_id;
    static $user_id;
    public $date;

    function __construct()
    {
        parent::__construct();

        // Models
        $this->load->model('Doctor_model');
        $this->load->model('User_model');
        $this->load->library('calendar');
        $this->load->model('Appointment_model');

        // Initialize static variables
        Appointment::$user_id = $this->User_model->get_user_id();
        $this->date = now();
        $this->doctor_id = 1;
    }


    public function appointment_doctor_profile($doctor_id){

        $this->doctor_id = $doctor_id;
        $page_data['schedule_array'] = $this->prepare_schedule($doctor_id);
        $this->load->view('includes/header');
        $this->load->view('modules/appointment/take_appointment',$page_data);
    }

    /**
     * @param day
     * @param time
     * @return bool
     */
    public function make_appointment(){

        // Fetch posted data from appointment form
        $appointment_data = array(
            'doctor_id' => $this->doctor_id,
            'user_id' => Appointment::$user_id,
            'requested_by' => $this->input->post('patient_name'),
            'appointment_date' => $this->input->post('appointment_date'),
            'date_registered' => $this->date,
            'day' => $this->day_to_int($this->input->post('day')),
            'time_start' => $this->input->post('time_start'),
            'time_end' => $this->input->post('time_end'),
            'description' => $this->input->post('description'),
        );

        echo $appointment_data['appointment_date'];

        $registered = $this->Appointment_model->register_appointment($appointment_data);

        if($registered){
            // Load success message
        } else {
            // Load error message
        }
    }

}