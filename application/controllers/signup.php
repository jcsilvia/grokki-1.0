<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('Signup_model');
    }



public function index()
{
    //test to see if a user is already logged in and reroute to home
    if ($this->session->userdata('memberid') == false)
        {

            $data['title'] = 'Register';

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[members.UserName]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|xss_clean|is_unique[members.EmailAddress]');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean');

            $isBusiness = $this->input->post('is_business');//check to see if we need to show the extended reg form for businesses
			//jQuery mobile support.
			if ($isBusiness == "on") {
				$isBusiness = 1;
			}

            $validation_string = $this->generateRandomString();//get the email validation string to send

            //populate validation email parameters
            $email_to = $this->input->post('email');
            $subject = 'Grokki.com Email Confirmation';
            $message = 'Thanks for signing up for Grokki.com. Click the link below to validate the email used to register. <br><br>' . anchor('/email/confirmation_email/' . $validation_string, 'Click here to validate email.') . '<br><br>Regards, <br>The Grokki.com team';

            if ($this->form_validation->run() === FALSE)
                {
	
				   include 'mobile.php';	
				   if(Mobile::is_mobile()) {
		               $this->load->view('mobile/m_signup');

					} else {
                    	$this->load->view('templates/header', $data);
                    	$this->load->view('signup');
                    	$this->load->view('templates/footer');
					}
                }
            else
                {
                    if ($isBusiness == 0) //not a business registration so go to logged-in home
                        {

                            $this->Signup_model->register_user($validation_string);
                            $this->send_grok_email($email_to, $subject, $message);
                            $this->session->set_flashdata('flashSuccess', 'Registration successful');
                            redirect('home', 'location');
                        }

                    else //business registration so continue the registration process
                        {
                            $data['title'] = 'Register business';
                            $this->session->set_userdata('is_business', 1);
                            $this->Signup_model->register_user($validation_string);
                            $this->send_grok_email($email_to, $subject, $message);
                            $results['categories'] = $this->Signup_model->load_business_categories();

						   include 'mobile.php';	
						   if(Mobile::is_mobile()) {
				               $this->load->view('mobile/m_business_registration', $results);

							} else {
                            	$this->load->view('templates/header', $data);
                            	$this->load->view('business_registration', $results);
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
public function business_reg()
        {

            $data['title'] = 'Complete business registration';

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('businessname', 'Business name', 'trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('business_category', 'Business category', 'trim|required|xss_clean');
            $this->form_validation->set_rules('address1', 'Address 1', 'trim|required|max_length[50]|xss_clean');
            $this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[50]');
            $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[50]|required');
            $this->form_validation->set_rules('state', 'State', 'trim|xss_clean|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|min_length[10]|max_length[11]|required');
            $this->form_validation->set_rules('fname', 'First Name', 'trim|xss_clean|min_length[2]|max_length[50]|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|xss_clean|min_length[2]|max_length[50]|required');
            $this->form_validation->set_rules('tags', 'Tags', 'trim|xss_clean|min_length[4]|max_length[75]|required');


            if ($this->form_validation->run() === FALSE)
                {
                    $results['categories'] = $this->Signup_model->load_business_categories();

					include 'mobile.php';	
					if(Mobile::is_mobile()) {
			        	$this->load->view('mobile/m_business_registration', $results);

					} else {
                    	$this->load->view('templates/header', $data);
                    	$this->load->view('business_registration', $results);
                    	$this->load->view('templates/footer');
					}
                }
            else
                {
                    $this->Signup_model->register_business();
                    $this->session->set_flashdata('flashSuccess', 'Registration successful');
                    redirect('home', 'location');
                }
        }

private function generateRandomString($length = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

private function send_grok_email($email_to = NULL, $subject = NULL, $message = NULL)
    {


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
        //$this->email->set_newline("\r\n"); //only for text email, not html

        // Set to, from, message, etc.

        $this->email->from('admin@grokki.com', 'Grokki Administrator'); //change this to admin@grokki.com for production
        $this->email->to($email_to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();

        return TRUE;

    }

}