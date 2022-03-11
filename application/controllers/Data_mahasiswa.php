<?php

class Data_mahasiswa extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profile Dosen';


        $userlogin = $this->session->userdata('username');
        // print_r($userlogin);die();

        $mhs = $this->db->query("SELECT tbl_mahasiswa.*, user.*
                        FROM tbl_mahasiswa
                        JOIN user ON tbl_mahasiswa.nim = user.username
                        WHERE tbl_mahasiswa.nim = $userlogin ")->result();

        print_r($userlogin);

        $data['user'] = $mhs;
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar', $data);

        $data['profilnya'] = $this->db->query("select * from tbl_mahasiswa")->result();


        $this->load->view('profile_dosen/index', $data);
        $this->load->view('templates_dosen/footer');
    }
}
