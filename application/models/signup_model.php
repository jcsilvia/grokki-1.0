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

            $this->session->set_userdata('memberid', $row); //set the session userdata to the memberid for future lookups
            return $this->db->insert('addresses', $addressdata);
    }

    public function load_business_categories()
    {   // get the categories from the db
        $query = $this->db->query('select CategoryId, CategoryName from categories');
        $result = array();
        //create the proper array for the view
        foreach ($query->result() as $row)
        {
            $result[$row->CategoryId]= $row->CategoryName;
        }
        return $result;
    }


    public function register_business()
    {
        //get the memberid from the session data
        $memberid = $this->session->userdata('memberid');
        //create the members table update
        $mdata = array(
            'FirstName' => $this->input->post('fname'),
            'LastName' => $this->input->post('lname'),
            'BusinessName' => $this->input->post('businessname')
        );

        $this->db->where('MemberId', $memberid);
        $this->db->update('members', $mdata);

        //create the addresses table update
        $adata = array(
            'Address1' => $this->input->post('address1'),
            'Address2' => $this->input->post('address2'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'PhoneNumber' => $this->input->post('phone')
            );

        $this->db->where('MemberId', $memberid);
        $this->db->update('addresses', $adata);

        $cdata = array(
            'CategoryId' => $this->input->post('business_category'),
            'MemberId' => $memberid
        );

        RETURN $this->db->insert('business_categories', $cdata);

    }

}

