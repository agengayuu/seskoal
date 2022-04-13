<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_daftar_matakuliah extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function get(){
        $userlogin = $this->session->userdata('id');
        // print_r($userlogin);die;
        $query = "select
            tbl_mata_kuliah.*, 
            tbl_dosen.id_dosen
        from  
            tbl_mata_kuliah 
            left join tbl_dosen on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen
        where 
            tbl_dosen.id_user = ".$userlogin."";

// print_r($userlogin);die;
        return $this->db->query($query)->result_array();
    }
    
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}