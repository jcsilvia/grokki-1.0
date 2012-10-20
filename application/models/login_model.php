<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
        {
            $this->load->database();
        }


    public function login_user()
        {

            //$this->db->select("`MemberId`, left(`PasswordSalt`, 5) as 'Lsalt', right(`PasswordSalt`, 5) as 'Rsalt'", FALSE);
            //$this->db->where('UserName', $this->input->post('username'));
            //$query = $this->db->get('members');
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            $query = $this->db->query("SELECT `MemberId`, LEFT(`PasswordSalt`, 5) as `Lsalt`, RIGHT(`PasswordSalt`, 5) as `Rsalt` FROM `members` WHERE `UserName` = '" .$user. "'");

            if ($query->num_rows() > 0)
                {
                        $row = $query->row();
                        $password = sha1($row->Lsalt .$pass . $row->Rsalt);

                        $this->db->where('UserName', $user);
                        $this->db->where('UserPassword', $password);
                        $query2 = $this->db->get('members');

                    if ($query2->num_rows() > 0)
                        {

                            // set session login
                            $this->session->sess_destroy();
                            $this->session->sess_create();
                            $this->session->set_userdata('memberid', $row->MemberId);
                            $this->session->set_userdata('username', $user);

                            $this->db->query('UPDATE `members` SET last_login = NOW() WHERE MemberId = ' . $row->MemberId);

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



}