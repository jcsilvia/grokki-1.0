<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
    	redirect('home', 'location');
    }

}