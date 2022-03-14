<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Soal_evaluasi_ujian extends CI_Controller{

    public function index(){
        $data['title'] = 'Soal EValuasi Ujian';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $this->load->view('soal_evaluasi_ujian/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }

    public function input() {
        $data['title'] = 'Tambah Soal Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 



        $this->load->view('soal_evaluasi_ujian/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }
}


?>