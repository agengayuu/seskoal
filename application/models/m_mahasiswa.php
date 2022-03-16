<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mahasiswa';

        $query = "SELECT tbl_mahasiswa.*, tbl_diklat.*
        FROM tbl_mahasiswa
        INNER JOIN tbl_diklat ON tbl_mahasiswa.id_diklat=tbl_diklat.id_diklat";
        return $this->db->query($query);
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

    public function admindetail($nim){
        $hasil = $this->db->where('nim', $nim)->get('tbl_mahasiswa');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
