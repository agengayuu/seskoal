<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Hak_akses extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_diklat');
        $this->load->model('m_hak');
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



        public function tambah(){
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Hak Akses';
        $this->load->view('templates_dosen/header');
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $this->load->view('hak_akses/tambah', $data);
        $this->load->view('templates_dosen/footer');

        }


        public function simpan(){
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('hak_akses/tambah');
        $this->load->view('templates_dosen/footer');

        $nama= $this->input->post('nama');
        $data = array(
                'nama' =>  $nama
            );
        $this->m_hak->adminsimpan($data, 'grupuser');

        redirect('hak_akses/hak', 'refresh');

        }


        public function edit($idhak){
            
        $data['title'] = 'Edit Hak Akses';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $where = array(
            'id_grup_user' => $idhak
        );
        $data['haknya'] = $this->m_hak->edit_data($where, 'grupuser')->result();
        $this->load->view('hak_akses/edit', $data);
        $this->load->view('templates_dosen/footer');
        }


        public function update(){

        $id_grup_user = $this->input->post('id_grup_user');
        $nama = $this->input->post('nama');

        $data = array(
                'id_grup_user' => $id_grup_user,
                'nama' => $nama
            );

        $where = array(
            'id_grup_user' => $id_grup_user
            );

        $this->m_hak->edit_data_aksi($where, $data, 'grupuser');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('hak_akses/hak');
        }


        public function hapus($id){

        $this->db->query("delete from grupuser where id_grup_user ='" . $id . "'");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('hak_akses/hak', 'refresh');
        }




}
