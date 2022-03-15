<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
 
class Main_menu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        //session_start();
    }
    
    public function admin() {
        
        is_logged_in('1');
        $data['title'] = 'Dashboard';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);


        $queryaa = $this->db->query("select * from tbl_diklat")->result();
		$querycc = $this->db->query("select * from tbl_mahasiswa")->result();
		$tomi = count($querycc);

		$wx = "";
		foreach ($queryaa as $ruk){ 
		$queryd = $this->db->query("select * from tbl_mahasiswa where id_diklat='".$ruk->id_diklat."'")->result();
		$toma = count($queryd);
		$hasil = $toma / $tomi * 100;
		$wx .= '{ name :"'.$ruk->nama_diklat.'",y:'.$hasil.' },';
		}
  
		$data['grafik'] = $wx;

        $this->load->view('main_menu/admin', $data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function dosen() {
        is_logged_in('3');
        $data['title'] = 'Menu Dosen';

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $querya = $this->db->query("select * from tbl_diklat")->result();
		$queryc = $this->db->query("select * from tbl_mahasiswa")->result();
		$tomi = count($queryc);

		$wx = "";
		foreach ($querya as $ruk){ 
		$queryd = $this->db->query("select * from tbl_mahasiswa where id_diklat='".$ruk->id_diklat."'")->result();
		$toma = count($queryd);
		$hasil = $toma / $tomi * 100;
		$wx .= '{ name :"'.$ruk->nama_diklat.'",y:'.$hasil.' },';
		}
  
		$data['grafik'] = $wx; 
        
        $this->load->view('main_menu/dosen',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }
    

    public function siswa() {
        is_logged_in('2');
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $last = $this->db->order_by('id_pengumuman', 'desc')
        ->limit(1)
        ->get('tbl_pengumuman')
        ->result();
        //print_r($last);die;
        $data['pengumuman'] = $last;

        // jadwal

        $data['jadwal'] = $this->m_jadwal->getdata();

        $this->load->view('main_menu/siswa',$data); 
        $this->load->view('templates_dosen/footer',$data); 
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
