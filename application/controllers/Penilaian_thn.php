<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Penilaian_thn extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_penilaian_thn');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');
    }

    public function index()
    {
        $data['title'] = 'Penilaian per Diklat';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['penilaian_tahun'] = $this->m_penilaian_thn->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('penilaian_tahun/index', $data);

        $data['diklatnya'] = $this->m_penilaian_thn->tampil_data()->result();
        $this->load->view('templates_dosen/footer');
    }

    public function tahunakademik($id)
    {
        $data['title'] = 'Tahun Akademik';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $queryzx = $this->db->query("select * from tbl_diklat where id_diklat='" . $id . "'")->result();
        foreach ($queryzx as $ruk) {
            $nama_diklat = $ruk->nama_diklat;
        }

        $query = $this->db->query("select * from thn_akademik where status='aktif'")->result();

        $data['angkatan'] = $query;
        $data['idnya'] = $id;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_tahun/tahunakademik', $data);

        $this->load->view('templates_dosen/footer');
    }

    public function listmatakuliah($id, $id2, $id3)
    {
        $userlogin = $this->session->userdata('id');
        $dosen = $this->db->query("SELECT tbl_dosen.id_dosen
                        FROM tbl_dosen
                        JOIN user ON tbl_dosen.nip = user.username
                        WHERE tbl_dosen.id_user = $userlogin ")->result('array');
        // var_dump($dosen);die;

        $data['title'] = 'Hasil Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $queryzx = $this->db->query("select * from tbl_diklat 
                                     where id_diklat='" . $id . "'")->result();
        foreach ($queryzx as $ruk) {
            $nama_diklat = $ruk->nama_diklat;
        }
        $query = $this->db->query("select * from tbl_mata_kuliah
                                    where tbl_mata_kuliah.id_diklat='" . $id . "' 
                                    && tbl_mata_kuliah.id_akademik='" . $id2 . "'
                                    && tbl_mata_kuliah.id_dosen = '" . $dosen[0]['id_dosen'] . "'")->result();

        $querytahunakademik = $this->db->query("select tahun_akademik from thn_akademik where id_akademik='" . $id2 . "'")->result('array');
        $querymatakuliah = $this->db->query("select nama_mata_kuliah from tbl_mata_kuliah where id_mata_kuliah='" . $id3 . "'")->result('array');

        $data['penilaian_tahun'] = $query;
        $data['idnya'] = $id;
        $data['tahun_akademik'] = $querytahunakademik;
        $data['tahun_akademik2'] = $id2;
        // var_dump(['tahun_akademik']);
        // die;
        $data['nama_diklat'] = $nama_diklat;
        $data['nama_mata_kuliah'] = $querymatakuliah;
        $data['nama_mata_kuliah2'] = $id3;

        $this->load->view('penilaian_tahun/listmatakuliah', $data);

        $this->load->view('templates_dosen/footer');
    }

    public function listpaketevaluasi($id, $id2, $id3)
    {
        $data['title'] = 'List Paket Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');
        $dosen = $this->db->query("SELECT tbl_dosen.id_dosen
        FROM tbl_dosen
        JOIN user ON tbl_dosen.nip = user.username
        WHERE tbl_dosen.id_user = $userlogin ")->result('array');

        $queryzx = $this->db->query("select * from tbl_diklat 
                                    where id_diklat='" . $id . "'")->result();
        foreach ($queryzx as $ruk) {
            $nama_diklat = $ruk->nama_diklat;
        }
        $query = $this->db->query("select * from tbl_paket_evaluasi
                                    where tbl_paket_evaluasi.id_mata_kuliah='" . $id3 . "'")->result();

        $querymatakuliah = $this->db->query("select nama_mata_kuliah from tbl_mata_kuliah where id_mata_kuliah='" . $id3 . "'")->result('array');
        $querytahunakademik = $this->db->query("select tahun_akademik from thn_akademik where id_akademik='" . $id2 . "'")->result('array');

        $data['paket_evaluasi'] = $query;
        $data['idnya'] = $id;
        $data['nama_mata_kuliah'] = $querymatakuliah;
        $data['nama_mata_kuliah2'] = $id3;
        $data['nama_diklat'] = $nama_diklat;
        $data['tahun_akademik'] = $querytahunakademik;
        $data['tahun_akademik2'] = $id2;
        // $data['nama_mata_kuliah'] = $id3;
        // var_dump($data['tahun_akademik']);
        // die;

        $this->load->view('penilaian_tahun/listpaketevaluasi', $data);

        $this->load->view('templates_dosen/footer');
    }

    public function listmahasiswa($id, $id2, $id3, $id4)
    {
        $data['title'] = 'Hasil Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');
        $dosen = $this->db->query("SELECT tbl_dosen.id_dosen
                        FROM tbl_dosen
                        JOIN user ON tbl_dosen.nip = user.username
                        WHERE tbl_dosen.id_user = $userlogin ")->result('array');

        $queryzx = $this->db->query("select * from tbl_diklat 
                                                where id_diklat='" . $id . "'")->result();
        foreach ($queryzx as $ruk) {
            $nama_diklat = $ruk->nama_diklat;
        }
        $query = $this->db->query("select nim, nama from tbl_mahasiswa
                                    join tbl_mahasiswa_evaluasi
                                    where tbl_mahasiswa.id_mahasiswa = tbl_mahasiswa_evaluasi.id_mahasiswa
                                    && tbl_mahasiswa_evaluasi.id_mata_kuliah='" . $id3 . "'
                                    && tbl_mahasiswa_evaluasi.id_evaluasi='" . $id4 . "'")->result();

        $queryevaluasi = $this->db->query("select nama_paket_evaluasi from tbl_paket_evaluasi where id_paket_evaluasi = '" . $id4 . "'")->result('array');

        $querymatakuliah = $this->db->query("select nama_mata_kuliah from tbl_mata_kuliah where id_mata_kuliah = '" . $id3 . "'")->result('array');
        $querytahunakademik = $this->db->query("select tahun_akademik from thn_akademik where id_akademik='" . $id2 . "'")->result('array');

        $data['hasil_mahasiswa'] = $query;
        $data['idnya'] = $id;
        $data['tahun_akademik'] = $querytahunakademik;
        $data['tahun_akademik2'] = $id2;
        $data['nama_diklat'] = $nama_diklat;
        $data['nama_mata_kuliah'] = $querymatakuliah;
        $data['nama_mata_kuliah2'] = $id3;
        $data['nama_paket_evaluasi'] = $queryevaluasi;

        // var_dump(['nama_mata_kuliah']);
        // die;

        $this->load->view('penilaian_tahun/listmahasiswa', $data);

        $this->load->view('templates_dosen/footer');
    }
}
