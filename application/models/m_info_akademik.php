<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_info_akademik extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function getdata(){
        $query = "select tbl_jadwal_kuliah.*, tbl_diklat.nama_diklat, tbl_mata_kuliah.nama_mata_kuliah, tbl_dosen.nama, tbl_ruang.nama_ruang
        from tbl_jadwal_kuliah join tbl_diklat 
        on tbl_jadwal_kuliah.id_diklat = tbl_diklat.id_diklat
        join tbl_mata_kuliah 
        on tbl_jadwal_kuliah.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
        join tbl_dosen
        on tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
        join tbl_ruang
        on tbl_jadwal_kuliah.id_ruang = tbl_ruang.id_ruang
        ";

        return $this->db->query($query)->result();
       //return $this->db->get('tbl_jadwal_kuliah')->result();
    }

    public function getmainmenu(){
        $query = "select tbl_jadwal_kuliah.*, tbl_diklat.nama_diklat, tbl_mata_kuliah.nama_mata_kuliah, tbl_dosen.nama, tbl_ruang.nama_ruang
        from tbl_jadwal_kuliah join tbl_diklat 
        on tbl_jadwal_kuliah.id_diklat = tbl_diklat.id_diklat
        join tbl_mata_kuliah 
        on tbl_jadwal_kuliah.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
        join tbl_dosen
        on tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
        join tbl_ruang
        on tbl_jadwal_kuliah.id_ruang = tbl_ruang.id_ruang
        where tbl_jadwal_kuliah.tanggal >= CURDATE()
        order by tbl_jadwal_kuliah.tanggal asc
        limit 5";
        $last2 = $this->db->order_by('id_jadwal_kuliah', 'desc')
            ->limit(1)
            ->query($query)
            ->result();
            // print_r($last2);die;
            return $last2;
    }

    public function savedata($d){
        return $this->db->insert('tbl_jadwal_kuliah', $d);

    }

    // public function adminhapus($where, $table){
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }

    public function edit($where, $table) {
        $query = "select tbl_jadwal_kuliah.*, tbl_diklat.nama_diklat, tbl_mata_kuliah.nama_mata_kuliah, tbl_dosen.nama, tbl_ruang.nama_ruang
        from tbl_jadwal_kuliah join tbl_diklat 
        on tbl_jadwal_kuliah.id_diklat = tbl_diklat.id_diklat
        join tbl_mata_kuliah 
        on tbl_jadwal_kuliah.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
        join tbl_dosen
        on tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
        join tbl_ruang
        on tbl_jadwal_kuliah.id_ruang = tbl_ruang.id_ruang";

        return $this->db->query($query)->result();
        return $this->db->get_where($table, $where);
     }

     public function update($where, $data, $table){
         $this->db->where($where);
         $this->db->update($table, $data);
     }
}
