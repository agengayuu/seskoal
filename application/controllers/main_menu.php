<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu extends CI_Controller
{
    public function indec(){

    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array();
    echo 'selamat datang'  . $data['user']['username'];


    }
}

?>