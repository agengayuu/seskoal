<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_soal_evaluasi extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Mata kuliah';
        return $this->db->get('tbl_mata_kuliah');
    }
}

?>