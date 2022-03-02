<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_matakuliah extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mata kuliah';
        return $this->db->get('tbl_mata_kuliah');
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