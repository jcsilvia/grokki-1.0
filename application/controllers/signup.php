<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

function __construct()
    {
        parent::__construct();
    }


public function index()
{
    //test to see if a user is already logged in and reroute to home
    if ($this->session->userdata('memberid') == false)
        {


            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('Signup_model');
            $this->load->database();

            $data['title'] = 'Register new account';

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[members.UserName]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|xss_clean|is_unique[members.EmailAddress]');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean');

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
                            $data['title'] = 'Home';

                            $this->Signup_model->register_user();
                         //   $this->load->view('templates/header', $data);
                         //   $this->load->view('home');
                         //   $this->load->view('templates/footer');
                            redirect('home', 'refresh');
                        }

                    else //business registration so continue the registration process
                        {
                            $data['title'] = 'Register business account';

                            $this->Signup_model->register_user();
                            $results['categories'] = $this->Signup_model->load_business_categories();

                            $this->load->view('templates/header', $data);
                            $this->load->view('business_registration', $results);
                            $this->load->view('templates/footer');
                        }
                }
        }

    else
        {

            //$data['title'] = 'Home';
            //$this->load->view('templates/header', $data);
            //$this->load->view('home');
            //$this->load->view('templates/footer');
            redirect('home', 'refresh');

        }
}
public function business_reg()
        {

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('Signup_model');
            $this->load->database();

            $data['title'] = 'Complete business account registration';

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


            if ($this->form_validation->run() === FALSE)
                {
                    $results['categories'] = $this->Signup_model->load_business_categories();
                    $this->load->view('templates/header', $data);
                    $this->load->view('business_registration', $results);
                    $this->load->view('templates/footer');

                }
            else
                {
                    //$data['title'] = 'Home';

                    $this->Signup_model->register_business();
                    //$this->load->view('templates/header', $data);
                    //$this->load->view('home');
                    //$this->load->view('templates/footer');
                    redirect('home', 'refresh');
                }
        }

}