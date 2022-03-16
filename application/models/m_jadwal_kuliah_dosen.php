<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_jadwal_kuliah_dosen extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function get(){
        $userlogin = $this->session->userdata('id');
        // print_r($userlogin);die;
        $query = "select
            tbl_jadwal_kuliah.*, 
            tbl_dosen.id_dosen, 
            tbl_mata_kuliah.nama_mata_kuliah, 
            tbl_diklat.nama_diklat, 
            tbl_ruang.nama_ruang
        from 
            tbl_jadwal_kuliah 
            left join tbl_dosen on tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
            left join tbl_mata_kuliah on tbl_mata_kuliah.id_mata_kuliah = tbl_jadwal_kuliah.id_mata_kuliah
             left join tbl_diklat on tbl_diklat.id_diklat = tbl_jadwal_kuliah.id_diklat
            left join tbl_ruang on tbl_ruang.id_ruang = tbl_jadwal_kuliah.id_ruang 
        where 
            tbl_dosen.id_user = ".$userlogin."";

// print_r($userlogin);die;
        return $this->db->query($query)->result_array();
    }

}