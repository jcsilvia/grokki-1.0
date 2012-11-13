<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Settings_model');
    }


    public function index()
    {

        //check for an existing session
        if($this->session->userdata('memberid'))
        {
            //set data array for view
            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');
            $data['profile'] = $this->Settings_model->get_profile();

            //set form validation rules
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|update_unique[members.UserName.MemberId.'. $this->session->userdata('memberid') .']');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean');

            if ($this->session->userdata('is_business') == 1)
            {
                $this->form_validation->set_rules('businessname', 'Business name', 'trim|required|max_length[50]|xss_clean');
                $this->form_validation->set_rules('business_category', 'Business category', 'trim|required|xss_clean');
                $this->form_validation->set_rules('address1', 'Address 1', 'trim|required|max_length[50]|xss_clean');
                $this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[50]');
                $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[50]|required');
                $this->form_validation->set_rules('state', 'State', 'trim|xss_clean|required');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|min_length[10]|max_length[10]|required');
                $this->form_validation->set_rules('fname', 'First Name', 'trim|xss_clean|min_length[2]|max_length[50]|required');
                $this->form_validation->set_rules('lname', 'Last Name', 'trim|xss_clean|min_length[2]|max_length[50]|required');
                $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean|min_length[4]|max_length[75]|required');
            }


            if ($this->form_validation->run() === FALSE)
            {
                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                if ($this->session->userdata('is_business') == 1)
                {
                    $this->load->view('settings_biz', $data);
                }
                else
                {
                    $this->load->view('settings', $data);
                }

                $this->load->view('templates/footer');

            }
            else
            {
                $this->Settings_model->set_profile();
                redirect('home', 'refresh');
            }

        }



        else
        {

            redirect('home', 'refresh');

        }

    }

    public function change_password()
    {

    }

}


