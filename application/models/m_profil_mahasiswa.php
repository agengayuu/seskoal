<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_profil_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Data Diri';
        return $this->db->get('tbl_profil_mahasiswa');
    }

    public function admintambah($data,$table){
        return $this->db->insert($table, $data);

        $insert_id = $this->db->insert_id();

        return  $insert_id;

    }
    public function simpanuser($data2){
        $a = $this->db->insert('user',$data2);
        return $a;
        print_r($a);die;
    }

    // public function simpanjenis($jenis){
    //     $a = $this->db->insert('tbl_ortu_wali',$jenis);
    //     return $a;
    //     print_r($a);die;
    // }

    public function admindetail($nim){
        $hasil = $this->db->where('nim', $nim)->get('tbl_profil_mahasiswa');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

}

?>