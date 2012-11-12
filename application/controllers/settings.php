<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        //check for an existing session
        if($this->session->userdata('memberid'))
        {

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->database();
            $this->load->model('Settings_model');


            $data['title'] = 'Profile Settings';

        }



        else
        {

            redirect('home', 'refresh');

        }

    }

}