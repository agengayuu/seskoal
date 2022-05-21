<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Informasi_akademik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_info_akademik');
        $this->load->library('session');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        is_logged_in('3');
    }

    public function index()
    {
        is_logged_in('3');
        $data['title'] = 'Informasi Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $last = $this->db->order_by('id_pengumuman', 'desc')
            ->limit(1)
            ->get('tbl_pengumuman')
            ->result();
        //print_r($last);die;
        $data['pengumuman'] = $last;
        $data['jadwal'] = $this->m_info_akademik->getmainmenu();

        $this->load->view('informasi_akademik/index', $data);
        $this->load->view('templates_dosen/footer', $data);
    }

    public function info()
    {
        $data['title'] = 'Informasi Akademik';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $data['pengumuman'] = $this->m_info_akademik->tampil_data()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('informasi_akademik/informasi_detail', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function detail($id_pengumuman)
    {
        $data['title'] = 'Detail Pengumuman';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        // $data['pengumuman'] = $this->m_pengumuman_v->detail($id_pengumuman);
        $data['pengumuman'] = $this->db->query("select * from tbl_pengumuman")->result_array();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('templates_dosen/footer');
    }
}
