<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Connect_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_connections($limit, $start)
    {

        $this->db->select('member_associations.AssociateId as MemberId, members.UserName as UserName, members.BusinessName as BusinessName, addresses.City as City, addresses.State as State, member_associations.CreatedDate as CreatedDate, date_format(member_associations.CreatedDate, "%b-%d-%Y") as DateFormatted, categories.CategoryName as CategoryName',FALSE);
        $this->db->from('member_associations');
        $this->db->join('members', 'members.MemberId = member_associations.AssociateId', 'inner');
        $this->db->join('addresses', 'addresses.MemberId = members.MemberId', 'inner');
        $this->db->join('business_categories', 'business_categories.MemberId = members.MemberId', 'inner');
        $this->db->join('categories', 'categories.CategoryId = business_categories.CategoryId', 'inner');
        $this->db->where('member_associations.MemberId', $this->session->userdata('memberid'));
        $this->db->order_by("CreatedDate", "desc");
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result_array();

    }

    public function count_all_connections()
    {

        $this->db->from('member_associations');
        $this->db->where('member_associations.MemberId', $this->session->userdata('memberid'));
        $query = $this->db->count_all_results();
        return $query;

    }

    public function delete_connection($associateid)
    {

        $this->db->where('member_associations.MemberId', $this->session->userdata('memberid'));
        $this->db->where('member_associations.AssociateId', $associateid);
        $this->db->delete('member_associations');
        return TRUE;

    }

    public function get_profile($associateid)
    {

        $this->db->select('members.MemberId as MemberId, members.UserName as UserName, concat(members.FirstName, " ", members.LastName) as ContactName, members.BusinessName as BusinessName, addresses.Address1 as Address1, addresses.City as City, addresses.State as State, addresses.ZipCode as ZipCode, addresses.PhoneNumber as PhoneNumber, date_format(members.CreatedDate, "%b-%d-%Y") as DateFormatted, categories.CategoryName as CategoryName, categories.CategoryId as CategoryId',FALSE);
        $this->db->from('members');
        $this->db->join('addresses', 'addresses.MemberId = members.MemberId', 'inner');
        $this->db->join('business_categories', 'business_categories.MemberId = members.MemberId', 'inner');
        $this->db->join('categories', 'categories.CategoryId = business_categories.CategoryId', 'inner');
        $this->db->where('members.MemberId', $associateid);
        $this->db->where('members.IsBusiness', 1);
        $query = $this->db->get();
        return $query->row();

    }

    public function get_latest_reviews($associateid)
    {

        $this->db->select('members.UserName as Reviewer, member_reviews.Content as Content, date_format(members.CreatedDate, "%b-%d-%Y") as DateFormatted',FALSE);
        $this->db->from('members');
        $this->db->join('member_reviews', 'member_reviews.ReviewerId = members.MemberId', 'inner');
        $this->db->where('member_reviews.MemberId', $associateid);
        $this->db->order_by('member_reviews.CreatedDate', 'desc');
        $this->db->limit(3);
        $query = $this->db->get();
        return $query->result_array();

    }


    public function get_ratings($associateid)
    {

        $this->db->select_avg('Rating');
        $this->db->from('member_ratings');
        $this->db->where('member_ratings.MemberId', $associateid);
        $query = $this->db->get();

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {

            return FALSE;
        }


    }

    public function send_message()
    {

       $data = array(
        'MemberId' => $this->input->post('senderid'),
        'Content' => $this->input->post('content'),
        'RecipientId' => $this->input->post('associateid'),
        'CategoryId' => $this->input->post('categoryid')
    );
        $this->db->insert('messages', $data);
        return TRUE;


    }


}