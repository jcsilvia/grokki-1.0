<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Coupon_model extends CI_Model {


    public function __construct()
    {
        $this->load->database();
    }

    public function get_active_coupon($memberid)
    {
        $memberid = (int) $memberid;

         $sql= "SELECT c.CouponId, c.MemberId, m.BusinessName, UPPER(c.CouponCode) as 'CouponCode', c.Title, c.Description, date_format(ca.StartDate, '%m/%d/%Y') as 'StartDate', date_format(ca.EndDate, '%m/%d/%Y') as 'EndDate'
                FROM coupons c, coupon_activity ca, members m
                WHERE c.CouponId = ca.CouponId
                  and m.MemberId = c.MemberId
                  AND ca.StartDate <= current_date
                  AND ca.EndDate > current_date
                  AND c.MemberId = ?";

        $query = $this->db->query($sql, array($memberid));

        return $query->row();
    }

    public function create_coupon()
    {
        //generate random string for coupon code
        $random = substr(md5(rand()), 0, 10);

        //form data to insert
        $coupondata = array(
            'Title' => $this->input->post('title'),
            'MemberId' => $this->session->userdata('memberid'),
            'Description' => $this->input->post('description'),
            'CouponCode' => $random
        );

        //insert coupon data
        $this->db->insert('coupons', $coupondata);

    }

    public function update_coupon()
    {
        $cdata = array(
            'Title' => $this->input->post('title'),
            'Description' => $this->input->post('description')
        );

        $this->db->where('CouponId', $this->input->post('couponid'));
        $this->db->where('MemberId', $this->session->userdata('memberid'));
        $this->db->update('coupons', $cdata);

    }

    public function get_coupon($couponid)
    {
        $sql= "SELECT c.CouponId, c.MemberId, m.BusinessName, UPPER(c.CouponCode) as 'CouponCode', c.Title, c.Description
                FROM coupons c, members m
                WHERE m.MemberId = c.MemberId
                  AND c.CouponId = ?
                  AND c.MemberId = ?";

        $query = $this->db->query($sql, array($couponid, $this->session->userdata('memberid')));

        return $query->row();
    }

    public function get_coupon_activity($couponid)
    {
        $sql= "SELECT ca.CouponId, c.MemberId, date_format(ca.StartDate, '%m/%d/%Y') as 'StartDate', date_format(ca.EndDate, '%m/%d/%Y') as 'EndDate'
                FROM coupons c, coupon_activity ca
                WHERE c.CouponId = ca.CouponId
                  AND ca.CouponId = ?
                  AND c.MemberId = ?";

        $query = $this->db->query($sql, array($couponid, $this->session->userdata('memberid')));

        return $query->row();
    }

    public function get_all_coupons($limit, $start)
    {


        $this->db->select('coupons.CouponId, coupons.MemberId, members.BusinessName, UPPER(coupons.CouponCode) as "CouponCode", coupons.Title, coupons.Description, coupons.CreatedDate',FALSE);
        $this->db->from('coupons');
        $this->db->join('members', 'members.MemberId = coupons.MemberId', 'inner');
        $this->db->where('coupons.MemberId', $this->session->userdata('memberid'));
        $this->db->order_by("CreatedDate", "desc");
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result_array();

    }

    public function count_all_coupons()
    {
        $this->db->from('coupons');
        $this->db->where('coupons.MemberId', $this->session->userdata('memberid'));
        $query = $this->db->count_all_results();
        return $query;
    }

    public function delete_coupon($CouponId, $MemberId)
    {
        $this->db->delete('coupon_activity', array('CouponId' => $CouponId));
        $this->db->delete('coupons', array('CouponId' => $CouponId, 'MemberId' => $MemberId));
        return TRUE;
    }

    public function activate_coupon($CouponId, $MemberId)
    {
        $sql="INSERT INTO coupon_activity (CouponId, MemberId, StartDate, EndDate)
               VALUES(?,?,STR_TO_DATE(?, '%m/%d/%Y'),STR_TO_DATE(?, '%m/%d/%Y'))";

        $data = array(
            'CouponId' => $this->input->post('couponid'),
            'MemberId' => $this->session->userdata('memberid') ,
            'StartDate' => $this->input->post('startdate') ,
            'EndDate' => $this->input->post('enddate')
        );


        $query = $this->db->query($sql, $data);
        return $query;

    }

    public function deactivate_coupon($MemberId)
    {
        $this->db->delete('coupon_activity', array('MemberId' => $MemberId));
        return TRUE;
    }
}