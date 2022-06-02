<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_hasil extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function tampil_data2()
    {
        return $this->db->get('tbl_soal_evaluasi');
    }

    public function get_peserta2($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_mahasiswa_evaluasi');
        $this->db->join('tbl_mata_kuliah', 'tbl_mahasiswa_evaluasi.id_mata_kuliah=tbl_mata_kuliah.id_mata_kuliah');
        $this->db->join('tbl_profil_mahasiswa', 'tbl_mahasiswa_evaluasi.id_mahasiswa=tbl_profil_mahasiswa.id_mahasiswa');
        $this->db->where('tbl_mahasiswa_evaluasi.id_mata_kuliah', $id);
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function hasilmhs()
    {

        $query = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_mahasiswa.*, tbl_mata_kuliah.*
                                from tbl_mahasiswa_evaluasi
                                  join tbl_mahasiswa
                                on tbl_mahasiswa_evaluasi.id_mahasiswa = tbl_mahasiswa.id_mahasiswa
                                  join tbl_mata_kuliah
                                on tbl_mahasiswa_evaluasi.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
                                where tbl_mata_kuliah.id_mata_kuliah = $id")->result();
        echo "<pre>";
        print_r($query);die;
        return $query->result();

    }

    public function get_peserta3()
    {
        $this->db->select('*');
        $this->db->from('tbl_mahasiswa_evaluasi');
        $this->db->join('tbl_mata_kuliah', 'tbl_mahasiswa_evaluasi.id_mata_kuliah=tbl_mata_kuliah.id_mata_kuliah');
        $this->db->join('tbl_profil_mahasiswa', 'tbl_mahasiswa_evaluasi.id_mahasiswa=tbl_profil_mahasiswa.id_mahasiswa');
        $this->db->order_by('nilai', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function cetak($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_mahasiswa_evaluasi');
        $this->db->join('tbl_mata_kuliah', 'tbl_mahasiswa_evaluasi.id_mata_kuliah=tbl_mata_kuliah.id_mata_kuliah');
        $this->db->join('tbl_profil_mahasiswa', 'tbl_mahasiswa_evaluasi.id_mahasiswa=tbl_profil_mahasiswa.id_mahasiswa');
        $this->db->where('tbl_mahasiswa_evaluasi.id_eval', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
