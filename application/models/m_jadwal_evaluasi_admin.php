<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_jadwal_evaluasi_admin extends CI_Model
{

    public function getjadwal($id)
    {

        $this->db->select('*');
        $this->db->from('tbl_paket_evaluasi');
        $this->db->join('tbl_mata_kuliah', 'tbl_mata_kuliah.id_mata_kuliah = tbl_paket_evaluasi.id_mata_kuliah');
        $this->db->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_mata_kuliah.id_dosen');
        $this->db->where('tbl_mata_kuliah.id_diklat', $id);
        $query = $this->db->get()->result();
        return $query;

    }
}
