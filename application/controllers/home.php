<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }



function index()

     {

       if($this->session->userdata('memberid'))

           {

             $session_data = $this->session->userdata('logged_in');
             $data['title'] = 'Home';
             $data['username'] = $session_data['username'];

             $this->load->view('templates/header', $data);
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
        $this->session->unset_userdata('memberid', 'username', 'logged_in');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }


}