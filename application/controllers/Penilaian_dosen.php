<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Penilaian_dosen extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_penilaian_d');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        is_logged_in('3');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Penilaian per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['penilaian_d'] = $this->m_penilaian_d->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 
        $this->load->view('penilaian_d/index', $data); 


        $data['diklatnya'] = $this->m_penilaian_d->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }

    public function angkatanmasuk($id){
		$data['title'] = "Daftar Penilaian";

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

		$queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
		foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
			$query = $this->db->query("select tahun_masuk, angkatan
						from tbl_mahasiswa where id_diklat='".$id."'
						group by tahun_masuk, angkatan")->result();

        $data['angkatan'] = $query;
        $data['idnya'] = $id;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_d/angkatanmasuk', $data);

        $this->load->view('templates_dosen/footer'); 
		
	}

    public function listkapen($id,$id2,$id3){

        $data['title'] = "Daftar Penilaian";

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

		$queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
		foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
			$query = $this->db->query("select tahun_masuk, angkatan
						from tbl_mahasiswa where id_diklat='".$id."'
						group by tahun_masuk, angkatan")->result();

        $data['angkatan'] = $query;
        $data['idnya'] = $id;
        $data['tahun_masuknya'] = $id2;
        $data['angkatannya'] = $id3;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_d/listkapen', $data);

        $this->load->view('templates_dosen/footer'); 
		
	}
    

    public function jasmaninilai($id,$id2,$id3){
		$data['title'] = "Penilaian Jasmani";

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

		$queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
			foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
		$query = $this->db->query("select c.*, d.*
						from tbl_mahasiswa c, tbl_profil_mahasiswa d 
						
						where c.nim = d.nim and c.id_diklat ='".$id."' and c.tahun_masuk='".$id2."' and c.angkatan='".$id3."'")->result();

        $data['penilaian_d'] = $query;
        $data['idnya'] = $id;
        $data['tahun_masuknya'] = $id2;
        $data['angkatannya'] = $id3;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_d/jasmaninilai', $data);

        $this->load->view('templates_dosen/footer'); 
		
	}

    public function kepribadiannilai($id,$id2,$id3){
		$data['title'] = "Kepribadian Jasmani";

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

		$queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
			foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
		$query = $this->db->query("select c.*, d.*
						from tbl_mahasiswa c, tbl_profil_mahasiswa d 
						
						where c.nim = d.nim and c.id_diklat ='".$id."' and c.tahun_masuk='".$id2."' and c.angkatan='".$id3."'")->result();

        $data['penilaian_d'] = $query;
        $data['idnya'] = $id;
        $data['tahun_masuknya'] = $id2;
        $data['angkatannya'] = $id3;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_d/kepribadiannilai', $data);

        $this->load->view('templates_dosen/footer'); 
		
	}

    public function perseorangannilai($id,$id2,$id3){
		$data['title'] = "Perseorangan Jasmani";

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

		$queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
			foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
		$query = $this->db->query("select c.*, d.*
						from tbl_mahasiswa c, tbl_profil_mahasiswa d 
						
						where c.nim = d.nim and c.id_diklat ='".$id."' and c.tahun_masuk='".$id2."' and c.angkatan='".$id3."'")->result();

        $data['penilaian_d'] = $query;
        $data['idnya'] = $id;
        $data['tahun_masuknya'] = $id2;
        $data['angkatannya'] = $id3;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_d/perseorangannilai', $data);

        $this->load->view('templates_dosen/footer'); 
		
	}


}