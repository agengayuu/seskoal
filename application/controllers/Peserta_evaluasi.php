<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
 
class Peserta_evaluasi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_jadwal');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        //session_start();
    }

    public function index() {
        $data['title'] = 'Mahasiswa Evaluasi';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        // $data['ruang'] = $this->m_ruang->tampil_data()->result();

        // $query = $this->db->query("select a.*,b.* 
        //                             from tbl_ruang a, tbl_jenis_ruang b
        //                             where a.id_jenis_ruang = b.id_jenis_ruang order by a.id_jenis_ruang")->result();

        // $data['ruang'] = $query;
        
        $this->load->view('peserta_evaluasi/index', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function input() {
        $data['title'] = 'Tambah Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $query;

        $query= $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['matakuliah'] = $query;

        $this->load->view('peserta_evaluasi/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

} 
