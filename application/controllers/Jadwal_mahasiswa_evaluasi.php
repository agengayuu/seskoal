<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Jadwal_mahasiswa_evaluasi extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal_mahasiswa_evaluasi');
        $this->load->library('session');
        is_logged_in('2');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Jadwal Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['mahasiswa'] = $this->m_jadwal_mahasiswa_evaluasi->tampil_data2()->result();

        $query = $this->db->query("select a.*,b.* 
                                    from tbl_mahasiswa_evaluasi a, tbl_mata_kuliah b
                                    where a.id_mata_kuliah = b.id_mata_kuliah order by a.id_mata_kuliah")->result();

        $data['mahasiswa'] = $query;

        $this->load->view('jadwal_mahasiswa_evaluasi/index', $data); 
        $this->load->view('templates_dosen/footer');  

    }
    


}