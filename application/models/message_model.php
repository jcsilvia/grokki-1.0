<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Message_model extends CI_Model {


    public function __construct()
        {
            $this->load->database();

        }


    public function get_messages($messageid, $limit, $start)
        {

            if ($messageid == 0)

                {

                        $this->db->select('`message_inbox`.MessageId as `MessageId`, `message_inbox`.CreatedDate as `CreatedDate`, date_format(`message_inbox`.CreatedDate, "%b-%d-%Y") as `DateFormatted`, `message_inbox`.SenderId as `SenderId`, `message_inbox`.IsRead as `IsRead`, `members`.UserName as `SenderName`, `messages`.Content as `Content`, `messages`.ParentMessageId as `ParentMessage`, `categories`.CategoryName as `CategoryName`',FALSE);
                        $this->db->from('message_inbox');
                        $this->db->join('messages', 'messages.MessageId = message_inbox.MessageId', 'inner');
                        $this->db->join('members', 'members.MemberId = message_inbox.SenderId', 'inner');
                        $this->db->join('categories', 'categories.CategoryId = messages.CategoryId', 'inner');
                        $this->db->where('message_inbox.MemberId', $this->session->userdata('memberid'));
                        $this->db->order_by("CreatedDate", "desc");
                        $this->db->order_by("IsRead", "asc");
                        $this->db->limit($limit, $start);

                        $query = $this->db->get();
                        return $query->result_array();

                }
            else

                {

                        $this->db->select('`message_inbox`.MemberId as `MemberId`, `message_inbox`.MessageId as `MessageId`, `message_inbox`.CreatedDate as `CreatedDate`, date_format(`message_inbox`.CreatedDate, "%b-%d-%Y") as `DateFormatted`, `message_inbox`.SenderId as `SenderId`, `message_inbox`.IsRead as `IsRead`, `members`.UserName as `SenderName`, `messages`.Content as `Content`, `messages`.ParentMessageId as `ParentMessage`, `categories`.CategoryName as `CategoryName`, `categories`.CategoryId as `CategoryId`',FALSE);
                        $this->db->from('message_inbox');
                        $this->db->join('messages', 'messages.MessageId = message_inbox.MessageId', 'inner');
                        $this->db->join('members', 'members.MemberId = message_inbox.SenderId', 'inner');
                        $this->db->join('categories', 'categories.CategoryId = messages.CategoryId', 'inner');
                        $this->db->where('message_inbox.MemberId', $this->session->userdata('memberid'));
                        $this->db->where('message_inbox.MessageId', $messageid);


                        $query = $this->db->get();

                        if($query->num_rows() > 0)
                        {
                            return $query->row();
                        }
                        else
                        {

                            return false;
                        }

                }
        }

    public function update_message_status($messageid)
        {
            $this->db->set('IsRead', '1', FALSE);
            $this->db->where('MessageId', $messageid);
            $this->db->update('message_inbox');
            return true;
        }

    public function count_all_messages()
        {
            $this->db->from('message_inbox');
            $this->db->where('message_inbox.MemberId', $this->session->userdata('memberid'));
            $query = $this->db->count_all_results();
            return $query;

        }

    public function delete_messages($messageid)
        {

            $this->db->where('message_inbox.MemberId', $this->session->userdata('memberid'));
            $this->db->where('message_inbox.MessageId', $messageid);
            $this->db->delete('message_inbox');
            return true;

        }

    public function reply_messages($messageid)
        {   $data = array(
                            'MemberId' => $this->session->userdata('memberid'),
                            'Content' => $this->input->post('content'),
                            'ParentMessageId' => $this->input->post('parentmessage'),
                            'RecipientId' => $this->input->post('senderid'),
                            'CategoryId' => $this->input->post('categoryid')
                            );
            $this->db->insert('messages', $data);
            return true;
        }


}