<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_profil_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Profil Mahasiswa';
        return $this->db->get('tbl_mahasiswa');
    }

}

?>