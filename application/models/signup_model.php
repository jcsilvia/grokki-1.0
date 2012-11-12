<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();

    }


    public function register_user()
    {
        //generate random numbers to use as salt for password hashing
        $random1 = substr(number_format(time() * rand(),0,'',''),0,5);
        $random2 = substr(number_format(time() * rand(),0,'',''),0,5);
        $random = $random1 . $random2;

        $password = sha1($random1 . $this->input->post('password') . $random2);

        //form data to insert
            $memberdata = array(
                'UserName' => $this->input->post('username'),
                'UserPassword' => $password,
                'EmailAddress' => $this->input->post('email'),
                'IsBusiness' => $this->input->post('is_business'),
                'PasswordSalt' => $random
            );

        //insert member data
            $this->db->insert('members', $memberdata);

        //build memberid query
            $this->db->select('MemberId');
            $this->db->from('members');
            $this->db->where('EmailAddress',$this->input->post('email'));
            $query = $this->db->get();

            $row = $query->row();
            $memberid = $row->MemberId;
            $username = $this->input->post('username');


        //address data and memberid from previous insert
            $addressdata = array('MemberId' => $memberid,
                          'Zipcode' => $this->input->post('zipcode')
             );

        $this->db->insert('addresses', $addressdata);

        $this->session->set_userdata('memberid', $memberid); //set the session userdata to the memberid for future lookups
        $this->session->set_userdata('username', $username);

        if ($this->input->post('is_business') == 0)
        {
            //send an initial message to the new user
            $messagedata = array('MemberId' => 1,
                'RecipientId' => $memberid,
                'Content' => 'Welcome to Grokki. To start connecting with local businesses and finding what you need, either click on  <a href="/home/create_message">New Message</a> or <a href="/search">Search</a> now.',
                'CategoryId' => '22'
            );
            $this->db->insert('messages', $messagedata);
        }
        else
        {
            //send an initial message to the new business
            $messagedata = array('MemberId' => 1,
                'RecipientId' => $memberid,
                'Content' => 'Welcome to Grokki. To start connecting with consumers, ensure your business profile is complete and accurate. To do this click on  <a href="/settings">Settings</a> now. Especially important is the Address, Business Category and Tags, as these help us connect you to local consumers.',
                'CategoryId' => '22'
            );
            $this->db->insert('messages', $messagedata);
        }


            return true;
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

        //create the addresses table insert
        $adata = array(
            'Address1' => $this->input->post('address1'),
            'Address2' => $this->input->post('address2'),
            'City' => $this->input->post('city'),
            'State' => $this->input->post('state'),
            'PhoneNumber' => $this->input->post('phone')
            );

        $this->db->where('MemberId', $memberid);
        $this->db->update('addresses', $adata);

        //create the business_category insert
        $cdata = array(
            'CategoryId' => $this->input->post('business_category'),
            'MemberId' => $memberid
        );

         $this->db->insert('business_categories', $cdata);

        //create the tags insert
        $tdata = array(
            'Tags' => $this->input->post('tags'),
            'MemberId' => $memberid,
            'BusinessName' => $this->input->post('businessname')
        );

        $this->db->insert('tags', $tdata);

        $this->session->set_userdata('businessname', $this->input->post('businessname'));

        return true;

    }

}

