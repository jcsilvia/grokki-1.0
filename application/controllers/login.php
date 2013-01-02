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
                   $this->output->nocache(); // set http header to disable caching if user hits back button
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
                        $this->output->nocache(); // set http header to disable caching if user hits back button
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


    public function forgot_password()
    {

        if ($this->session->userdata('memberid') == false)
        {

            $data['title'] = 'Login';


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');


            if ($this->form_validation->run() === FALSE)
            {
                $this->output->nocache(); // set http header to disable caching if user hits back button
                include 'mobile.php';
                if(Mobile::is_mobile()) {
                    $this->load->view('mobile/m_forgot_password', $data);

                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('forgot_password', $data);
                    $this->load->view('templates/footer');
                }
            }
            else
            {

                $data['results'] = $this->Login_model->forgot_password();

                if ($data['results']->EmailAddress)
                    {

                        $email_to = $data['results']->EmailAddress;
                        $subject = 'Reset your Grokki password';
                        $message = 'We received a request to reset your password for account ' . $data['results']->UserName . '. Click the link below to reset your password. <br><br>' . anchor('/email/reset_password/' . $data['results']->ValidationString, 'Click here to reset your password.') . '<br><br>Regards, <br>The Grokki.com team';

                        $config = Array(
                            'protocol' => 'smtp',
                            'smtp_host' => 'ssl://smtp.gmail.com',
                            'smtp_port' => '465',
                            'smtp_user' => 'admin@grokki.com', //for testing only, change this to admin@grokki.com for production
                            'smtp_pass' => 'viper123', //change this for check in and deployment
                            'mailtype'  => 'html',
                            'charset'   => 'utf-8',
                            'newline'  => "\r\n"
                        );
                        $this->load->library('email', $config);

                        // Set to, from, message, etc.
                        $this->email->from('admin@grokki.com', 'Grokki Administrator'); //change this to admin@grokki.com for production
                        $this->email->to($email_to);
                        $this->email->subject($subject);
                        $this->email->message($message);
                        $this->email->send();

                    }

                $this->output->nocache(); // set http header to disable caching if user hits back button
                include 'mobile.php';
                if(Mobile::is_mobile()) {
                    $this->load->view('mobile/password_resent', $data);

                } else {
                    $this->load->view('templates/header', $data);
                    $this->load->view('password_resent', $data);
                    $this->load->view('templates/footer');
                }


            }
        }
        else
        {
            redirect('home', 'location');

        }
    }

    public function reset_password($msg=NULL)
        {
            if ($this->session->userdata('memberid') == false)
                {

                    $data['title'] = 'Login';
                    $data['msg'] = $msg;
                    $validation_string = $this->input->post('validation_string');
                    $data['validation'] = $validation_string;

                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_rules('password1', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
                    $this->form_validation->set_rules('password2', 'Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');

                    $this->output->nocache(); // set http header to disable caching if user hits back button
                    if ($this->form_validation->run() === FALSE)
                        {

                            $this->load->view('templates/header', $data);
                            $this->load->view('reset_password', $data);
                            $this->load->view('templates/footer');

                        }
                    else
                        {

                            if ($this->Login_model->change_password() === TRUE)
                                {
                                    redirect('login', 'location');
                                }
                            else
                                {

                                        $data['msg'] = 'Passwords do not match';
                                        $this->load->view('templates/header', $data);
                                        $this->load->view('reset_password', $data);
                                        $this->load->view('templates/footer');
                                }
                        }

                }
            else
                {
                    redirect('home', 'location');
                }
        }

    private function generateRandomString($length = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

}