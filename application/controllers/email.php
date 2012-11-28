<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

    function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url', 'email'));
            $this->load->database();
            $this->load->model('Email_model');
        }



    public function confirmation()
        {
            $validation_string = $this->uri->segment(3);

            if ($validation_string == '')
            {
                $data['err'] = 'The email validation string was incorrect';
                $data['title'] = 'Error';
                $this->load->view('templates/header');
                $this->load->view('templates/err_msg.php');
                $this->load->view('templates/footer');

            }

            $is_validated = $this->Email_model->validate_email($validation_string);

            if($is_validated)
            {
                if ($this->session->userdata('memberid'))
                {
                    $this->session->set_flashdata('flashSuccess', 'Email validated successfully');
                }
                redirect('home', 'location');
            }
            else
            {
                $data['err'] = 'An error occurred while trying to validate your email.';
                $data['title'] = 'Error';
                $this->load->view('templates/header', $data);
                $this->load->view('templates/err_msg.php', $data);
                $this->load->view('templates/footer');

            }
        }

    public function forgot_password()
        {

        }

}