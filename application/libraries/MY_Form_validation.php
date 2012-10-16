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

}