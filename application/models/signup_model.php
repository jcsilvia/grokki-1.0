<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }


    public function register_user()
{

    $memberdata = array(
        'UserName' => $this->input->post('username'),
        'UserPassword' => $this->input->post('password'),
        'EmailAddress' => $this->input->post('email'),
        'IsBusiness' => $this->input->post('is_business')
    );

    $this->db->insert('members', $memberdata);

    $this->db->select('MemberId');
    $this->db->from('members');
    $this->db->where('EmailAddress',$this->input->post('email'));
        $query = $this->db->get();
            $row = $query->row('MemberId');

    $addressdata = array('MemberId' => $row,
                  'Zipcode' => $this->input->post('zipcode')
     );

    return $this->db->insert('addresses', $addressdata);
}



}