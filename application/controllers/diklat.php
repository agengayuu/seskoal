<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Diklat extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_diklat');
        $this->load->library('session');
       // session_start();
    }

    public function index(){
        $data['title'] = 'Daftar Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();

        $data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('diklat/index');

        $data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('templates_dosen/footer'); 

    }

    public function admintambah(){
        $data['title'] = 'Tambah Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $this->load->view('diklat/tambah');
        $this->load->view('templates_dosen/footer'); 
    }

    public function adminsimpan(){
        $data['title'] = 'Simpan Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        
        $date = date('Y-m-d H:m:s');

        $nama_diklat = $this->input->post('nama_diklat');
        $data = array( 
                'nama_diklat' =>  $nama_diklat,
                'created_at' => $date 
            );
        $this->m_diklat->adminsimpan($data, 'tbl_diklat');
        
        redirect('diklat', 'refresh');
        
    }

    public function adminedit($id){
        $data['title'] = 'Tambah Diklat';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data = array(
            'id' => $id
        );
        $data['diklatnya'] = $this->m_diklat->adminsimpan($data,'tbl_diklat');
        $this->load->view('diklat/tambah');
    }

    public function adminhapus($id){
        $this->db->query("delete from tbl_diklat where id_diklat ='" . $id . "'");
        redirect('diklat','refresh');
    }
    


}