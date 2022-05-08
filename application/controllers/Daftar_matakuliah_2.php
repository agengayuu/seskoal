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
        
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        
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

        $queryyy= $this->db->query("select *
                                     from tbl_mata_kuliah 
                                     where id_mata_kuliah='".$id."' 
                                     group by kode_mata_kuliah, nama_mata_kuliah")->result();
        foreach ($queryyy as $ruk){ $id_mata_kuliah = $ruk->id_mata_kuliah; 
                                    $nama_mata_kuliah = $ruk->nama_mata_kuliah; 
                                    $kode_mata_kuliah = $ruk->kode_mata_kuliah; 
                                    $sks = $ruk->sks; 
                                    $keterangan = $ruk->keterangan;}
        
        $data['id_mata_kuliah'] = $id;
        $data['kode_mata_kuliah'] = $queryyy;
        $data['idnya'] = $id;
        $data['kode_mata_kuliah'] = $kode_mata_kuliah;
        $data['sks'] = $sks;
        $data['keterangan'] = $keterangan;
        $data['tt'] = $nama_mata_kuliah;


        $this->load->view('daftar_matakuliah/lpe',$data);
        $this->load->view('templates_dosen/footer');
    } 

    public function input($id) {
        $data['title'] = 'Tambah Soal Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_master_soal where id_mata_kuliah = $id")->result_array();
        $data['mastersoal'] = $query;


        $this->load->view('daftar_matakuliah/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpan(){
		// $id_mata_kuliah 	            = $this->input->post('id_mata_kuliah');
        $nama_paket_evaluasi            = $this->input->post('nama_paket_evaluasi');
		$waktu_evaluasi_mulai		    = $this->input->post('waktu_evaluasi_mulai');
		$waktu_evaluasi_selesai			= $this->input->post('waktu_evaluasi_selesai');
		$durasi_ujian		            = $this->input->post('durasi_ujian');

		
		if ( $nama_paket_evaluasi =='' || $nama_paket_evaluasi =='' || $waktu_evaluasi_mulai == '' || $waktu_evaluasi_selesai == '' || $durasi_ujian == '') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i> Input Data Gagal ! Cek kembali data yang diinputkan.</div>');
			redirect(base_url('daftar_matakuliah'));
		} else {
			$result = $this->m_daftar_matakuliah->insert_multiple();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil di Tambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button></div>');
			redirect(base_url('daftar_matakuliah'));
		}
        // if ($_POST) {
        //     $id_mata_kuliah                 = $this->m_daftar_matakuliah->getMataKuliah();
        //     $matakuliah                     = implode(',', $id_mata_kuliah);
        //     $nama_paket_evaluasi            = $this->input->post('nama_paket_evaluasi');
        //     $waktu_evaluasi_mulai		    = $this->input->post('waktu_evaluasi_mulai');
        //     $waktu_evaluasi_selesai			= $this->input->post('waktu_evaluasi_selesai');
        //     $durasi_ujian		            = $this->input->post('durasi_ujian');
        //     $checkboxes                     = $this->input->post('id_master_soal');
        //     $soal                           = implode(',', $checkboxes);

        //     $data = array (
        //         'nama_paket_evaluasi' => $nama_paket_evaluasi,
        //         'waktu_evaluasi_mulai' => $waktu_evaluasi_mulai,
        //         'waktu_evaluasi_selesai' => $waktu_evaluasi_selesai,
        //         'durasi_ujian' => $durasi_ujian,
        //         'id_master_soal' => $soal,
        //     );

        //     $where = array (
        //         'id_mata_kuliah' => $matakuliah
        //     );

        //     $this->m_daftar_matakuliah->insert_multiple($where, 'tbl_paket_evaluasi', $data);
            

        //     redirect(base_url('daftar_matakuliah'));
        // }
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