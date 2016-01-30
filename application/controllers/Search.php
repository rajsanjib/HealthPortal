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
        $this->load->model('Doctor_model');
        $this->load->model('Hospital_model');
        $this->load->model('events_model');
    }

    /**
     * Load search view
     */
    public function index(){

        $doctor_page_data['specialities'] = $this->Doctor_model->get_specialities();
        $doctor_page_data['address'] = $this->Doctor_model->get_address();
        $doctor_page_data['hospitals'] = $this->Doctor_model->get_hospital();

        $hospital_page_data['specialities'] = $this->Hospital_model->get_specialities();
        $hospital_page_data['address'] = $this->Hospital_model->get_address();

        $this->load->view('includes/header');
        $this->load->view('search/search',$doctor_page_data,$hospital_page_data);
    }

    /**
     * Search doctors and display search results
     * 1. get input fields
     * 2. get search resuts from doc model
     * 3. doc search_doctor_results()
     */
    public function search_doctors(){

        $search_array = array();
        $search_array['name'] = $this->input->post('name');
        $search_array['specialist'] = $this->input->post('specialist');
        $search_array['hospital'] = $this->input->post('hospital');
        $search_array['address'] = $this->input->post('address');
        $search_array['qualification'] = $this->input->post('qualification');
        $search_array['rating'] = $this->input->post('rating');

        $search_results = $this->Doctor_model->search_doctors($search_array);

        if($search_results->num_rows() >= 1){ $this->doctors_search_results($search_results);}
        else $this->no_results_found();
    }

    public function no_results_found(){
        echo "Sorry your search did not return any result. Try again with different keywords";
    }

    public function search_hospitals(){

        $search_array = array();
        $search_array['name'] = $this->input->post('doc_name');
        $search_array['address'] = $this->input->post('address');
        $search_array['rating'] = $this->input->post('rating');

        $search_results = $this->model->hospital_model->get_hospitals($search_array);

        $this->hospitals_search_results($search_results);
    }

    public function doctors_search_results($search_results){

        $page_data['search_results'] = $search_results;
        $this->load->view('includes/header');
            $this->load->view('search/doctor_search_results', $page_data);
    }

    public function hospitals_search_results($search_results){


        foreach($search_results as $data) {

            $this->load->view('search/hospitals_search_results', $data);
        }
    }

}