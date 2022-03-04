<?php

class Set_password extends CI_Controller{
    public function index(){
        $data['title'] = 'Set Password';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        // $data['set_password'] = $this->m_set_password->tampil_data()->result();
        $this->load->view('set_password/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }
}


?>