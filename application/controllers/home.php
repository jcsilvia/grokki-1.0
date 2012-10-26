<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

    function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->database();
        }



function index()

     {
        // check for the user session
       if($this->session->userdata('memberid'))

           {
            // get the inbox for the member

             $this->load->library('pagination');
             $this->load->model('Message_model');
            //config for pagination class
             $config['base_url'] = base_url() . "home/index";
             $config['total_rows'] = $this->Message_model->count_all_messages();
             $config['per_page'] = 10;
             $config['uri_segment'] = 3;
            //implement pagination and pass the correct parameters to the model
             $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
             $data['messages'] = $this->Message_model->get_messages(0, $config["per_page"], $page);
             $this->pagination->initialize($config);
            //pass pagination, data and parameters to the view
             $data["links"] = $this->pagination->create_links();
             $data['title'] = 'Home';
             $data['username'] = $this->session->userdata('username');
             $data['total'] = $config['total_rows'];
             $data['per_page'] = $config['per_page'];

             $this->load->view('templates/header', $data);
             $this->load->view('templates/sub_nav.php', $data);
             $this->load->view('home', $data);
             $this->load->view('templates/footer');

           }

       else

           {

             //If no session, redirect to home_not_logged_in page

               $data['title'] = 'Welcome';
               $this->load->view('templates/homepage_header', $data);
               $this->load->view('home_not_logged_in');
               $this->load->view('templates/footer');

           }

     }



public function logout()
    {
        // destroy the session
        $this->session->unset_userdata('memberid', 'username');
        $this->session->sess_destroy();
        $this->not_logged_in();
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


public function get_message_details()
    {
        // get the message details for a given message id stripped from the url
        $messageid = $this->uri->segment(3,0);

        // check for the session
        if($this->session->userdata('memberid'))

            {

                $data['title'] = 'Messages';
                $data['username'] = $this->session->userdata('username');
                $this->load->model('Message_model');
                $data['messages'] = $this->Message_model->get_messages($messageid, 0, 0);


                //check to see if query returned FALSE result
                if ($data['messages'] == FALSE )
                    {
                        $data['err'] = 'Message not found.';

                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sub_nav.php', $data);
                        $this->load->view('templates/err_msg', $data);
                        $this->load->view('templates/footer');

                    }

                else
                    {

                            // if message has IsRead state of unread, update it before loading the detail page
                            if ($data['messages']->IsRead == 0) { $this->Message_model->update_message_status($messageid); }

                            if ($data['messages']->IsBusiness == 1)
                                {
                                    $data['business'] = $this->Message_model->get_business($data['messages']->SenderId);

                                    $phone = $this->phone($data['business']->PhoneNumber);
                                    $data['phone'] = $phone;

                                    $this->load->view('templates/header', $data);
                                    $this->load->view('templates/sub_nav.php', $data);
                                    $this->load->view('biz_message_detail', $data);
                                    $this->load->view('templates/footer');
                                }
                            else
                                {
                                    $this->load->view('templates/header', $data);
                                    $this->load->view('templates/sub_nav.php', $data);
                                    $this->load->view('message_detail', $data);
                                    $this->load->view('templates/footer');
                                }



                    }
            }

        else

            {

                //If no session, redirect to login page
                $this->not_logged_in();


            }


    }



public function not_logged_in()
    {
        //in any case the session is not present, call this function to redirect to the login page
        redirect('login', 'refresh');
    }


public function delete_message()
    {
        // get the message details for a given message id stripped from the url
        $messageid = $this->uri->segment(3,0);

        // check for the session
        if($this->session->userdata('memberid'))
            {

                $data['title'] = 'Messages';
                $data['username'] = $this->session->userdata('username');
                $this->load->model('Message_model');
                $this->Message_model->delete_messages($messageid);
                redirect('home', 'refresh');

            }
        else
            {
                //If no session, redirect to login page
                $this->not_logged_in();
            }

    }

public function reply_message()
    {

        // get the message details for a given message id stripped from the url
        $messageid = $this->uri->segment(3,0);

        if($this->session->userdata('memberid'))
        {

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('Message_model');

            $data['title'] = 'Messages';
            $data['username'] = $this->session->userdata('username');
            $data['messages'] = $this->Message_model->get_messages($messageid, 0, 0);

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');


            if ($this->form_validation->run() === FALSE)
                {
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('reply_message', $data);
                    $this->load->view('templates/footer');
                }
            else
                {
                    $this->Message_model->reply_messages();
                    redirect('home', 'refresh');
                }

        }
        else
        {
            //If no session, redirect to login page
            $this->not_logged_in();
        }

    }


public function create_message()
    {
        if($this->session->userdata('memberid'))
            {

                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->load->model('Message_model');

                $data['title'] = 'Create New Message';
                $data['username'] = $this->session->userdata('username');

                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean');
                $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required|min-length[5]|numeric|xss_clean');
                $this->form_validation->set_rules('category', 'Category', 'trim|required|xss_clean');


                if ($this->form_validation->run() === FALSE)
                {
                    $data['categories'] = $this->Message_model->load_business_categories();
                    $data['zipcode'] = $this->Message_model->get_user_zipcode($this->session->userdata('memberid'));
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('create_message', $data);
                    $this->load->view('templates/footer');
                }
                else
                {
                    $this->Message_model->create_message();
                    redirect('home', 'refresh');
                }

            }
        else
        {
            //If no session, redirect to login page
            $this->not_logged_in();
        }

    }


}