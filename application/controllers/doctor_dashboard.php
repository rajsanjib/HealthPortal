<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/23/2016
 * Time: 7:39 PM
 */

class Doctor_Dashboard extends MY_Controller
{

    public static $date;
    public static $doctor_id;

    public function __construct()
    {
        parent::__construct();
        // Models
        $this->load->model('Doctor_model');
        $this->load->model('Schedule_model');
        $this->load->model('User_model');
        $this->load->model('Appointment_model');

        // Initialize static variables
        //Doctor_Dashboard::$date = $this->date();
    }

    public function index(){

        if(!isset($_SESSION['login_id'])){
            redirect(base_url());
        }
        Doctor_Dashboard::$doctor_id = $_SESSION['login_id'];
        echo Doctor_Dashboard::$doctor_id;
        $this->home();
    }

    public function home(){

        $this->load->view('includes/header');
        $this->load->view('doctor_dashboard/sidebar');;
        $this->load->view('doctor_dashboard/welcome');
        $this->load->view('includes/footer');
        echo Doctor_Dashboard::$doctor_id = $_SESSION['login_id'];
    }

    public function appointments($message = NULL){

        $page_data['appointment_requests'] = $this->appointment_requests();
        $page_data['upcoming_appointments'] = $this->upcoming_appointments();
        $page_data['message'] = $message;

        $this->load->view('includes/header');
        $this->load->view('doctor_dashboard/sidebar');;
        $this->load->view('doctor_dashboard/appointments',$page_data);
    }

    public function appointment_requests(){

        $result = $this->Appointment_model->get_unapproved_appointments(Doctor_Dashboard::$doctor_id);

        return $result;
    }



    public function upcoming_appointments(){

    }


    /**
     * Updates the schedule in database
     * If its first shift the schedule is being edited, calls insert_schedule method
     */
    public function update_schedule(){

        $schedule = array();
        for($i = 1; $i <= 7; $i++) {
            $schedule['doctor_id'] = Doctor_Dashboard::$doctor_id;
            $schedule['morning_shift_start'] = $this->input->post('morning_shift_start_' . $i);
            $schedule['morning_shift_end'] = $this->input->post('morning_shift_end_' . $i);
            $schedule['morning_tokens'] = $this->input->post('morning_tokens_' . $i);
            $schedule['afternoon_shift_start'] = $this->input->post('afternoon_shift_start_' . $i);
            $schedule['morning_shift_start'] = $this->input->post('morning_shift_start_' . $i);
            $schedule['afternoon_tokens'] = $this->input->post('afternoon_tokens_' . $i);
            $schedule['evening_shift_start'] = $this->input->post('evening_shift_start_' . $i);
            $schedule['evening_shift_end'] = $this->input->post('evening_shift_end_' . $i);
            $schedule['evening_tokens'] = $this->input->post('evening_tokens_' . $i);
            $schedule['day'] = $i;

            // Check to see if schedule is being set for first shift
            // If true call insert else call update
            if($this->model->schedule_model->is_schedule_set()) {
                // Schedule already set
                $updated = $this->model->Schedule_model->update_schedule($schedule, $schedule['doctor_id']);
                if (!$updated) {
                    break;
                } else {
                    $inserted = $this->model->schedule_model->insert_schedule($schedule, Doctor_Dashboard::$doctor_id);
                    if(!$inserted){
                        break;
                    }
                }
            }
        }
    }


    public function my_schedule(){

        $this->load->view('view_schedule', $this->Schedule_model->prepare_schedule(Doctor_Dashboard::$doctor_id));
    }

    public function edit_schedule($doctor_id){

        $page_data['schedule_array'] = $this->Schedule_model->prepare_schedule(Doctor_Dashboard::$doctor_id);
        $this->load->view('includes/header');
        $this->load->view('doctor_dashboard/sidebar');
        $this->load->view('doctor_dashboard/edit_schedule',$page_data);
    }

    public function my_profile(){

    }

    public function edit_profile(){

    }

    public function approve_appointment($appointment_id){

        if($this->Appointment_model->approve_appointment($appointment_id))
            $message = "You have approved the appointment successfully";
        else $message = "Sorry, There was a problem while trying to approve the appointment.";
        $this->appointments($message);

    }


}