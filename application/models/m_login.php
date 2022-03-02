<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_mahasiswa extends CI_Model{

    public function simpanpass($data){
        return $this->db->insert('user', $data);

    }


}

?>