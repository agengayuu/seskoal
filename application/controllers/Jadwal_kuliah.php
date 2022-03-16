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
        $this->load->view('jadwal_kuliah/index', $data);
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
        $ruangnya = $this->db->query("select * from tbl_ruang")->result();
        $data['diklat'] = $diklatnya;
        $data['matkul'] = $matkulnya;
        $data['dosen'] =  $dosennya;
        $data['ruang'] =  $ruangnya;

        $this->load->view('jadwal_kuliah/tambah', $data);
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
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jam = $this->input->post('jam_pelajaran_ke');
        $tema = $this->input->post('tema');
        $ruang = $this->input->post('id_ruang');
        $ket = $this->input->post('keterangan');

        // date_default_timezone_set("Asia/Jakarta");
        ini_set('date.timezone', 'Asia/Bangkok');
        $date = date('Y-m-d H:i:s');

        $data = array(
            'id_diklat' => $diklat,
            'id_mata_kuliah' => $matkul,
            'id_dosen' => $dosen,
            // 'kode_jadwal' => $kode,
            'tanggal' => date('Y-m-d', strtotime($tgl)),
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'jam_pelajaran_ke' => $jam,
            'tema' => $tema,
            'id_ruang' => $ruang,
            'keterangan' => $ket
        );

        // print_r($data);die;

        $this->m_jadwal->savedata($data, 'tbl_jadwal_kuliah');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
        redirect('jadwal_kuliah');
        $this->load->view('templates_dosen/footer');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Jadwal Kuliah";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $where = array(
            'id_jadwal_kuliah' => $id
        );

        // print_r($id); die;
        $diklatnya =  $this->db->query("select * from tbl_diklat")->result();
        $matkulnya =  $this->db->query("select * from tbl_mata_kuliah")->result();
        $dosennya = $this->db->query("select * from tbl_dosen")->result();
        $ruangnya = $this->db->query("select * from tbl_ruang")->result();
        $data['diklat'] = $diklatnya;
        $data['matkul'] = $matkulnya;
        $data['dosen'] =  $dosennya;
        $data['ruang'] =  $ruangnya;

        $jdw = $this->db->query("select * from tbl_jadwal_kuliah where id_jadwal_kuliah ='" . $id . "'")->result();
        $data['jadwal'] =  $jdw;
        // print_r($jdw); die;
        // print_r($data['diklat']); die;

        $this->load->view('jadwal_kuliah/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function update()
    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $id = $this->input->post('id_jadwal_kuliah');
        $diklat = $this->input->post('id_diklat');
        $matkul = $this->input->post('id_mata_kuliah');
        $dosen = $this->input->post('id_dosen');
        // $kode = $this->input->post('kode_jadwal');
        $tgl = $this->input->post('tanggal');
        $waktu_mulai = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $jam = $this->input->post('jam_pelajaran_ke');
        $tema = $this->input->post('tema');
        $ruang = $this->input->post('id_ruang');
        $ket = $this->input->post('keterangan');

        // date_default_timezone_set("Asia/Jakarta");
        ini_set('date.timezone', 'Asia/Bangkok');
        $date = date('Y-m-d H:i:s');

        $data = array(
            'id_diklat' => $diklat,
            'id_mata_kuliah' => $matkul,
            'id_dosen' => $dosen,
            // 'kode_jadwal' => $kode,
            'tanggal' => date('Y-m-d', strtotime($tgl)),
            'waktu_mulai' => $waktu_mulai,
            'waktu_selesai' => $waktu_selesai,
            'jam_pelajaran_ke' => $jam,
            'tema' => $tema,
            'id_ruang' => $ruang,
            'keterangan' => $ket
        );

        $where = array(
            'id_jadwal_kuliah' => $id
        );

        $this->m_jadwal->update($where, $data, 'tbl_jadwal_kuliah');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil di Ubah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
        redirect('jadwal_kuliah');
        $this->load->view('templates_dosen/footer');
    }

    public function hapus($id)
    {

        $this->db->query("delete from tbl_jadwal_kuliah where id_jadwal_kuliah ='" . $id . "'");

        redirect('jadwal_kuliah', 'refresh');
    }
}
