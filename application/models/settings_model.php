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

            $this->db->select('members.MemberId, members.UserName, members.FirstName, members.LastName, members.EmailAddress, members.BusinessName, addresses.Address1,
                                addresses.Address2, addresses.City, addresses.State, addresses.ZipCode, addresses.PhoneNumber, business_categories.CategoryId, tags.Tags',FALSE);
            $this->db->from('members');
            $this->db->join('addresses', 'members.MemberId = addresses.MemberId', 'inner');
            $this->db->join('business_categories', 'members.MemberId = business_categories.MemberId', 'inner');
            $this->db->join('tags', 'members.MemberId = tags.MemberId', 'inner');
            $this->db->where('members.MemberId', $this->session->userdata('memberid'));
            $query = $this->db->get();

            return $query->row();
        }
        else
        {

            $this->db->select('members.MemberId, members.UserName, members.EmailAddress, addresses.ZipCode',FALSE);
            $this->db->from('members');
            $this->db->join('addresses', 'members.MemberId = addresses.MemberId', 'inner');
            $this->db->where('members.MemberId', $this->session->userdata('memberid'));
            $query = $this->db->get();

            return $query->row();
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