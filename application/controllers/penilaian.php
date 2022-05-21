<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Penilaian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_matakuliah');
        $this->load->model('m_akademik');
        $this->load->model('m_hasil');
        $this->load->library('mypdf');
        $this->load->library('session');
        is_logged_in('1');
        //session_start();
    }

    public function index()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $diklat = $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $diklat;

        $this->load->view('penilaian/getdiklat', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function getakademik($id)
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        // $akademik = $this->db->query("Select tbl_mata_kuliah.*, thn_akademik.*
        //                                         from thn_akademik
        //                                         join tbl_mata_kuliah
        //                                         on tbl_mata_kuliah.id_akademik = thn_akademik.id_akademik")->result();
        $akademik = $this->db->query("Select * from thn_akademik")->result();
        $data['akademik'] = $akademik;

        // mencari tahun akademik berdasarkan diklat nya. yg nantiny akan di ambil nilai mata kuliah pertahun dan per diklat
        $diklat = $this->db->query("select * from tbl_diklat where id_diklat = $id")->row();
        $data['diklat'] = $diklat;
        $this->load->view('penilaian/getakademik', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function getmatkul($id_akademik, $id_diklat)
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $dik = $this->db->query("select * from tbl_diklat where id_diklat = $id_diklat")->row();
        $data['diklat'] = $dik;
        $ak = $this->db->query("select * from thn_akademik where id_akademik = $id_akademik")->row();
        $data['akademik'] = $ak;

        $matakuliah = $this->db->query("select * from tbl_mata_kuliah where id_akademik = $id_akademik && id_diklat = $id_diklat")->result();
        $data['matkul'] = $matakuliah;

        $this->load->view('penilaian/getmatkul', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function hasil_evalmhs($id_matkul)
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $matkul = $this->db->query("select * from tbl_mata_kuliah where id_mata_kuliah = $id_matkul")->row();
        $data['matakul'] = $matkul;
        $hsl = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_profil_mahasiswa.*
                                from tbl_mahasiswa_evaluasi
                                join tbl_profil_mahasiswa
                                on tbl_mahasiswa_evaluasi.id_mahasiswa = tbl_profil_mahasiswa.id_mahasiswa
                                where tbl_mahasiswa_evaluasi.id_mata_kuliah = $id_matkul")->result();

        $data['hasil'] = $hsl;
        $n = $this->db->query("select * from tbl_nilai")->row();
        $data['nilai'] = $n;

        $this->load->view('penilaian/hasil_evalmhs', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function getrekap_mhs($id_ak, $id_dik)
    {

        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $mhs = $this->db->query("select * from tbl_profil_mahasiswa where id_akademik = $id_ak && id_diklat = $id_dik ")->result();
        $data['mhs'] = $mhs;

        $this->load->view('penilaian/getrekap_mhs', $data);
        $this->load->view('templates_dosen/footer');
    }

    // public function rekap_diklat(){
    //     $data['title'] = 'Penilaian';
    //     $data['user'] = $this->db->get_where('user', ['username'=>
    //     $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates_dosen/header', $data);
    //     $this->load->view('templates_dosen/sidebar_admin',$data);

    //     $diklat = $this->db->query("select * from tbl_diklat")->result();
    //     $data['diklat'] = $diklat;

    //     $this->load->view('penilaian/rekap_diklat',$data);
    //     $this->load->view('templates_dosen/footer');

    // }

    public function getakademik_rekap($id)
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        // $akademik = $this->db->query("Select tbl_mata_kuliah.*, thn_akademik.*
        //                                         from thn_akademik
        //                                         join tbl_mata_kuliah
        //                                         on tbl_mata_kuliah.id_akademik = thn_akademik.id_akademik")->result();
        $akademik = $this->db->query("Select * from thn_akademik")->result();
        $data['akademik'] = $akademik;

        // mencari tahun akademik berdasarkan diklat nya. yg nantiny akan di ambil nilai mata kuliah pertahun dan per diklat
        $diklat = $this->db->query("select * from tbl_diklat where id_diklat = $id")->row();
        $data['diklat'] = $diklat;
        $this->load->view('penilaian/getakademik_rekap', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function print_all($id)
    {
        $query = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_profil_mahasiswa.*, tbl_mata_kuliah.*
                                from tbl_mahasiswa_evaluasi
                                inner  join tbl_profil_mahasiswa
                                on tbl_mahasiswa_evaluasi.id_mahasiswa = tbl_profil_mahasiswa.id_mahasiswa
                                inner  join tbl_mata_kuliah
                                on tbl_mahasiswa_evaluasi.id_mata_kuliah= tbl_mata_kuliah.id_mata_kuliah
                                where tbl_mahasiswa_evaluasi.id_mata_kuliah = $id")->result_array();
        //    echo"<pre>";
        //    print_r($query);die;
        $data['cetak'] = $query;
        $this->mypdf->generate('penilaian/cetak', $data, 'Cetak Hasil Ujian ujian', 'A4', 'Landscape');
    }

    public function print_rekap($idmhs)
    {

        $mahasiswa = $this->db->query("Select tbl_profil_mahasiswa.*, tbl_diklat.*, thn_akademik.*
                                        from tbl_profil_mahasiswa
                                        join tbl_diklat
                                        on tbl_diklat.id_diklat = tbl_profil_mahasiswa.id_diklat
                                        join thn_akademik
                                        on thn_akademik.id_akademik = tbl_profil_mahasiswa.id_akademik
                                        where tbl_profil_mahasiswa.id_mahasiswa = $idmhs")->row_array();

        $data['mhs'] = $mahasiswa;
        $query = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_profil_mahasiswa.*, tbl_mata_kuliah.*
                                            from tbl_mahasiswa_evaluasi
                                            join tbl_profil_mahasiswa
                                            on tbl_mahasiswa_evaluasi.id_mahasiswa = tbl_profil_mahasiswa.id_mahasiswa
                                            join tbl_mata_kuliah
                                            on tbl_mahasiswa_evaluasi.id_mata_kuliah= tbl_mata_kuliah.id_mata_kuliah
                                            where tbl_mahasiswa_evaluasi.id_mahasiswa = $idmhs")->result();

// print_r($query);die;
        $data['rekap'] = $query;
        $this->mypdf->generate('penilaian/cetak_rekap', $data, 'Cetak Hasil Ujian ujian', 'A4', 'Landscape');

    }

}
