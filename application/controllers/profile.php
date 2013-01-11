<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Connect_model');
        $this->load->model('Coupon_model');
    }

    public function index()
    {
    //check for an existing session and it's a business
        if($this->session->userdata('memberid') && $this->session->userdata('is_business') == 1)
        {

            $data['title'] = 'Profile';
            $data['username'] = $this->session->userdata('username');



            $data['profile'] = $this->Connect_model->get_profile($this->session->userdata('memberid'));
            $data['reviews'] = $this->Connect_model->get_latest_reviews($this->session->userdata('memberid'));
            $data['rating'] = $this->Connect_model->get_ratings($this->session->userdata('memberid'));
            $data['coupons'] = $this->Coupon_model->get_active_coupon($this->session->userdata('memberid'));

            //format the phone number before we send it to the view
            $phone = $this->phone($data['profile']->PhoneNumber);
            $data['phone'] = $phone;


            //load views
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sub_nav.php', $data);
            $this->load->view('biz_profile', $data);
            $this->load->view('templates/footer');
        }
        else
        {
    	    redirect('home', 'location');
        }

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

}