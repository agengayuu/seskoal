<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_jadwal_kuliah_dosen extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function getdata(){
        $userlogin = $this->session->userdata('username');
        $query = $this->db->query("select * from tbl_jadwal_kuliah where nip = '" . $userlogin . "'")->result();
        return $this->db->query($query)->result();
       //return $this->db->get('tbl_jadwal_kuliah')->result();
    }

}