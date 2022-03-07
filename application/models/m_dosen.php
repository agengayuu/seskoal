<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class M_dosen extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function adminsimpan($data){
        return $this->db->insert('tbl_dosen', $data);

    }
    public function simpanuser($data2){
        $a = $this->db->insert('user',$data2);
        return $a;
    }
    
    public function adminedit($where){
        return $this->db->get_where('tbl_dosen',$where);

    }

    public function adminupdate($where,$data,$table){
    $this->db->where($where);
    $this->db->update($table,$data);
    }

    public function adminhapus($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}

?>