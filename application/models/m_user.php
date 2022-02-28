<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_user extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    function cek_user(){
        $username= $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');

        if($query->num_rows() == 0){
            $this->session->set_flashdata('result_login', 'maaf username atau password salah');
        }

        return $query->result();
    }
}

?>