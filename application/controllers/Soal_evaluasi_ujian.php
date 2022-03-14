<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Soal_evaluasi_ujian extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_soal_evaluasi');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
       // session_start();
    }

    public function index(){
        $data['title'] = 'Soal EValuasi Ujian';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $this->load->view('soal_evaluasi_ujian/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    } 

    public function input() {
        $data['title'] = 'Tambah Soal Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['matakuliah'] = $query;


        $this->load->view('soal_evaluasi_ujian/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function matakuliah(){
        $data['title'] = 'Mata Kuliah';

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['matakuliah'] = $this->m_soal_evaluasi->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('soal_evaluasi_ujian/matakuliah', $data);
        $this->load->view('templates_dosen/footer'); 
        
    }

    public function simpan() {
        $id_mata_kuliah =$this->input->post('id_mata_kuliah');
        $pertanyaan =  $this->input->post('pertanyaan');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $e = $this->input->post('e');
        $kunci_jawaban = $this->input->post('kunci_jawaban');

        $data = array(
            'id_mata_kuliah'        =>  $id_mata_kuliah,
            'pertanyaan'            =>  $pertanyaan,
            'a'                     =>  $a,
            'b'                     =>  $b,
            'c'                     =>  $c,
            'd'                     =>  $d,
            'e'                     =>  $e,
            'kunci_jawaban'         =>  $kunci_jawaban
        );

        $this->m_soal_evaluasi->input_data($data,'tbl_soal_evaluasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data berhasil di Tambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span> </button></div>');

         redirect('soal_evaluasi_ujian');
    }
}


?>