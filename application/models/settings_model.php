<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_profile()
    {
        //check to see if this is a business or user profile
        if ($this->session->userdata('is_business') == 1)
        {

            $this->db->select('MemberId, UserName, FirstName, LastName, EmailAddress, BusinessName, Address1, Address2, City, State, ZipCode, PhoneNumber, CategoryId, Tags',FALSE);
            $this->db->from('members');
            $this->db->join('addresses', 'members.MemberId = addresses.MemberId', 'inner');
            $this->db->join('business_categories', 'members.MemberId = business_categories.MemberId', 'inner');
            $this->db->join('tags', 'members.MemberId = tags.MemberId', 'inner');
            $this->db->where('members.MemberId', $this->session->userdata('memberid'));
            $query = $this->db->get();

            return $query->result_array();

        }
        else
        {

            $this->db->select('MemberId, UserName, FirstName, LastName, EmailAddress, ZipCode',FALSE);
            $this->db->from('members');
            $this->db->join('addresses', 'members.MemberId = addresses.MemberId', 'inner');
            $this->db->where('members.MemberId', $this->session->userdata('memberid'));
            $query = $this->db->get();

            return $query->result_array();
        }
    }

    public function set_profile()
    {
        //check to see if this is a business or user profile
        if ($this->session->userdata('is_business') == 1)
        {

        }
        else
        {

        }

    }

    public function change_password()
    {

    }


}