<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/7/2016
 * time: 12:17 PM
 */
class Schedule extends MY_Controller
{
    private $doc_id;

    public $sunday = array();
    public $monday = array();
    public $tuesday = array();
    public $wednesday = array();
    public $thursday = array();
    public $friday = array();
    public $saturday = array();

    public $schedule_array = array(
        'sunday' => '',
        'monday' =>'',
        'tuesday' => '',
        'wednesday' => '',
        'thursday' => '',
        'friday' => '',
        'saturday' => '',
    );

    public function __construct()
    {

        parent::__construct();
        /**
         * Required models:
         *  doctor_model
         *  schedule_model
         */
        $this->load->model('doctor_model');
        $this->load->model('Schedule_model');
    }

    /**
     * Loads the schedule view for viewing
     */
    public function view_schedule(){

        $doctor_id = $this->model->doctor_model->get_doctor_id();
        $this->load->view('doctor_dashboard/schedule_view', $this->prepare_schedule($doctor_id));
    }

    /**
     * Edit schedule
     * Opens edit schedule view($schedule_array)
     * @param $doctor_id
     *
     */
    public function edit_schedule($doctor_id){


    }

    /**
     * Updates the schedule in database
     * If its first shift the schedule is being edited, calls insert_schedule method
     */
    public function update_schedule(){

        $schedule = array();
        for($i = 1; $i <= 7; $i++) {
            $schedule['doctor_id'] = $this->doc_id;
            $schedule['morning_shift_start'] = $this->input->post('morning_shift_start' . $i);
            $schedule['morning_shift_end'] = $this->input->post('morning_shift_end' . $i);
            $schedule['morning_tokens'] = $this->input->post('morning_tokens' . $i);
            $schedule['afternoon_shift_start'] = $this->input->post('afternoon_shift_start' . $i);
            $schedule['morning_shift_start'] = $this->input->post('morning_shift_start' . $i);
            $schedule['afternoon_tokens'] = $this->input->post('afternoon_tokens' . $i);
            $schedule['evening_shift_start'] = $this->input->post('evening_shift_start' . $i);
            $schedule['evening_shift_end'] = $this->input->post('evening_shift_end' . $i);
            $schedule['evening_tokens'] = $this->input->post('evening_tokens' . $i);
            $schedule['day'] = $i;

            // Check to see if schedule is being set for first shift
            // If true call insert else call update
            if($this->model->schedule_model->is_schedule_set()) {
                // Schedule already set
                $updated = $this->model->schedule_model->update_schedule($schedule, $this->doc_id);
                if (!$updated) {
                    break;
                } else {
                    $inserted = $this->model->schedule_model->insert_schedule($schedule, $this->doc_id);
                    if(!$inserted){
                        break;
                    }
                }
            }
        }


    }

    /**
     * Populates member variables with schedule data
     * @param $doctor_id
     * @param $day (in integers sunday = 1, monday = 2 ...)
     */
    public function populate_data($doctor_id, $day){

        // Schedule for a particular day for logged in doctor is returned
        $result = $this->Schedule_model->get_schedule($doctor_id, $day);

        foreach($result->result() as $query)
            switch ($day) {
                case 1:
                    $this->sunday = $this->init_day($query);
                    break;
                case 2:
                    $this->monday = $this->init_day($query);
                    break;
                case 3:
                    $this->tuesday = $this->init_day($query);
                    break;
                case 4:
                    $this->wednesday = $this->init_day($query);
                    break;
                case 5:
                    $this->thursday = $this->init_day($query);
                    break;
                case 6:
                    $this->friday = $this->init_day($query);
                    break;
                case 7:
                    $this->saturday = $this->init_day($query);
                    break;
                default:
            }
    }

    /**
     *
     * @param $query
     * @return array - $day
     */
    public function init_day($query)
    {

        $day = array(
            'morning_shift_start' => $query->morning_shift_start,
            'morning_shift_end' => $query->morning_shift_end,
            'afternoon_shift_start' => $query->afternoon_shift_start,
            'afternoon_shift_end' => $query->afternoon_shift_end,
            'evening_shift_start' => $query->evening_shift_start,
            'evening_shift_end' => $query->evening_shift_end,
        );
        return $day;
    }

    /**
     * Prepares schedule
     * Called by appointment_doctor_profile controller also
     * @param $doctor_id
     * @return array
     *
     */
    public function prepare_schedule($doctor_id)
    {

        //get doc name
        $doc_name = $this->doctor_model->get_doctor_name($doctor_id);


        for($day = 1; $day <= 7; $day++) {
            $this->populate_data($doctor_id, $day);
        }


        $this->schedule_array = array(
            'sunday' => $this->sunday,
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,
            'thursday' => $this->thursday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
            'doc_name' => $doc_name,
        );

        return $this->schedule_array;
    }


}