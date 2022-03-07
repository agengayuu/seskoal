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
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

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

    public function adminedit($id) {
        $where = array('id_diklat' => $id);
        $data['diklat'] = $this->m_diklat->edit_data($where, 'tbl_diklat')->result();

        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $this->load->view('diklat/update');
        $this->load->view('templates_dosen/footer'); 
    }

    public function admin_update_aksi(){

        $id = $this->input->post('id_diklat');
        $nama_diklat = $this->input->post('nama_diklat');

        $data = array(
            'nama_diklat' => $nama_diklat
        );

        $where = array(
            'id_diklat' => $id
        );

        $this->m_diklat->update_data($where, $data, 'tbl_diklat');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('diklat');

    }

    public function adminhapus($id){

        $where = array('id_diklat' => $id);
        $this->m_diklat->adminhapus($where, 'tbl_diklat'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('diklat','refresh');
    }
    


}