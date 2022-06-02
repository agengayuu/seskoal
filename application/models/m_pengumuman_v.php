<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_pengumuman_v extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function tampil_data()
    {
        $this->db->select('id_pengumuman', 'judul_pengumuman', 'tgl_pengumuman')->from('tbl_pengumuman')->get();
        return $this->db->get('tbl_pengumuman');
    }

    public function detail($id_pengumuman)
    {
        $hasil = $this->db->where('id_pengumuman', $id_pengumuman)->get('tbl_pengumuman');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }
}
