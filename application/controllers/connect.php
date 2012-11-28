<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connect extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Connect_model');
    }


    public function index()
    {

        if($this->session->userdata('memberid'))
        {
            $data['title'] = 'Connections';
            $data['username'] = $this->session->userdata('username');
            $data['data'] = $this->Connect_model->get_connections();

            //load views
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('connect', $data);
            $this->load->view('templates/footer');

        }
        else
        {

            redirect('home', 'location');

        }

    }

    public function rate()
    {

    }

    public function review()
    {

    }


}