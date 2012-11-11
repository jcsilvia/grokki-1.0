<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model {


    public function __construct()
        {
            $this->load->database();
            $this->load->library('session');
        }


    public function search($limit, $start)
        {
            //ensure these are cast as integers
            $offset = (int) $start;
            $limit = (int) $limit;

            $sql =
                "SELECT * FROM (
                  SELECT 1 AS 'Order',m.MemberId AS 'SourceId',m.BusinessName, a.Address1 AS 'Address', a.City, a.State, a.Zipcode, a.PhoneNumber, m.UserName AS 'ContactName'
                  FROM members m, addresses a, business_categories bc, tags t
                  WHERE m.MemberId = a.MemberId
                    AND m.MemberId = bc.MemberId
                    AND m.MemberId = t.MemberId
                    AND m.IsBusiness = 1
                    AND a.City LIKE ?
                    AND a.State = ?
                    AND bc.CategoryId = ?
                    AND MATCH(t.BusinessName,t.Tags)
                      AGAINST (? IN BOOLEAN MODE) -- change to query expansion once we have more data
                  UNION
                  SELECT 2 AS 'Order',SourceId,BusinessName, Address, City, State, Zipcode, PhoneNumber, ContactName
                  FROM business_search
                  WHERE
                      City LIKE ?
                      AND State = ?
                      AND CategoryId = ?
                      AND MATCH (BusinessName,Sic4CodeDescription)
                        AGAINST (? WITH QUERY EXPANSION)
                 ) q1 LIMIT ?,?";

            $query = $this->db->query($sql, array($this->session->userdata('city'),$this->session->userdata('state'),$this->session->userdata('categoryid'),$this->session->userdata('terms'),$this->session->userdata('city'),$this->session->userdata('state'),$this->session->userdata('categoryid'),$this->session->userdata('terms'),$offset,$limit));
            return $query->result_array();


        }


    public function count_all_search_results()
    {
        $sql = "
                SELECT * FROM (
                  SELECT 1 AS 'Order',m.MemberId AS 'SourceId',m.BusinessName, a.Address1 AS 'Address', a.City, a.State, a.Zipcode, a.PhoneNumber, m.UserName AS 'ContactName'
                  FROM members m, addresses a, business_categories bc, tags t
                  WHERE m.MemberId = a.MemberId
                    AND m.MemberId = bc.MemberId
                    AND m.MemberId = t.MemberId
                    AND m.IsBusiness = 1
                    AND bc.CategoryId = ?
                    AND a.City = ?
                    AND a.State = ?
                    AND MATCH(t.BusinessName,t.Tags)
                      AGAINST (? IN BOOLEAN MODE) -- change to query expansion once we have more data
                  UNION
                  SELECT 2 AS 'Order',SourceId,BusinessName, Address, City, State, Zipcode, PhoneNumber, ContactName
                  FROM business_search
                  WHERE
                      City = ?
                      AND State = ?
                      AND CategoryId = ?
                      AND MATCH (BusinessName,Sic4CodeDescription)
                        AGAINST (? WITH QUERY EXPANSION)
                 ) q1";

        $query = $this->db->query($sql, array($this->session->userdata('city'),$this->session->userdata('state'),$this->session->userdata('categoryid'),$this->session->userdata('terms'),$this->session->userdata('city'),$this->session->userdata('state'),$this->session->userdata('categoryid'),$this->session->userdata('terms')));
        return $query->num_rows();

    }


}
