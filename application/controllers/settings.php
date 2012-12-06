<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'email'));
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
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean|valid_value[zipcodes.zip]');

            if ($this->session->userdata('is_business') == 1)
            {
                $this->load->model('Signup_model');
                $data['categories'] = $this->Signup_model->load_business_categories();

                $this->form_validation->set_rules('businessname', 'Business name', 'trim|required|max_length[50]|xss_clean');
                $this->form_validation->set_rules('business_category', 'Business category', 'trim|required|xss_clean');
                $this->form_validation->set_rules('address1', 'Address 1', 'trim|required|max_length[50]|xss_clean');
                $this->form_validation->set_rules('address2', 'Address 2', 'trim|xss_clean|max_length[50]');
                $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[50]|required|valid_value[zipcodes.city]');
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
                $this->session->set_flashdata('flashSuccess', 'Profile updated successfully');
                redirect('home', 'location');
            }

        }



        else
        {

            redirect('home', 'location');

        }

    }

    public function change_password($msg = NULL)
    {
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');
            $data['msg'] = $msg;

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('oldpassword', 'previous Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('newpassword1', 'new Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');
            $this->form_validation->set_rules('newpassword2', 'new Password', 'trim|required|xss_clean|min_length[8]|max_length[15]');



            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('change_pass', $data);
                $this->load->view('templates/footer');
            }

            else
            {

                if( $this->Settings_model->change_password() === TRUE)
                {
                    $this->session->set_flashdata('flashSuccess', 'Password updated successfully');
                    redirect('settings', 'location');
                }
                else
                {
                    $data['msg'] = 'Password does not match';
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('change_pass', $data);
                    $this->load->view('templates/footer');

                }
             }

         }
        else
        {
            redirect('home', 'location');
        }
    }



    public function change_email()
    {
        if($this->session->userdata('memberid'))
        {

            $data['title'] = 'Settings';
            $data['username'] = $this->session->userdata('username');


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('email', 'new Email', 'trim|required|valid_email|max_length[50]|xss_clean|update_unique[members.EmailAddress.MemberId.'. $this->session->userdata('memberid') .']');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('change_email', $data);
                $this->load->view('templates/footer');
            }

            else
            {
                    $this->Settings_model->change_email();
                    $this->session->set_flashdata('flashSuccess', 'Email updated successfully');
                    redirect('settings', 'location');

            }


        }
        else
        {

            redirect('home', 'location');

        }


    }


    public function validate_email()
    {
        if($this->session->userdata('memberid'))
        {
            $result = $this->Settings_model->get_email();
            $email_to = $result->EmailAddress;
            $validation_string = $this->generateRandomString();//get the email validation string to send
            $this->Settings_model->change_validation_string($validation_string);

            $subject = 'Grokki.com Email Validation';
            $message = 'Click the link below to validate the email used to register for Grokki.com. <br><br>' . anchor('/email/confirmation/' . $validation_string, 'Click here to validate email.') . '<br><br>Regards, <br>The Grokki.com team';

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


            $this->session->set_flashdata('flashSuccess', 'Validation email sent to ' . $email_to);
            redirect('settings', 'location');



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


