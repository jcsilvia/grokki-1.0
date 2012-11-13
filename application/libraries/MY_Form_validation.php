<?php

class MY_Form_validation extends CI_Form_validation{


    function is_unique($str, $field)
    {
        list($table, $field) = explode('.', $field);
  
        $this->CI->form_validation->set_message('is_unique','%s is not available');
        
    if (isset($this->CI->db))
    {
        $query = $this->CI->db->where($field, $str)->get($table);
        return $query->num_rows() === 0;
    }

        return FALSE;
    }


    function update_unique($value, $params)
    {

        list($table, $field1, $field2, $current_id) = explode(".", $params);

        $this->CI->form_validation->set_message('update_unique', "Sorry, the %s is already being used.");

        $query = $this->CI->db->select()->from($table)->where($field1, $value)->limit(1)->get();

        if ($query->row() && $query->row()->$field2 != $current_id)
        {
            return FALSE;
        }
    }


    function valid_value($value, $params)
    {

        list($table, $field) = explode(".", $params);

        $this->CI->form_validation->set_message('valid_value', "Sorry, the %s is not valid.");

        $query = $this->CI->db->select()->from($table)->where($field, $value)->get();

        if ($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }


}