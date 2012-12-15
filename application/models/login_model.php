<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
        {
            $this->load->database();
        }


    public function login_user()
        {

            // get the user record
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $query = $this->db->query("SELECT `MemberId`, `UserName`, LEFT(`PasswordSalt`, 5) as `Lsalt`, RIGHT(`PasswordSalt`, 5) as `Rsalt`, IsBusiness as `IsBusiness`  FROM `members` WHERE `UserName` = '" .$user. "'" . "OR `EmailAddress` = '" .$user. "'");

            if ($query->num_rows() > 0)
                {
                        $row = $query->row();
                        $password = sha1($row->Lsalt .$pass . $row->Rsalt);

                        $username = $row->UserName;

                        $this->db->where('UserName', $username);
                        $this->db->where('UserPassword', $password);
                        $query2 = $this->db->get('members');

                    if ($query2->num_rows() > 0)
                        {

                            // set session login
                            $this->session->sess_destroy();
                            $this->session->sess_create();
                            $this->session->set_userdata('memberid', $row->MemberId);
                            $this->session->set_userdata('username', $username);
                            $this->session->set_userdata('is_business', $row->IsBusiness);
                            $this->db->query('UPDATE `members` SET LastLogin = NOW() WHERE MemberId = ' . $row->MemberId);

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

    public function forgot_password()
        {
            $user = $this->input->post('username');
            $query = $this->db->query("SELECT MemberId FROM members WHERE UserName = '" .$user. "'" . " OR EmailAddress = '" .$user. "'");

            if ($query->num_rows() > 0)
                {
                    $row = $query->row();
                    $validation_string = $this->generateRandomString();
                    $data = array(
                        'ValidationString' => $validation_string
                    );
                    $this->db->where('MemberId', $row->MemberId);
                    $this->db->update('members', $data);

                    // return the memberid, email, and new valudationstring to the controller
                    $this->db->select('UserName, EmailAddress, ValidationString');
                    $this->db->from('members');
                    $this->db->where('MemberId', $row->MemberId);
                    $query2 = $this->db->get();

                    return $query2->row();


                }
            else
                {
                    return FALSE;
                }
        }


    public function change_password()
        {
            $password1 = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $string = $this->input->post('validation_string');

            //get the users salt and old password
            $query = $this->db->query("SELECT LEFT(`PasswordSalt`, 5) as `Lsalt`, RIGHT(`PasswordSalt`, 5) as `Rsalt` FROM `members` WHERE `ValidationString` IS NOT NULL AND `ValidationString` = '" .$string. "'");

            if ($query->num_rows() > 0)
            {
                //hash the form input to compare against the old password and itself
                $row = $query->row();
                $newpassword1 = sha1($row->Lsalt . $password1 . $row->Rsalt);
                $newpassword2 = sha1($row->Lsalt . $password2 . $row->Rsalt);

                if ($newpassword1 == $newpassword2)
                {
                    $pdata = array(
                        'UserPassword' => $newpassword1
                    );

                    $this->db->where('ValidationString', $string);
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

    private function generateRandomString($length = 15)
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

}