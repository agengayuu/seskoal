<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_soal_evaluasi extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mata kuliah';
        return $this->db->get('tbl_mata_kuliah');
    }

    public function tampil_data2(){
        return $this->db->get('tbl_soal_evaluasi');
    }

    public function input_data($data){
        return $this->db->insert('tbl_soal_evaluasi', $data); 
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
}

?>