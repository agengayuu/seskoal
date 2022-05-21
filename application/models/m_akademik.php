<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_akademik extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function getdata()
    {
        $query = $this->db->get('thn_akademik')->result();
        return ($query);
    }

    public function savedata($data)
    {
        return $this->db->insert('thn_akademik', $data);
    }

    public function editdata($where)
    {
        return $this->db->get_where('thn_akademik', $where);
    }

    public function updatedata($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

}
