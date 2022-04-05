<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_master_soal extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        return $this->db->get('tbl_mata_kuliah');
    }

    public function tampil_data2(){
        return $this->db->get('tbl_master_soal');
    }

    public function input_data($data){
        return $this->db->insert('tbl_master_soal', $data); 
     }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
     }

     public function updateaksi($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table, $data);

    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get(){
        $userlogin = $this->session->userdata('id');
        // print_r($userlogin);die;
        $query = "select
            tbl_jadwal_kuliah.*, 
            tbl_dosen.id_dosen, 
            tbl_mata_kuliah.nama_mata_kuliah
        from 
            tbl_jadwal_kuliah 
            left join tbl_dosen on tbl_jadwal_kuliah.id_dosen = tbl_dosen.id_dosen
            left join tbl_mata_kuliah on tbl_mata_kuliah.id_mata_kuliah = tbl_jadwal_kuliah.id_mata_kuliah
        where 
            tbl_dosen.id_user = ".$userlogin."";
            
        return $this->db->query($query)->result_array();
    }
}

?>