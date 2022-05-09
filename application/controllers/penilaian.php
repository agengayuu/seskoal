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
        $this->load->model('m_akademik');
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

    public function getakademik($id){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        // $akademik = $this->db->query("Select tbl_mata_kuliah.*, thn_akademik.*
        //                                         from thn_akademik
        //                                         join tbl_mata_kuliah 
        //                                         on tbl_mata_kuliah.id_akademik = thn_akademik.id_akademik")->result();
        $akademik = $this->db->query("Select * from thn_akademik")->result();
        $data['akademik']= $akademik;  
        
        // mencari tahun akademik berdasarkan diklat nya. yg nantiny akan di ambil nilai mata kuliah pertahun dan per diklat
        $diklat = $this->db->query("select * from tbl_diklat where id_diklat = $id")->row();
        $data['diklat'] = $diklat;
        $this->load->view('penilaian/getakademik',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function getmatkul($id_akademik,$id_diklat){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $dik = $this->db->query("select * from tbl_diklat where id_diklat = $id_diklat")->row();
        $data['diklat'] = $dik;
        $ak = $this->db->query("select * from thn_akademik where id_akademik = $id_akademik")->row();
        $data['akademik'] = $ak;


        $matakuliah = $this->db->query("select * from tbl_mata_kuliah where id_akademik = $id_akademik && id_diklat = $id_diklat")->result();
        $data['matkul'] = $matakuliah;
    
        $this->load->view('penilaian/getmatkul',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function hasil_evalmhs($id_matkul){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 


        $matkul = $this->db->query("select * from tbl_mata_kuliah where id_mata_kuliah = $id_matkul")->row();
        $data['matakul']=$matkul;
        $hsl = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_mahasiswa.*
                                from tbl_mahasiswa_evaluasi 
                                inner  join tbl_mahasiswa 
                                on tbl_mahasiswa_evaluasi.id_mahasiswa = tbl_mahasiswa.id_mahasiswa
                                where tbl_mahasiswa_evaluasi.id_mata_kuliah = $id_matkul")->result();
     
        $data['hasil']=$hsl;
        $n = $this->db->query("select * from tbl_nilai")->row();
        $data['nilai']=$n;
       
        $this->load->view('penilaian/hasil_evalmhs',$data);
        $this->load->view('templates_dosen/footer'); 

    }

    public function getrekap_mhs($id){

        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $mhs = $this->db->query("select * from tbl_mahasiswa where id_diklat = $id")->result();
        $data['mhs'] = $mhs;

        $this->load->view('penilaian/getrekap_mhs',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function rekap_diklat(){
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $diklat = $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $diklat;

        $this->load->view('penilaian/rekap_diklat',$data);
        $this->load->view('templates_dosen/footer'); 

    }







}