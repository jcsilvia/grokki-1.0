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
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|md5');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|is_unique[members.EmailAddress]');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('signup');
        $this->load->view('templates/footer');

    }
    else
    {

        $this->Signup_model->register_user();
        $this->load->view('home');
    }
}

}