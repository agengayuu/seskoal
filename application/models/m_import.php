<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_import extends CI_Model
{

    public function insert($data)
    {
        $insert = $this->db->insert_batch('tbl_mahasiswa', $data);
        if ($insert) {
            return true;
        }
    }
    public function getData()
    {
        $this->db->select('*');
        return $this->db->get('tbl_mahasiswa')->result_array();
    }

}
