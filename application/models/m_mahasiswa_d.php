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
}
