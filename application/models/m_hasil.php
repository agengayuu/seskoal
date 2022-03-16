<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_hasil extends CI_Model{

    function construct(){
        parent:: __construct();
    }


    public function tampil_data2(){
        return $this->db->get('tbl_soal_evaluasi');
    }
}

?>