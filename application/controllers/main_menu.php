<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu extends CI_Controller
{
    public function index(){

    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array();
    $this->load->view('main_menu/admin');


    }
}

?>