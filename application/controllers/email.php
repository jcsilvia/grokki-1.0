<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {

function __construct()
    {
        parent::__construct();

    }



function index()
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'jsilvia@grokki.com', //for testing only, change this to admin@grokki.com for production
            'smtp_pass' => '*******', //change this for check in and deployment
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

    // Set to, from, message, etc.

        $this->email->from('jsilvia@grokki.com', 'Administrator');
        $this->email->to('jon.silvia@gmail.com');

        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();

        echo 'Email sent';

    }





}