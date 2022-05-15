<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class Jadwal_evaluasi_admin extends CI_Controller {


function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daftar_matakuliah');
        $this->load->model('M_master_eval');
        $this->load->model('M_paket_evaluasi');
        $this->load->model('m_matakuliah');
        $this->load->model('m_diklat');
        $this->load->model('m_jadwal_evaluasi_admin');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('1');
       // session_start();
    } 


    public function index(){
        $data['title'] = 'Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('jadwal_evaluasi_admin/index',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function getjadwal($id){
        $data['title'] = 'Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $data['jadwal'] = $this->m_jadwal_evaluasi_admin->getjadwal($id);
        $this->load->view('jadwal_evaluasi_admin/getjadwal',$data);
        $this->load->view('templates_dosen/footer'); 

    }



}