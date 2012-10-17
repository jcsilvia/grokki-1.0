<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {


public function index()
{
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->model('Signup_model');
    $this->load->database();

    $data['title'] = 'Register new account';

    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[members.UserName]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean|sha1');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|xss_clean|is_unique[members.EmailAddress]');

    $isBusiness = $this->input->post('is_business');//check to see if we need to show the extended reg form for businesses

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('signup');
        $this->load->view('templates/footer');

    }
    else
    {
        if ($isBusiness == 0) //not a business registration so go to logged-in home
            {
                $this->Signup_model->register_user();
                $this->load->view('home');
            }

        else //business registration so continue the registration process
            {
                $this->Signup_model->register_user();
                $this->load->view('business_registration');
            }
    }
}

}