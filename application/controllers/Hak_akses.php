<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Hak_akses extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_diklat');
        $this->load->library('session');
        // $this->load->helper('aksesblock_helper');
        // echo cek_akses(1,2);die;
        
       // session_start();
    }

    public function hak(){
    $data['title'] = 'Hak Akses';
    $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

    //$data['diklatnya'] = $this->m_diklat->tampildata()->result();
    $this->load->view('templates_dosen/header',$data); 
    $this->load->view('templates_dosen/sidebar_admin',$data);

    $data['role'] = $this->db->query("select * from grupuser")->result();
    $this->load->view('hak_akses/index',$data);
    $this->load->view('templates_dosen/footer'); 

    }

    public function akses($id_role){

        //  $this->load->helper('aksesblock_helper');
        // echo cek_akses(1,2);die;
        $data['title'] = 'Hak Akses';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
    
        //$data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);
    
        $data['role'] = $this->db->get_where('grupuser', ['id_grup_user' => $id_role])->row_array();
        $data['menu'] = $this->db->query("select * from user_menu")->result_array();
        // echo "<pre>";
        // print_r($data);
        // die();
        $this->load->view('hak_akses/akses',$data);
        $this->load->view('templates_dosen/footer'); 
    
        }

        public function ganti_akses(){

            $id_menu = $this->input->post('id_menu');
            $id_grup_user = $this->input->post('id_grup_user');
            
            $data = [ 
                'id_grup_user' => $id_grup_user,
                'id_menu' => $id_menu
            ];
            
            $result = $this->db->get_where('user_akses_menu', $data);
            
            if($result->num_rows() < 1){
                $this->db->insert('user_akses_menu',$data);
            } else{
                $this->db->delete('user_akses_menu',$data);
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Akses berhasil di ubah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span> </button></div>');

        }




}
