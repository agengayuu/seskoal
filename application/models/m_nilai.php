<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_nilai extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function tampil(){
       return $this->db->get('tbl_nilai');
    }

    public function adminsimpan($d,$t){
        return $this->db->insert($t, $d);

    }

    public function adminhapus($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
     }

     public function update_data($where, $data, $table){
         $this->db->where($where);
         $this->db->update($table, $data);
     }
}
