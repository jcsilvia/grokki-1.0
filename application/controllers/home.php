<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }



function index()

     {

       if($this->session->userdata('memberid'))

           {

             $data['title'] = 'Home';
             $data['username'] = $this->session->userdata('username');
             $this->load->model('Message_model');
             $data['messages'] = $this->Message_model->get_messages();

             $this->load->view('templates/header', $data);
             $this->load->view('templates/sub_nav.php', $data);
             $this->load->view('home', $data);
             $this->load->view('templates/footer');
           }

       else

           {

             //If no session, redirect to login page

            // redirect('login', 'refresh');
               $data['title'] = 'Welcome';
               $this->load->view('templates/homepage_header', $data);
               $this->load->view('home_not_logged_in');
               $this->load->view('templates/footer');

           }

     }



public function logout()
    {
        $this->session->unset_userdata('memberid', 'username');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }


public function get_message_details()
    {

        //$messageid = $this->uri->segment(3,0);

    }

}