<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_hasil extends CI_Model{

    function construct(){
        parent:: __construct();
    }


    public function tampil_data2(){
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
        $this->db->where('tbl_mahasiswa_evaluasi.id_evaluasi', $id);
        $query = $this->db->get();
        return $query->result();
    }
}

?>