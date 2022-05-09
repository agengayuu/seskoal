<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_berita');
        $this->load->library('session');
        $this->load->helper('download');
        //session_start();
        is_logged_in('1');
    }

    public function index(){
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['berita'] = $this->m_berita->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('berita/index', $data);
        $this->load->view('templates_dosen/footer');
    }


    public function tambah(){
        $data['title'] = 'Tambah Berita';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('berita/tambah', $data);
        $this->load->view('templates_dosen/footer');
    }

     public function _rules()
    {
        $this->form_validation->set_rules('judul_berita', 'judul_berita', 'required', ['required' => 'Judul berita wajib diisi!']);
        $this->form_validation->set_rules('isi', 'isi', 'required', ['required' => 'Isi berita wajib diisi!']);
    }


    public function simpan(){
        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $judul_berita = $this->input->post('judul_berita', TRUE);
            $isi   = $this->input->post('isi', TRUE);
            $link   = $this->input->post('link', TRUE);
            $dokumen             = $_FILES['dokumen'];
            if ($dokumen = '') {
            } else {
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff|pdf';
                $config['max_size']         = 5000;
                $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);

                if (@$_FILES['dokumen']['name'] != null) {
                    if (!$this->upload->do_upload('dokumen')) {
                        echo 'Gagal Upload';
                        die();
                    } else {
                        $dokumen = $this->upload->data('file_name');
                    }
                }
            }
            $data = array(
                'judul_berita' => $judul_berita,
                'isi' => $isi,
                'link' => $link,
                'dokumen' => $dokumen,
                'created_at' => date('Y-m-d'),
            );

            // print_r($data);die;
            // print_r ($data);die;

            $this->m_berita->addsimpan($data, 'tbl_berita');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
            redirect('berita');
        }
    }

    public function edit($id)
        {
        $data['title'] = 'Edit Berita';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $where = array(
            'id_berita' => $id
        );
        $data['beritanya'] = $this->m_berita->edit($where, 'tbl_berita')->result();
        $this->load->view('berita/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

     public function update()
    {
            $judul_berita = $this->input->post('judul_berita', TRUE);
            $isi   = $this->input->post('isi', TRUE);
            $link   = $this->input->post('link', TRUE);
            $id_berita = $this->input->post('id_berita', TRUE);
            $dokumen               = $_FILES['dokumen']['name'];
            if  ($dokumen){
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff';
                $config['max_size']         = 2048;
                $config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);

                $this->load->library('upload', $config);

                
                    if($this->upload->do_upload('dokumen')){
                        $dokumen = $this->upload->data('file_name');
                        $this->db->set('dokumen', $dokumen);
                    } else {
                        echo "Gagal Upload";
                    }
                }

        $data = array(
                'judul_berita' => $judul_berita,
                'isi' => $isi,
                'link' => $link,
                'dokumen' => $dokumen,
                'created_at' => date('Y-m-d'),
            );

        $where = array(
            'id_berita' => $id_berita
        );

        $this->m_berita->editupdate($where, $data, 'tbl_berita');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('berita');
    }

      public function hapus($id)
    {

        $where = array('id_berita' => $id);
        $this->db->query("delete  from tbl_berita where id_berita = $id");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('berita', 'refresh');
    }











}?>