<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        $this->load->library('session');
       // session_start();
    }


public function index(){
    $data['title'] = 'Mahasiswa';
    $data['siswa'] = $this->m_mahasiswa->tampildata()->result();
    //print_r($data);die();
    
    $this->load->view('templates_dosen/header'); 
    $this->load->view('templates_dosen/sidebar_admin'); 
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates_dosen/footer'); 
    
}

public function tambah(){
    $data['title'] = 'Tambah Mahasiswa';
    $this->load->view('templates_dosen/header'); 
    $this->load->view('templates_dosen/sidebar_admin'); 
    $this->load->view('mahasiswa/tambah');
    $this->load->view('templates_dosen/footer'); 
}

public function adminedit(){

}
public function adminsimpan(){

}
public function adminhapus(){
    
}
public function dosenindex(){

}



}
?>