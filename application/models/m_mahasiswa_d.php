<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_mahasiswa_d extends CI_Model{

    function construct(){
        parent:: __construct(); 
    }

    public function tampil_data(){
        $data['title'] = 'Mahasiswa per Diklat';
        return $this->db->get('tbl_diklat');
    }
 
    public function detail($nim){
        $hasil = "SELECT tbl_mahasiswa.*, tbl_diklat.*, thn_akademik.*
        FROM tbl_mahasiswa
        INNER JOIN tbl_diklat ON tbl_mahasiswa.id_diklat=tbl_diklat.id_diklat
        INNER JOIN thn_akademik on tbl_mahasiswa.id_akademik = thn_akademik.id_akademik
        where nim = '$nim'";
        return $this->db->query($hasil);
    }
}
