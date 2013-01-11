<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupons extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Coupon_model');
    }

    public function index()
    {
        //check for an existing session and it's a business
        if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
        {

            $data['title'] = 'Coupons';
            $data['username'] = $this->session->userdata('username');

            $data['coupons'] = $this->Coupon_model->get_active_coupon($this->session->userdata('memberid'));

            //load views
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('coupons', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            redirect('home', 'location');
        }

    }

    public function edit()
        {
            if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
            {
                $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');

                //strip the coupon id out of the url for use in the model
                $couponid = $this->uri->segment(3,0);

                //get the coupon and coupon activity data
                $data['coupons'] = $this->Coupon_model->get_coupon($couponid);

                $data['title'] = 'Coupons';
                $data['username'] = $this->session->userdata('username');

                //set form validation rules
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[30]|xss_clean');
                $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[100]|xss_clean');

                $this->output->nocache(); // set http header to disable caching if user hits back button

                if ($this->form_validation->run() === FALSE)
                {
                    //load views
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('modify_coupon.php', $data);
                    $this->load->view('templates/footer');

                }
                else
                {
                    $this->Coupon_model->update_coupon();
                    $this->session->set_flashdata('flashSuccess', 'Coupon updated successfully');
                    redirect('coupons', 'location');
                }



            }

            else
            {
                redirect('home', 'location');
            }
        }

    public function create()
        {

            if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
                {
                    $this->load->helper(array('form', 'url'));
                    $this->load->library('form_validation');

                    $data['title'] = 'Coupons';
                    $data['username'] = $this->session->userdata('username');

                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[30]|xss_clean');
                    $this->form_validation->set_rules('description', 'Description', 'trim|required|max_length[100]|xss_clean');

                    $this->output->nocache(); // set http header to disable caching if user hits back button
                    if ($this->form_validation->run() === FALSE)
                    {
                        //load views
                        $this->load->view('templates/header', $data);
                        $this->load->view('templates/sub_nav.php', $data);
                        $this->load->view('create_coupon.php', $data);
                        $this->load->view('templates/footer');

                    }
                    else
                    {
                        $this->Coupon_model->create_coupon();
                        $this->session->set_flashdata('flashSuccess', 'Coupon created successfully');
                        redirect('coupons', 'location');
                    }
                }
            else
                {
                    redirect('home', 'location');
                }
        }

    public function view()
        {
            if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
                {
                    $this->load->library('pagination');


                    $config['base_url'] = base_url() . "coupons/view";
                    $config['total_rows'] = $this->Coupon_model->count_all_coupons();
                    $config['per_page'] = 3;
                    $config['uri_segment'] = 3;

                    //implement pagination and pass the correct parameters to the model
                    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                    $data['coupons'] = $this->Coupon_model->get_all_coupons($config["per_page"], $page);
                    $this->pagination->initialize($config);

                    //pass pagination, data and parameters to the view
                    $data["links"] = $this->pagination->create_links();
                    $data['total'] = $config['total_rows'];
                    $data['per_page'] = $config['per_page'];

                    $data['title'] = 'Coupons';
                    $data['username'] = $this->session->userdata('username');


                    //load views
                    $this->load->view('templates/header', $data);
                    $this->load->view('templates/sub_nav.php', $data);
                    $this->load->view('view_all_coupons.php', $data);
                    $this->load->view('templates/footer');

                }
            else
                {
                    redirect('home', 'location');
                }
        }

    public function delete()
        {
            if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
            {
                //strip the coupon id out of the url for use in the model
                $couponid = $this->uri->segment(3,0);

                $this->Coupon_model->delete_coupon($couponid, $this->session->userdata('memberid'));
                $this->session->set_flashdata('flashSuccess', 'Coupon deleted successfully');
                redirect('coupons', 'location');


            }
            else
            {
                redirect('home', 'location');
            }
        }

    public function activate()
    {
        if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
        {
            //strip the coupon id out of the url for use in the model
            $couponid = $this->uri->segment(3,0);

            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');

            $data['coupons'] = $this->Coupon_model->get_coupon($couponid);
            $data['coupon_dates'] = $this->Coupon_model->get_coupon_activity($couponid);

            $data['title'] = 'Coupons';
            $data['username'] = $this->session->userdata('username');


            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('startdate', 'Start date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('enddate', 'End date', 'trim|required|xss_clean');


            $this->output->nocache(); // set http header to disable caching if user hits back button
            if ($this->form_validation->run() === FALSE)
            {
                //load views
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sub_nav.php', $data);
                $this->load->view('activate_coupon.php', $data);
                $this->load->view('templates/footer');

            }
            else
            {
                $this->Coupon_model->deactivate_coupon($this->session->userdata('memberid'));
                $this->Coupon_model->activate_coupon($couponid, $this->session->userdata('memberid'));
                $this->session->set_flashdata('flashSuccess', 'Coupon activated successfully');
                redirect('coupons', 'location');
            }





        }
        else
        {
            redirect('home', 'location');
        }
    }

}