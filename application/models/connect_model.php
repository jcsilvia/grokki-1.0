<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Connect_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_connections($connection_id, $limit, $start)
    {

        if ($connection_id == 0)// get all connections

        {

            $this->db->select('`member_associations`.AssociateId as `MemberId`, `members`.UserName as `UserName`, `members`.BusinessName as `BusinessName`, `addresses`.City as `City, `addresses`.State as `State`, `member_associations`.CreatedDate as `CreatedDate`, date_format(`member_associations`.CreatedDate, "%b-%d-%Y") as `DateFormatted`, `categories`.CategoryName as `CategoryName`',FALSE);
            $this->db->from('member_associations');
            $this->db->join('members', 'members.MemberId = member_associations.MemberId', 'inner');
            $this->db->join('addresses', 'addresses.MemberId = members.MemberId', 'inner');
            $this->db->join('business_categories', 'business_categories.MemberId = members.MemberId', 'inner');
            $this->db->join('categories', 'categories.CategoryId = business_categories.CategoryId', 'inner');
            $this->db->where('member_associations.MemberId', $this->session->userdata('memberid'));
            $this->db->order_by("CreatedDate", "desc");
            $this->db->limit($limit, $start);

            $query = $this->db->get();
            return $query->result_array();

        }
        else    //get the connection record for the id passed

        {

        }

    }


}