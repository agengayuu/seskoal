<?php

class Profile_dosen extends CI_Controller{
    public function index(){
        $data['title'] = 'Profile Dosen';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $data['profilnya'] = $this->db->query("select * from tbl_dosen")->result();
        

        $this->load->view('profile_dosen/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }
}


?>