<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Login_model');

    }

public function index($msg = NULL)
    {
        // user has not logged in
        if ($this->session->userdata('memberid') == false)
            {

                $data['title'] = 'Login';
                $data['msg'] = $msg;

                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


                if ($this->form_validation->run() === FALSE)
                {

				   include 'mobile.php';	
				   if(Mobile::is_mobile()) {
		               $this->load->view('mobile/m_login', $data);

					} else {
                    	$this->load->view('templates/header', $data);
                    	$this->load->view('login', $data);
                    	$this->load->view('templates/footer');
					}
                }
                else
                {

                    if( $this->Login_model->login_user() === TRUE)
                    {

                            redirect('home', 'location');

                    }
                    else
                    {
                        $data['msg'] = 'Invalid username or password';

					   	include 'mobile.php';	
					   	if(Mobile::is_mobile()) {
			               $this->load->view('mobile/m_login', $data);

						} else {
                        	$this->load->view('templates/header', $data);
                        	$this->load->view('login', $data);
                        	$this->load->view('templates/footer');
						}
                    }
                }
            }
        else
            {
                redirect('home', 'location');

            }
    }


}