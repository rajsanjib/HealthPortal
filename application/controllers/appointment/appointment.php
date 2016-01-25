<?php

include_once(APPPATH.'controllers/Schedule.php');

class Appointment extends Schedule
{

    public $doctor_id;
    static $user_id;

    function __construct()
    {
        parent::__construct();

        // Models
        $this->load->model('Doctor_model');
        $this->load->model('User_model');
        $this->load->library('calendar');

        // Initialize static variables
        Appointment_doctor_profile::$user_id = $this->User_model->get_user_id();
    }


    public function appointment_doctor_profile($doctor_id){

        $this->doctor_id = $doctor_id;
        $schedule_array = $this->prepare_schedule($doctor_id);
        $this->load->view('includes/header');
        $this->load->view('modules/appointment/take_appointment',$schedule_array);
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
            'user_id' => appointments::$user_id,
            'requested_by' => $this->input->post('patient_name'),
            'appointment_date' => human_to_unix($this->input->post('date')),
            'date_registered' => now(),
            'day' => $this->day_to_int($this->input->post('day')),
            'time_start' => $this->input->post('time_end'),
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

    public function day_to_int($day){
        switch($day){
            case 'sunday':
                return 1;
            case 'monday':
                return 2;
            case 'tuesday':
                return 3;
            case 'wednesday':
                return 4;
            case 'thursday':
                return 5;
            case 'friday':
                return 6;
            case 'saturday':
                return 7;
            default:
                return 0;
        }
    }
}