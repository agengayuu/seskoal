<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_diklat extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
       return $this->db->get('tbl_diklat');
    }

    public function adminsimpan($d,$t){
        return $this->db->insert($t, $d);

    }
}
