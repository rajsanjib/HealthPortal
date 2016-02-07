<?php
/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/30/2016
 * Time: 5:08 PM
 */

class Comments extends MY_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Question_model');
        $this->load->model('Comments_model');
    }

    public function index($qs_id, $error_message = NULL){

        if($error_message){
            $page_data['error_message'] = $error_message;
        }

        $page_data['discussion_query'] = $this->Question_model->get_question($qs_id);
        $page_data['comment_query'] = $this->Comments_model->get_comments($qs_id);
        $page_data['qs_id'] = $qs_id;

        $this->load->view('includes/header');
        $this->load->view('community/comments', $page_data);
        $this->load->view('includes/footer');
    }

    public function create_comment(){

        $comment_data = array(
            'qs_id' => $this->uri->segment(3),
            'user_id' => $this->uri->segment(4),
            'cm_body' => $this->input->post('comment_body')
        );

        if($this->Comment_model->new_comment($comment_data)){
            $this->index($comment_data['qs_id']);
        }
        else{
            $error_msg = "Your comment could not be create at this time. Please try again";
            $this->index($comment_data['qs_id'], $error_msg);
        }
    }
}