<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Hasil_evaluasi_mahasiswa extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_hasil_evaluasi_mahasiswa');
        $this->load->library('session');
        is_logged_in('2');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Hasil Evaluasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $userlogin= $this->session->userdata('id');
        $array_id_mata_kuliah = $this->m_hasil_evaluasi_mahasiswa->get_id_matakuliah($userlogin);
        // print_r($userlogin);
        // echo '<pre>';

       
        // 
        $data['mahasiswa'] = $this->m_hasil_evaluasi_mahasiswa->get_mahasiswa($array_id_mata_kuliah);
        // echo "<pre>";print_r($data);die;
        

        // $data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('hasil_evaluasi_mahasiswa/index',$data);

        $this->load->view('templates_dosen/footer'); 

    }
    


}