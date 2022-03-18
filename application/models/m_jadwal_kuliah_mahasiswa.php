<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_jadwal_kuliah_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function getdata(){
        $userlogin = $this->session->userdata('id');
        // print_r($userlogin);die;
        $query = "SELECT
        tbl_jadwal_kuliah.*,
        tbl_profil_mahasiswa.id_mahasiswa,
        tbl_dosen.nama,
        tbl_mata_kuliah.nama_mata_kuliah,
        tbl_diklat.nama_diklat,
        tbl_ruang.nama_ruang 
    FROM
        tbl_jadwal_kuliah
        INNER JOIN tbl_profil_mahasiswa ON tbl_jadwal_kuliah.id_diklat = tbl_profil_mahasiswa.id_diklat
        INNER JOIN tbl_mata_kuliah ON tbl_jadwal_kuliah.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
        INNER JOIN tbl_dosen ON tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
        INNER JOIN tbl_diklat ON tbl_jadwal_kuliah.id_diklat = tbl_diklat.id_diklat
        INNER JOIN tbl_ruang ON tbl_jadwal_kuliah.id_ruang = tbl_ruang.id_ruang
        
        where 
            tbl_profil_mahasiswa.id_mahasiswa = $userlogin
        order by tbl_jadwal_kuliah.tanggal desc";

// print_r($userlogin);die;
        return $this->db->query($query)->result_array();
       //return $this->db->get('tbl_jadwal_kuliah')->result();
    }

}