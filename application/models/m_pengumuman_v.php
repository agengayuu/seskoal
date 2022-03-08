<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_pengumuman_v extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
    public function tampil_data(){
        return $this->db->get('tbl_diklat');
    }
}
