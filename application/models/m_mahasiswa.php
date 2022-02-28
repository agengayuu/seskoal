<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
       return $this->db->get('tbl_mahasiswa');
    }
    
}

?>