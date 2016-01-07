<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/2/2016
 * Time: 8:28 AM
 */
class Schedule_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
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
     * @param $doc_id
     * @return bool
     */
    public function update_schedule($schedule, $doc_id){

        // Get schedule ids for given doc_id
        $this->db->where('doctor_id' , $doc_id);
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

    }


}