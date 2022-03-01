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
    
    public function adminedit($where,$table){
        return $this->db->get_where($table,$where);

    }
}

?>