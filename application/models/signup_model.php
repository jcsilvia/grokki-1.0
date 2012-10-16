<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }

    function ConvertCheckboxValue($value) {
        return $value == "on" ? 1 : 0;
    }

    public function register_user()
{
    $this->load->helper('url');
    $data = array(
        'UserName' => $this->input->post('username'),
        'UserPassword' => $this->input->post('password'),
        'EmailAddress' => $this->input->post('email'),
        'IsBusiness' => $this->input->post('is_business')
    );



    return $this->db->insert('members', $data);
}

}