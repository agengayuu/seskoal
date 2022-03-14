<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Profile_dosen extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_mahasiswa_d');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
       // session_start();
    }
    public function index(){
        $data['title'] = 'Profile Dosen';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 

        
        $userlogin = $this->session->userdata('username');
        $dosen = $this->db->query("SELECT tbl_dosen.*, user.*
                        FROM tbl_dosen
                        JOIN user ON tbl_dosen.nip = user.username
                        WHERE tbl_dosen.nip = $userlogin ")->result();

        $data['user'] = $dosen;
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['profilnya'] = $this->db->query("select * from tbl_dosen")->result();
        

        $this->load->view('profile_dosen/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }
}


?>