<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Penilaian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_matakuliah');
        // $this->load->model('m_akademik');
        $this->load->library('session');
        is_logged_in('1');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $diklat = $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $diklat;

        $this->load->view('penilaian/getdiklat',$data);
        $this->load->view('templates_dosen/footer'); 

    }

    public function getmatkul($id){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $dik  = $this->db->query("select * from tbl_diklat where id_diklat = $id") ->row_array();
        $data['diklat'] = $dik;

        // print_r($dik);die;

        $mata = $this->db->query("select tbl_diklat.*, tbl_mata_kuliah.*
                                    from tbl_mata_kuliah 
                                    join tbl_diklat
                                    on tbl_mata_kuliah.id_diklat = tbl_diklat.id_diklat
                                    where tbl_mata_kuliah.id_diklat = $id")->result();
        $data['matkul'] = $mata;

        // echo"<pre>";
        // print_r($matkul);die;

        $this->load->view('penilaian/getmatkul',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function getrekap($id){

        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $mhs = $this->db->query("select * from tbl_mahasiswa where id_diklat = $id")->result();
        $data['mhs'] = $mhs;

        $this->load->view('penilaian/getrekap',$data);
        $this->load->view('templates_dosen/footer'); 
    }







}