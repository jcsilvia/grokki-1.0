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
            $this->load->library('pagination');

            //config for pagination class
            $config['base_url'] = base_url() . "home/index";
            $config['total_rows'] = $this->Connect_model->count_all_connections();
            $config['per_page'] = 10;
            $config['uri_segment'] = 3;

            //implement pagination and pass the correct parameters to the model
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['connections'] = $this->Connect_model->get_connections($config["per_page"], $page);
            $this->pagination->initialize($config);

            //pass pagination, data and parameters to the view
            $data["links"] = $this->pagination->create_links();
            $data['title'] = 'Connections';
            $data['username'] = $this->session->userdata('username');
            $data['total'] = $config['total_rows'];
            $data['per_page'] = $config['per_page'];

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

    public function delete()
    {

        // get the message details for a given message id stripped from the url
        $associateid = $this->uri->segment(3,0);

        // check for the session
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Connections';
            $data['username'] = $this->session->userdata('username');
            $this->load->model('Connect_model');
            $this->Connect_model->delete_connection($associateid);
            $this->session->set_flashdata('flashSuccess', 'Connection deleted');
            redirect('connect', 'refresh');

        }
        else
        {
            //If no session, redirect to login page
            $this->not_logged_in();
        }

    }

    public function review()
    {

    }

    public function message()
    {

    }

    public function profile()
    {

        // get the message details for a given message id stripped from the url
        $associateid = $this->uri->segment(3,0);

        // check for the session
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Connections';
            $data['username'] = $this->session->userdata('username');

            $this->load->model('Connect_model');
            $data['profile'] = $this->Connect_model->get_profile($associateid);
            $data['reviews'] = $this->Connect_model->get_latest_reviews($associateid);
            $data['rating'] = $this->Connect_model->get_ratings($associateid);

            //format the phone number before we send it to the view
            $phone = $this->phone($data['profile']->PhoneNumber);
            $data['phone'] = $phone;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('profile', $data);
            $this->load->view('templates/footer');


        }
        else
        {
            //If no session, redirect to login page
            $this->not_logged_in();
        }

    }

    function phone ($str)
    {
        $strPhone = preg_replace("[^0-9]",'', $str);
        if (strlen($strPhone) != 10)
            return $strPhone;

        $strArea = substr($strPhone, 0, 3);
        $strPrefix = substr($strPhone, 3, 3);
        $strNumber = substr($strPhone, 6, 4);

        $strPhone = "(".$strArea.") ".$strPrefix."-".$strNumber;

        return ($strPhone);
    }

}