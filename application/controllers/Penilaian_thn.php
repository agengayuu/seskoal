<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Penilaian_thn extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_penilaian_thn');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');

    }

    public function index(){
        $data['title'] = 'Penilaian per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['penilaian_tahun'] = $this->m_penilaian_thn->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 
        $this->load->view('penilaian_tahun/index', $data); 


        $data['diklatnya'] = $this->m_penilaian_thn->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }

    public function tahunakademik($id) {
        $data['title'] = 'Tahun Akademik';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
		foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
			// $query = $this->db->query("select thn_akademik.tahun_akademik, tbl_mahasiswa.*
            //                             from tbl_mahasiswa join thn_akademik
            //                             on tbl_mahasiswa.id_akademik = thn_akademik.id_akademik
            //                             where tbl_mahasiswa. id_diklat='".$id."'")->result();
            $query = $this->db->query("select * from thn_akademik where status='aktif'")->result();

        $data['angkatan'] = $query;
        $data['idnya'] = $id;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_tahun/tahunakademik', $data);

        $this->load->view('templates_dosen/footer'); 

    }

    public function listmatakuliah($id,$id2){
        $data['title'] = 'Hasil Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 

        $queryzx = $this->db->query("select * from tbl_diklat where id_diklat='".$id."'")->result();
		foreach ($queryzx as $ruk){ $nama_diklat = $ruk->nama_diklat;}
			$query = $this->db->query("select * from tbl_mata_kuliah where id_mata_kuliah='".$id."'")->result();

        $data['penilaian_tahun'] = $query;
        $data['idnya'] = $id;
        $data['tahun_akademik'] = $id2;
        $data['nama_diklat'] = $nama_diklat;

        $this->load->view('penilaian_tahun/listmatakuliah', $data);

        $this->load->view('templates_dosen/footer'); 
    }

}
?>