<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_hak extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function adminsimpan($d)
    {
        return $this->db->insert('grupuser', $d);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function edit_data_aksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}
