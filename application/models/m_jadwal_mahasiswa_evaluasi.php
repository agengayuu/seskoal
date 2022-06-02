<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_jadwal_mahasiswa_evaluasi extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function tampil_data2()
    {
        return $this->db->get('tbl_paket_evaluasi');
    }
}
