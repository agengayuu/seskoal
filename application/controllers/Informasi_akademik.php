<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class Informasi_akademik extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_info_akademik');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        is_logged_in('3');
       // session_start();
    }

    public function index() {
        // $data['title'] = 'Informasi Akademik';

        // $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        // $this->load->view('templates_dosen/header',$data);  
        // $this->load->view('templates_dosen/sidebar_admin',$data); 

        // $this->load->view('informasi_akademik/index', $data); 
        // $this->load->view('templates_dosen/footer'); 

        is_logged_in('3');
        $data['title'] = 'Informasi Akademik';
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
        $data['jadwal'] = $this->m_info_akademik->getmainmenu();

        $this->load->view('informasi_akademik/index', $data);
        $this->load->view('templates_dosen/footer', $data);
    }
}
 
?>