<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Hasil_mahasiswa_evaluasi extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_hasil');
        $this->load->library('session');
        is_logged_in('3');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Hasil Mahasiswa Evaluasi';


        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['hasil'] = $this->m_hasil->tampil_data2()->result();

        // $query = $this->db->query("select a.*,b.* 
        //                             from tbl_mahasiswa_evaluasi a, tbl_profil_mahasiswa b
        //                             where a.id_mahasiswa = b.id_mahasiswa order by a.id_mahasiswa")->result();

        $query = $this->db->query("select tbl_mahasiswa_evaluasi.*, tbl_profil_mahasiswa.nim, tbl_profil_mahasiswa.nama , tbl_mata_kuliah.nama_mata_kuliah
                                    from tbl_mahasiswa_evaluasi
                                    join tbl_profil_mahasiswa on tbl_profil_mahasiswa.id_mahasiswa = tbl_mahasiswa_evaluasi.id_mahasiswa
                                    join tbl_mata_kuliah on tbl_mata_kuliah.id_mata_kuliah = tbl_mahasiswa_evaluasi.id_mata_kuliah")->result();

        $data['hasil'] = $query;

        $this->load->view('hasil_mahasiswa_evaluasi/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }
    


}