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

            $mdata = array(
                'UserName' => $this->input->post('username'),
                'FirstName' => $this->input->post('fname'),
                'LastName' => $this->input->post('lname'),
                'BusinessName' => $this->input->post('businessname')

            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('members', $mdata);


            $adata = array(
                'Zipcode' => $this->input->post('zipcode'),
                'Address1' => $this->input->post('address1'),
                'Address2' => $this->input->post('address2'),
                'City' => $this->input->post('city'),
                'State' => $this->input->post('state'),
                'PhoneNumber' => $this->input->post('phone')
            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('addresses', $adata);


            $cdata = array(
                'CategoryId' => $this->input->post('business_category')
            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('business_categories', $cdata);


            $tdata = array(
                'Tags' => $this->input->post('tags')
            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('tags', $tdata);



        }
        else
        {
            $mdata = array(
                'UserName' => $this->input->post('username')
            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('members', $mdata);


            $adata = array(
                'Zipcode' => $this->input->post('zipcode')
            );

            $this->db->where('MemberId', $this->session->userdata('memberid'));
            $this->db->update('addresses', $adata);

        }

        $this->session->unset_userdata('username');
        $this->session->set_userdata('username', $this->input->post('username'));

        return TRUE;
    }

    public function change_password()
    {

        //get the users salt and old password
        $query = $this->db->query("SELECT LEFT(`PasswordSalt`, 5) as `Lsalt`, RIGHT(`PasswordSalt`, 5) as `Rsalt`, UserPassword as `UserPassword`  FROM `members` WHERE `MemberId` = '" .$this->session->userdata('memberid'). "'");

        if ($query->num_rows() > 0)
        {
            //hash the form input to compare against the old password and itself
            $row = $query->row();
            $password = sha1($row->Lsalt . $this->input->post('oldpassword') . $row->Rsalt);
            $newpassword1 = sha1($row->Lsalt . $this->input->post('newpassword1') . $row->Rsalt);
            $newpassword2 = sha1($row->Lsalt . $this->input->post('newpassword2') . $row->Rsalt);

            if ($password == $row->UserPassword && $newpassword1 == $newpassword2)
            {
                $pdata = array(
                    'UserPassword' => $newpassword1
                );

                $this->db->where('MemberId', $this->session->userdata('memberid'));
                $this->db->update('members', $pdata);

                return TRUE;
            }
            else
            {
                return FALSE;
            }

        }

        else
        {
            return FALSE;
        }

    }

    public function change_email()
    {

    }


}