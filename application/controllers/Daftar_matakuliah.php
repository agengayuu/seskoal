<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Daftar_matakuliah extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daftar_matakuliah');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');
       // session_start();
    } 

    public function index(){
        $data['title'] = 'Daftar Mata Kuliah';
        
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $query= $this->m_daftar_matakuliah->get();
        // echo "<pre>";
        // print_r($query);die;
        $data['daftar_matakuliah'] = $query;

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('daftar_matakuliah/index',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function lpe($id) {
        $data['title'] = 'Daftar Paket Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
    
        $queryy= $this->db->query("select * from tbl_paket_evaluasi where id_mata_kuliah='".$id."'")->result();
        $data['paket_evaluasi'] = $queryy;

        $queryyy= $this->db->query("select kode_mata_kuliah, nama_mata_kuliah, bobot, keterangan
                                     from tbl_mata_kuliah where id_mata_kuliah='".$id."' group by kode_mata_kuliah, nama_mata_kuliah")->result();
        foreach ($queryyy as $ruk){ $nama_mata_kuliah = $ruk->nama_mata_kuliah; $kode_mata_kuliah = $ruk->kode_mata_kuliah; $bobot = $ruk->bobot; $keterangan = $ruk->keterangan;}
        
        $data['kode_mata_kuliah'] = $queryyy;
        $data['idnya'] = $id;
        $data['kode_mata_kuliah'] = $kode_mata_kuliah;
        $data['bobot'] = $bobot;
        $data['keterangan'] = $keterangan;
        $data['tt'] = $nama_mata_kuliah;


        $this->load->view('daftar_matakuliah/lpe',$data);
        $this->load->view('templates_dosen/footer');
    } 

    public function input() {
        $data['title'] = 'Tambah Soal Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_master_soal")->result();
        $data['mastersoal'] = $query;

        // $query= $this->db->query("select * from tbl_profil_mahasiswa")->result();
        // $data['mahasiswa'] = $query;

        $query = $this->db->query("select a.*,b.* 
                                    from tbl_profil_mahasiswa a, tbl_diklat b
                                    where a.id_diklat = b.id_diklat order by a.id_diklat")->result();
        $data['mahasiswa'] = $query;

        $this->load->view('daftar_matakuliah/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function delete($id) {

        $where = array('id_paket_evaluasi' => $id);
        $this->m_daftar_matakuliah->hapus_data($where, 'tbl_paket_evaluasi'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('daftar_matakuliah');
    }
}