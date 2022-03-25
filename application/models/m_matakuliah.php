<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_matakuliah extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mata kuliah';
         $hasil = "SELECT tbl_mata_kuliah.*, tbl_dosen.nama
        FROM tbl_mata_kuliah
        INNER JOIN tbl_dosen ON tbl_mata_kuliah.id_dosen=tbl_dosen.id_dosen";
        return $this->db->query($hasil);
    }

    public function adminsimpan($data){
        return $this->db->insert('tbl_mata_kuliah', $data);

    }
    
    public function adminedit($where,$table){
        return $this->db->get_where($table,$where);

    }

    public function admineditaksi($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>