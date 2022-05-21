<?php

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_berita');
        $this->load->library('session');
        $this->load->helper('download');
    }

    public function index()
    {

        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // $data['berita'] = $this->db->query("Select * from tbl_berita")->result();

        // berita terbaru
        $six = $this->db->order_by('id_berita', 'desc')
            ->limit(6)
            ->get('tbl_berita')
            ->result();
        // echo"<pre>";
        // print_r($six);die;
        $data['berita'] = $six;
        // end berita terbaru

        // bantuan

        // end bantuan

        // galeri

        $galeri = $this->db->order_by('id_galeri', 'desc')
            ->limit(4)
            ->get('tbl_galeri')
            ->result();
        // echo"<pre>";
        // print_r($galeri);die;
        $data['galeri'] = $galeri;
        // end galeri

        $this->load->view('beranda/index', $data);

    }
}
