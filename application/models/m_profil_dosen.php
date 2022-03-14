<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class M_profil_dosen extends CI_Model{

    function construct(){
        parent:: __construct();
    }
    
    public function edit($where, $table){
        return $this->db->get_where($table ,$where);

    }

    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function detail($id_dosen){
        $hasil = $this->db->where('id_dosen', $id_dosen)->get('tbl_dosen');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

}

?>