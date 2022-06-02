<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        //$this->load->view('main_menu',$data);

    }

    public function adminhapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
