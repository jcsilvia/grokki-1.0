<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }


    public function validate_email($validation_string = 0)
    {

        $query = "SELECT MemberId from members where ValidationString = ?";
        $result = $this->db->query($query, $validation_string);

        if ($result->num_rows() == 1)
        {

            $row = $result->row();

            $update_activated = "UPDATE `members` SET IsEmailVerified = 1 WHERE ValidationString = ? AND ?";

            $this->db->query($update_activated, array($validation_string, $row->MemberId));

            return TRUE;
        }
        else
        {

            return FALSE;

        }


    }


}