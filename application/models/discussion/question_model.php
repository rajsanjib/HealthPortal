<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/31/2015
 * Time: 9:28 PM
 */
class Question_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Gets a question
     * @return question_data
     */
    public function get_question($question_id){
        $this->db->select("question_id, user_id, title, content, category, date_posted");
        $this->db->where('question_id', $question_id);
        $query = $this->db->get('questions');

        if(count($query->result_array()) != 1){
            return false;
        }

        $temp = $query->result();

        $user_id = $temp[0]['user_id'];

        $this->db->select('username', 'image_path');
        $this->db->where('user_id', $user_id);
        $this->db->get('users');

        $temp[0]["username"] = $query->row()->username;
        $temp[0]["image_path"] = $query->row()->image_path;

        $this->db->select("tag");
        $this->db->where("question_id", $question_id);
        $this->db->from("tags");
        $query = $this->db->get();

        $tags = null;

        foreach($query->result_array() as $arr){
            foreach($arr as $val){
                $tags[] = $val;
            }
        }

        $temp[0]["tags"] = implode(", ", $tags);

        return $temp;
    }

    /**
     * gets list of questions for required sort field
     * returns questions
     * @param $filter
     * @param $direction
     * @param $category
     */
    public function get_questions($filter , $direction, $category){

        $this->db->select("question_id, title, content, category, date_posted");
        $this->db->from('questions');
        $this->db->order_by($filter, $direction);
        $query = $this->db->get('questions');

        return $query->result_array();
    }

    /**
     * Post a question
     * @param $question_data
     * @return insert_id
     */
    public function create_question($question_data){

        $qs_data = array(
            'user_id' => $question_data['user_id'],
            'title' => $question_data['title'],
            'content' => $question_data['content'],
            'category' => $question_data['tags'],
            'date_posted' => $question_data['date_posted']
        );


        if ($this->db->insert('questions',$qs_data) ) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}