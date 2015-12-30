<?php

/**
 * Created by PhpStorm.
 * User: Sanjib
 * Date: 12/24/2015
 * Time: 10:58 PM
 */
class Signup extends MY_Controller
{

    public $error_message;
    public $signup_data = array(
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'username' => '',
        'password' => ''
    );

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
            ),
            array(
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'trim|required|valid_email|is_unique[users.email]'
            )
        );

        $this->form_validation->set_rules($validation_rules);

        $data['main_content'] = 'modules/signup';
        $this->load->view('template' , $data);
    }


    public function collect_all_fields(){
        $this->signup_data['first_name'] = $this->input->post('first_name');
        $this->signup_data['last_name'] = $this->input->post('last_name');
        $this->signup_data['username'] = $this->input->post('username');
        $this->signup_data['email'] = $this->input->post('email');
        $this->signup_data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
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

        $this->collect_all_fields();
        echo $this->signup_data['first_name'];

        /*
         * if validation fails reload signup form
         */
        if ($this->form_validation->run() == TRUE) { // validation fails
            $this->error_message = "Inputs are validation not validated";
            $data['main_content'] = 'modules/signup';
            $this->load->view('template' , $data);
        } else {
            $validation = $this->Signup_model->validate($this->signup_data['username'] ,$this->signup_data['email']);
            if($validation){ // no duplicate input in the database matches (username and email are available)
                //insert username, email and all other elemnts to db
                $inserted = $this->Signup_model->insert_into_db($this->signup_data);
                if($inserted) {
                    $data['main_content'] = 'snippet/form_success';
                    $this->load->view('template' , $data);
                } else {
                    $this->error_message .= "Unable to insert into database";
                }
            } else { //database validation failure ie fields already contain in the database
                $this->error_message .= "Sorry following are already taken";
                foreach($validation as $message){$this->error_message .= $message;}
            }


        }

    }

}