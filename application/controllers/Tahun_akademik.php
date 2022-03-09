<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_akademik');
        $this->load->library('session');
        // session_start();
    }

    public function index()
    {
        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $data['akademik'] = $this->m_akademik->getdata();

        $this->load->view('tahun_akademik/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('tahun_akademik/tambah', $data);
        $this->load->view('templates_dosen/footer');
        
    }

    public function simpan()
    {
        $data['title'] = 'Tambah Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $tahunakademik = $this->input->post('tahun_akademik');
        $semester = $this->input->post('semester');
        $status = $this->input->post('status');

        $data = array(
            'tahun_akademik' => $tahunakademik,
            'semester' => $semester,
            'status' => $status
        );

        $this->m_akademik->savedata($data,'thn_akademik');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil disimpan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span> </button></div>');
        redirect('tahun_akademik', 'refresh');
    }

    public function edit($id){
        $data['title'] = 'Tambah Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $where = array(
            'id_akademik' => $id,
        );
        $data['akademik'] = $this->m_akademik->editdata($where, 'thn_akademik')->result();
        $data['semester'] = $this->db->query("select semester,id_akademik from thn_akademik");

        $this->load->view('tahun_akademik/edit', $data);
        $this->load->view('templates_dosen/footer');
        
    }

    public function update(){
        $idakademik = $this->input->post('id_akademik');
        $tahunakademik = $this->input->post('tahun_akademik');
        $semester = $this->input->post('semester');
        $status = $this->input->post('status');

        $data = array(
            'tahun_akademik' => $tahunakademik,
            'semester' => $semester,
            'status' => $status
        );

        $where = array(
            'id_akademik' => $idakademik
        );

        $test = $this->m_akademik->updatedata($where,$data,'thn_akademik');
        // print_r($test);die();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span> </button></div>');

        redirect('tahun_akademik','refresh');
    }

    public function hapus($id){      

        $this->db->query("delete from thn_akademik where id_akademik ='" . $id . "'");
    
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
    
        redirect('mahasiswa','refresh');
    }

    
}
