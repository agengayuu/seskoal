<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Profile_dosen extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_dosen');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');
        
        
        // if(!$this->session->userdata('username')){
        //     redirect('login');
        // }
       // session_start();
    }
    public function index(){
        $data['title'] = 'Profile Dosen';

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);  

        $userlogin = $this->session->userdata('username');
        $dosen = $this->db->query("SELECT tbl_dosen.*, user.*
                        FROM tbl_dosen
                        JOIN user ON tbl_dosen.nip = user.username
                        WHERE tbl_dosen.nip = $userlogin ")->result();

        $data['detail'] = $dosen; 
        // $data['profilnya'] = $this->db->query("select * from tbl_dosen")->result();
        
        $this->load->view('profile_dosen/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }

    public function edit($id){
        $data['title'] ="Edit Profile";

        $data['user'] = $this->db->get_where('user',['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $where = array(
            'id_dosen' => $id
        );
    
        // $data['dosennya'] = $this->m_dosen->adminedit($where,'tbl_user')->result();

        $data['dosennya'] = $this->m_profil_dosen->edit($where, 'tbl_dosen')->result();

        $data['detail'] = $this->m_profil_dosen->detail($id);
        $this->load->view('profile_dosen/edit',$data);
        $this->load->view('templates_dosen/footer');

    }

    public function update(){

            $id_dosen           = $this->input->post('id_dosen');
            $nip                = $this->input->post('nip');
            $nik                = $this->input->post('nik');
            $npwp               = $this->input->post('npwp');
            $kewarganegaraan    = $this->input->post('kewarganegaraan');
            $nama               = $this->input->post('nama');
            $email              = $this->input->post('email');
            $no_tlp             = $this->input->post('no_tlp');
            $gelar_depan        = $this->input->post('gelar_depan');
            $gelar_belakang     = $this->input->post('gelar_belakang');
            $tempat_lahir       = $this->input->post('tempat_lahir');
            $tgl_lahir          = $this->input->post('tgl_lahir');
            $jk                 = $this->input->post('jk');
            $agama              = $this->input->post('agama');
            $alamat             = $this->input->post('alamat');
            $foto               = $_FILES['userfile']['name'];
            if ($foto){
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'jpg|png|jpeg|tiff';
                $config['max_size']         = 2048;
                $config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);

                $this->load->library('upload', $config);

                
                    if($this->upload->do_upload('userfile')){
                        $userfile = $this->upload->data('file_name');
                        $this->db->set('foto', $userfile);
                    } else {
                        echo "Gagal Upload";
                    }
                }
                
                $data = array(
                    'nip'               => $nip,
                    'nik'               => $nik,
                    'npwp'              => $npwp,
                    'kewarganegaraan'   => $kewarganegaraan,
                    'nama'              => $nama,
                    'email'             => $email,
                    'no_tlp'            => $no_tlp,
                    'gelar_depan'       => $gelar_depan,
                    'gelar_belakang'    => $gelar_belakang,
                    'tempat_lahir'      => $tempat_lahir,
                    'tgl_lahir'         => $tgl_lahir,
                    'jk'                => $jk,
                    'agama'             => $agama,
                    'alamat'            => $alamat,
                    
                    
                );

                $where = array( 
                    'id_dosen' => $id_dosen
                );
    
                $this->m_profil_dosen->update($where, $data, 'tbl_dosen');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
                redirect('profile_dosen');
        

    }

}


?>