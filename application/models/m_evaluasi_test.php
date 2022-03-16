<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_evaluasi_test extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    //fungsi untuk mengupdate data di database
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

?>