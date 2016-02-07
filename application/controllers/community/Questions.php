<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/31/2015
 * Time: 10:36 PM
 */
class Questions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('community/Question_model');
    }

    public function index(){

        if ($this->uri->segment(3)) {
            $filter = $this->uri->segment(4);
            $direction = $this->uri->segment(5);
            $page_data['dir'] = $direction;
        } else {
            $filter = null;
            $direction = null;
            $page_data['dir'] = 'ASC';
        }

        $page['data'] = $this->Question_model->get_questions($filter, $direction);

        $this->load->view('includes/header');
        $this->load->view('discussions/discussions');
        $this->load->view('includes/footer');
    }

    public function create_question(){

        $this->form_validation->set_rules('ds_title', $this->lang->line('discussion_ds_title'), 'required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('ds_body', $this->lang->line('discussion_ds_body'), 'required|min_length[1]|max_length[5000]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('common/header');
        $this->load->view('nav/top_nav');
        $this->load->view('discussions/new');
        $this->load->view('common/footer');
    } else {
        $data = array(
                'usr_name' => $this->input->post('usr_name'),
                'usr_email' => $this->input->post('usr_email'),
                'ds_title' => $this->input->post('ds_title'),
                'ds_body' => $this->input->post('ds_body')
        );
    }
        if ($ds_id = $this->Discussions_model->create($data)) {
            redirect('comments/index/'.$ds_id);
        } else {
// error
// load view and flash sess error
        }
    }
}