<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Main_menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
        //session_start();
    }

    public function admin()
    {

        is_logged_in('1');
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);


        $queryaa = $this->db->query("select * from tbl_diklat")->result();
        $querycc = $this->db->query("select * from tbl_mahasiswa")->result();
        $querybb = $this->db->query("select * from tbl_dosen")->result();
        $mhs = count($querycc);
        $dsn = count($querybb);

        $hasil = "{ name :'Mahasiswa', value = : $mhs}, { name: 'Dosen', value: $dsn}";
        $data['bagian'] = $hasil;
        $data['dosen'] = $dsn;
        $data['mahasiswa'] = $mhs;

        $tomi = count($querycc);
        $wx = "";
        foreach ($queryaa as $ruk) {
            $queryd = $this->db->query("select * from tbl_mahasiswa where id_diklat='" . $ruk->id_diklat . "'")->result();
            $toma = count($queryd);
            $hasil = $toma / $tomi * 100;
            $wx .= '{ name :"' . $ruk->nama_diklat . '",y:' . $hasil . ' },';
        }
        $data['grafik'] = $wx;

        // function untuk menghitung ruang
        ini_set('date.timezone', 'Asia/Bangkok');
        $tgl = date('Y-m-d H:i:s');
        $waktu = date('H:i:s');


        $kosong = $this->db->query("select 
                                        CONCAT(`tanggal`, ' ', `waktu_mulai`) as timestamp_waktu_mulai,
                                        CONCAT(`tanggal`, ' ', `waktu_selesai`) as timestamp_waktu_selesai,
                                        tanggal, 
                                        waktu_mulai, 
                                        waktu_selesai 
                                    from 
                                        tbl_jadwal_kuliah
                                    where 
                                        CONCAT(`tanggal`, ' ', `waktu_mulai`) >= '$tgl'")
            ->result();


        $now = new DateTime("now");
        $array_kosong = [];
        foreach ($kosong as $k) {
            $now = new DateTime("now");
            $open = new DateTime($k->timestamp_waktu_mulai);
            $close = new DateTime($k->timestamp_waktu_selesai);

            if ($open > $now && $close < $now) {
                $array_kosong[] = $k->timestamp_waktu_mulai;
            } else if ($open > $now && $close > $now) {
                $array_kosong[] = $k->timestamp_waktu_mulai;
            }
        }
        $data['kosong'] = count($array_kosong);
        // end function

        //function menghitung  pengumuman
        $peng = $this->db->query("select id_pengumuman as total_data 
                            from tbl_pengumuman 
                             where status = '1'")->result();
        $data['pengumuman'] = count($peng);
        // print_r ($data['pengumuman']);die;

        $this->load->view('main_menu/admin', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function dosen()
    {
        is_logged_in('3');
        $data['title'] = 'Menu Dosen';

        $data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $querya = $this->db->query("select * from tbl_diklat")->result();
        $queryc = $this->db->query("select * from tbl_mahasiswa")->result();
        $tomi = count($queryc);

        $wx = "";
        foreach ($querya as $ruk) {
            $queryd = $this->db->query("select * from tbl_mahasiswa where id_diklat='" . $ruk->id_diklat . "'")->result();
            $toma = count($queryd);
            $hasil = $toma / $tomi * 100;
            $wx .= '{ name :"' . $ruk->nama_diklat . '",y:' . $hasil . ' },';
        }

        $data['grafik'] = $wx;

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $last = $this->db->order_by('id_pengumuman', 'desc')
            ->limit(1)
            ->get('tbl_pengumuman')
            ->result();
        //print_r($last);die;
        $data['pengumuman'] = $last;
        $data['jadwal'] = $this->m_jadwal->getmainmenu();

        $this->load->view('main_menu/dosen', $data);
        $this->load->view('templates_dosen/footer', $data);
    }


    public function siswa()
    {
        is_logged_in('2');
        $data['title'] = 'Menu Siswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $last = $this->db->order_by('id_pengumuman', 'desc')
            ->limit(1)
            ->get('tbl_pengumuman')
            ->result();
        //print_r($last);die;
        $data['pengumuman'] = $last;
        $data['jadwal'] = $this->m_jadwal->getmainmenu();

        $this->load->view('main_menu/siswa', $data);
        $this->load->view('templates_dosen/footer', $data);
    }

    // public function jadwal() {
    //     $data['user'] = $this->db->get_where('user', ['username'=> 
    //     $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates_dosen/header',$data); 
    //     $this->load->view('templates_dosen/sidebar_admin',$data); 

    //     $query = $this->db->query("select * from tbl_jadwal_kuliah")->result();
    //     $data['jadwal'] = $query;

    //     $this->load->view('main_menu/siswa',$data); 
    //     $this->load->view('templates_dosen/footer',$data); 
    // }
}
