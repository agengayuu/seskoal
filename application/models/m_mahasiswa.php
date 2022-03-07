<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mahasiswa';
       return $this->db->get('tbl_mahasiswa');
    }

    public function adminsimpan($data,$table){
        return $this->db->insert($table, $data);

    }
    public function simpanuser($data2){
        $a = $this->db->insert('user',$data2);
        return $a;
        print_r($a);die;
    }
    
    public function adminedit($where,$table){
        return $this->db->get_where($table,$where);
 
    }

    public function adminhapus($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}

?>