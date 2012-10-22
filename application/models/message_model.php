<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model {


    public function __construct()
        {
            $this->load->database();

        }


    public function get_messages()
        {

            $this->db->select('`message_inbox`.MessageId as `MessageId`, `message_inbox`.CreatedDate as `CreatedDate`, date_format(`message_inbox`.CreatedDate, "%b-%d-%Y") as `DateFormatted`, `message_inbox`.SenderId as `SenderId`, `message_inbox`.IsRead as `IsRead`, `members`.UserName as `SenderName`, `messages`.Content as `Content`, `messages`.ParentMessageId as `ParentMessage`, `categories`.CategoryName as `CategoryName`',FALSE);
            $this->db->from('message_inbox');
            $this->db->join('messages', 'messages.MessageId = message_inbox.MessageId', 'inner');
            $this->db->join('members', 'members.MemberId = message_inbox.SenderId', 'inner');
            $this->db->join('categories', 'categories.CategoryId = messages.CategoryId', 'inner');
            $this->db->where('message_inbox.MemberId', $this->session->userdata('memberid'));
            $this->db->order_by("CreatedDate", "desc");
            $this->db->order_by("IsRead", "asc");

            $query = $this->db->get();
            return $query->result_array();

        }



}