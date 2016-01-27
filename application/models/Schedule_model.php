<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/2/2016
 * Time: 8:28 AM
 */
class Schedule_model extends CI_Model
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


    function __construct()
    {
        parent::__construct();
        /**
         * Required models:
         *  doctor_model
         *  schedule_model
         */
        $this->load->model('doctor_model');
    }




    /**
     * Populates member variables with schedule data
     * @param $doctor_id
     * @param $day (in integers sunday = 1, monday = 2 ...)
     */
    public function populate_data($doctor_id, $day){

        // Schedule for a particular day for logged in doctor is returned
        $result = $this->get_schedule($doctor_id, $day);

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
            'day' => $query->day
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
        );

        return $this->schedule_array;
    }


    /**
     * @param $schedule_data
     * @return mixed schedule_id
     */
    public function insert_schedule($schedule_data,$doc_id){

        $schedule_id = $this->db->insert('schedule',$schedule_data);
        return $schedule_id;
    }


    /**
     * Updates the previous data
     *  1.get schedule_id for doc_id
     *  2.select row for schedule_id
     * @param $schedule
     * @param $doctor_id
     * @return bool
     */
    public function update_schedule($schedule, $doctor_id){

        // Get schedule ids for given doc_id
        $this->db->where('doctor_id' , $doctor_id);
        $this->db->where('day',$schedule['day']);
        $updated = $this->db->update('schedule',$schedule);

        if($updated){
            //increase the counter by 1
            $this->db->update('times_edited', ($updated->result->times_edited) + 1);
            return true;
        }

    }

    /**
     * Returns the schedule for $doc_id for $day
     * @param $doctor_id
     * @param $day
     *
     *
     *
     */
    public function get_schedule($doctor_id, $day){

        $this->db->select('*');
        $this->db->where('doctor_id',$doctor_id);
        $this->db->where('day',$day);
        $query = $this->db->get('schedule');

        if($query->num_rows() == 1) {
            return $query;
        }


    }


}