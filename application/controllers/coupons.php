<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupons extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        //check for an existing session and it's a business
        if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
        {

            $data['title'] = 'Coupons';
            $data['username'] = $this->session->userdata('username');

            //load views
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('coupons');
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('home', 'location');
        }

    }

}