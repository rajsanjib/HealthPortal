<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/24/2015
 * Time: 10:58 PM
 */
class Signup extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('string');
        $this->load->library('encrypt');
        $this->load->model('Signup_model');
        $this->load->library('form_validation');

        /*
         * collect data from all input fields
         */

    }

    /*
     * Sets validation rules and displays signup view
     */
    function index(){

        /*
         * This function made with reference to https://ellislab.com/codeigniter/user-guide/libraries/form_validation.html
         * xss_clean function which removes malicious data
         */


        // List of rules for validating signup form
        $validation_rules = array(
            array(
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'trim|required|min_length[4]|max_length[15]|is_unique[users.username]|xss_clean'
            ),
            array(
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'trim|required|min_length[4]|max_length[30]|md5'
            ),
            array(
                'field'   => 'passconf',
                'label'   => 'Password Confirmation',
                'rules'   => 'required|matches[password]|trim'
            )
        );

        $this->form_validation->set_rules($validation_rules);

        $data['main_content'] = 'modules/signup';
        $this->load->view('template' , $data);
    }



    /*
     * Validates data given in input fields in signup form
     * If errors found reloads signup form
     * Else, calls signup_model->validate to check data against database
     *  if return true calss form_success view
     * else checks for fileds whose
     */
    function validate_form()
    {
        $signup_data['username'] = $this->input->post('username');
        $signup_data['password'] = md5($this->input->post('password'));
        $signup_data['account'] = $this->input->post('account');

        /*
         * if validation fails reload signup form
         */
        if ($this->form_validation->run() == TRUE) { // validation fails
            echo "Inputs are validation not validated";
            echo "inputs could not be validated";
        } else {
            if(!($this->Signup_model->check_for_duplicate($signup_data['username']))){
                $inserted = $this->Signup_model->insert_into_db($signup_data);
                echo "data sent for insertion";
                if($inserted) {
                    echo "You have successfully created account";
                } else {
                    echo "not inserted";
                }
            } else {
                echo "database validation failure ie fields already contain in the database";
            }
        }
    }
}