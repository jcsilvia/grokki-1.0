<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }


    public function register_user()
    {
        //form data to insert
            $memberdata = array(
                'UserName' => $this->input->post('username'),
                'UserPassword' => $this->input->post('password'),
                'EmailAddress' => $this->input->post('email'),
                'IsBusiness' => $this->input->post('is_business')
            );
        //insert member data
            $this->db->insert('members', $memberdata);
        //build memberid query
            $this->db->select('MemberId');
            $this->db->from('members');
            $this->db->where('EmailAddress',$this->input->post('email'));
                $query = $this->db->get();
                    $row = $query->row('MemberId');
        //address data and memberid from previous insert
            $addressdata = array('MemberId' => $row,
                          'Zipcode' => $this->input->post('zipcode')
             );

            return $this->db->insert('addresses', $addressdata);
    }



}