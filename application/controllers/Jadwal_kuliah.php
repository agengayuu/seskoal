<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jadwal_kuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('1');
        //session_start();
    }

    public function index()
    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        

        $data['jadwal'] = $this->m_jadwal->getdata();
        $this->load->view('jadwal_kuliah/index',$data);
        $this->load->view('templates_dosen/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $diklatnya =  $this->db->query("select * from tbl_diklat")->result();
        $matkulnya =  $this->db->query("select * from tbl_mata_kuliah")->result();
        $dosennya = $this->db->query("select * from tbl_dosen")->result();
        $ruangnya =$this->db->query("select * from tbl_ruang")->result();
        $data['diklat'] = $diklatnya;
        $data['matkul'] = $matkulnya;
        $data['dosen'] =  $dosennya;
        $data['ruang'] =  $ruangnya;

        $this->load->view('jadwal_kuliah/tambah',$data);
        $this->load->view('templates_dosen/footer');
    }

    public function simpan()

    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $diklat = $this->input->post('id_diklat');
        $matkul = $this->input->post('id_mata_kuliah');
        $dosen = $this->input->post('id_dosen');
        // $kode = $this->input->post('kode_jadwal');
        $tgl = $this->input->post('tanggal');
        $waktu_mulai= $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jam = $this->input->post('jam_pelajaran_ke');
        $tema = $this->input->post('tema');
        $ruang = $this->input->post('id_ruang');
        $ket = $this->input->post('keterangan');

        $data = array(
            'id_diklat' => $diklat,
            'id_mata_kuliah' => $matkul,
            'id_dosen' => $dosen,
            // 'kode_jadwal' => $kode,
            'tanggal' => date('Y-m-d'),
            'waktu_mulai' => date("h:i:sa"),
            'waktu_selesai' => date("h:i:sa"),
            'jam_pelajaran_ke' => $jam,
            'tema' => $tema,
            'id_ruang' => $ruang,
            'keterangan' => $ket
        );

        $this->m_jadwal->savedata($data, 'tbl_jadwal_kuliah');
        redirect('jadwal_kuliah');
        $this->load->view('templates_dosen/footer');
    }

    public function edit($id){

    }

    public function editaksi(){


    }

    public function hapus($id){

        $this->db->query("delete from tbl_jadwal_kuliah where id_jadwal_kuliah ='" . $id . "'");

        redirect('jadwal_kuliah','refresh');
    }
}
