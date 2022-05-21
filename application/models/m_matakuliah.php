<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_matakuliah extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function tampildata()
    {
        $data['title'] = 'Mata kuliah';
        $hasil = "SELECT tbl_mata_kuliah.*, tbl_dosen.nama, tbl_diklat.nama_diklat
        FROM tbl_mata_kuliah
        INNER JOIN tbl_dosen ON tbl_mata_kuliah.id_dosen=tbl_dosen.id_dosen
        INNER JOIN tbl_diklat ON tbl_mata_kuliah.id_diklat = tbl_diklat.id_diklat";
        return $this->db->query($hasil);
    }

    public function adminsimpan($data)
    {
        return $this->db->insert('tbl_mata_kuliah', $data);

    }

    public function adminedit($where, $table)
    {
        return $this->db->get_where($table, $where);

    }

    public function admineditaksi($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //  public function daftarsimpan($data){
    //     return $this->db->insert('tbl_daftar_matkul', $data);

    // }

//     public function tampildaftar(){
    //         $data['title'] = 'Mata kuliah';
    //         $hasil = "Select tbl_daftar_matkul.*, tbl_mata_kuliah.*, thn_akademik.*, tbl_dosen.*
    //                                     from tbl_mata_kuliah
    //                                     join tbl_daftar_matkul
    //                                     on tbl_mata_kuliah.id_mata_kuliah = tbl_daftar_matkul.id_mata_kuliah
    //                                     join thn_akademik
    //                                     on thn_akademik.id_akademik = tbl_daftar_matkul.id_akademik
    //                                     join tbl_dosen
    //                                     on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen
    //                                     where tbl_mata_kuliah.id_mata_kuliah = tbl_daftar_matkul.id_mata_kuliah";
    //         return $this->db->query($hasil);
    //     }
}
