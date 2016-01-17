<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 1/8/2016
 * Time: 9:54 PM
 */
class Search extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('doctor_model');
        $this->load->model('hospital_model');
        $this->load->model('events_model');
    }

    /**
     * Load search view
     */
    public function index(){
        $this->load->view('includes/header');
        $this->load->view('modules/search/search');
        $this->load->view('includes/footer');

    }

    /**
     * Search doctors and display search results
     * 1. get input fields
     * 2. get searchresutls from doc model
     * 3. doc search_doctor_results()
     */
    public function search_doctors(){

        $search_array = array();
        $search_array['name'] = $this->input->post('name');
        $search_array['specialist'] = $this->input->post('specialist');
        $search_array['from_hospital'] = $this->input->post('from_hospital');
        $search_array['location'] = $this->input->post('location');
        $search_array['qualification'] = $this->input->post('qualification');
        $search_array['rating'] = $this->input->post('rating');

        $search_results = $this->doctor_model->search_doctors($search_array);

        if($search_results->num_rows >= 1){ $this->doctors_search_results($search_results);}
        else $this->no_results_found();
    }

    public function no_results_found(){
        echo "Sorry your search did not return any result. Try again with different keywords";
    }

    public function search_hospitals(){

        $search_array = array();
        $search_array['name'] = $this->input->post('doc_name');
        $search_array['location'] = $this->input->post('location');
        $search_array['rating'] = $this->input->post('rating');

        $search_results = $this->model->hospital_model->get_hospitals($search_array);

        $this->hospitals_search_results($search_results);
    }

    public function doctors_search_results($search_results){

        $this->load->view('includes/header');
        foreach($search_results->result() as $data) {
            $this->load->view('search/doctor_search_results', $data);
        }
    }

    public function hospitals_search_results($search_results){


        foreach($search_results as $data) {

            $this->load->view('search/hospitals_search_results', $data);
        }
    }

}