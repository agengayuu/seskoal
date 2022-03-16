<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class M_dosen extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function adminsimpan($data, $table){
        return $this->db->insert($table, $data);

    }
    public function simpanuser($data2){
        $a = $this->db->insert('user',$data2);
        return $this->db->insert_id();
    }
    
    public function adminedit($where, $table){
        return $this->db->get_where($table ,$where);

    }

    public function adminupdate($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function adminhapus($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function admindetail($id_dosen){
        $hasil = $this->db->where('id_dosen', $id_dosen)->get('tbl_dosen');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

}
