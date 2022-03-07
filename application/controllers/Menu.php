<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Menu extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_menu');
        $this->load->library('session');
       // session_start();
    }
    public function index(){
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 

        $query = $this->db->query('select * from user_menu')->result();
        $data['menunya'] = $query;
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/index');
        $this->load->view('templates_dosen/footer'); 
            
    }

    public function tambah(){
        $data['title'] = 'Tambah Management';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/tambah');
        $this->load->view('templates_dosen/footer'); 

    }

    public function simpan(){
        $data['title'] = 'Tambah Management';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/tambah');
        $this->load->view('templates_dosen/footer'); 

        $nama_menu = $this->input->post('nama_menu');
        $data = array( 
                'nama_menu' =>  $nama_menu
            );
        $this->m_menu->adminsimpan($data, 'user_menu');
        
        redirect('menu', 'refresh');

    }

    public function _rules() {
        $this->form_validation->set_rules('nama_menu', 'nama_menu', 'required', ['required' => 'Nama Menu Wajib diisi!']);
    }

    public function edit($id_menu){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Menu';
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $where = array(
            'id_menu' => $id_menu
        );
        $data['menunya'] = $this->m_menu->edit_data($where, 'user_menu')->result();
        $this->load->view('menu/edit', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function editaksi(){
        $id_menu = $this->input->post('id_menu');
        $nama_menu = $this->input->post('nama_menu');

        $data = array(
            'id_menu' => $id_menu,
            'nama_menu' => $nama_menu
        );

        $where = array(
            'id_menu' => $id_menu
        );

        $this->m_menu->edit_data_aksi($where, $data, 'user_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('menu');
    }

    public function hapus($id_menu){
        $where = array('id_menu' => $id_menu);
        $this->m_menu->hapus_data($where, 'user_menu'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('menu');

    }

    public function submenu(){
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 

        $data['submenu'] = $this->m_menu->submenutampil();
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/submenu');
        $this->load->view('templates_dosen/footer'); 

    }
    public function tambahsub(){
        $data['title'] = 'Tambah Sub Menu ';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 

        $data['menunya'] = $this->db->query("select * from user_menu") ->result();
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/tambahsub');
        $this->load->view('templates_dosen/footer'); 

    }
    
    
    public function simpansub(){
        $data['title'] = 'Tambah Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/tambah');
        $this->load->view('templates_dosen/footer'); 

        $title = $this->input->post('title');
        $id_menu = $this->input->post ('id_menu');
        $url = $this->input->post ('url');
        $icon = $this->input->post ('icon');
        $is_active = $this->input->post ('is_active');

        $data = array( 
                'title' =>  $title,
                'id_menu' => $id_menu,
                'url' => $url,
                'icon' => $icon,
                'is_active' => $is_active

            );
        $this->m_menu->adminsubsimpan($data, 'user_submenu');
        
        redirect('menu/submenu', 'refresh');

    }

    public function subedit($id){
        
        $data['title'] = 'Edit Sub Menu ';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);           

        $where = array(
            'id_sub_menu' => $id
        ); 
        $data['menunya'] = $this->db->query("select * from user_menu") ->result();
        $data['subnya'] = $this->m_menu->subedit($where, 'user_submenu');
        $this->load->view('menu/editsub',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function editsubaksi(){
        $data['title'] = 'Edit Sub Menu';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);             
        $this->load->view('menu/tambah');
        $this->load->view('templates_dosen/footer'); 

        $title = $this->input->post('title');
        $id_menu = $this->input->post ('id_menu');
        $url = $this->input->post ('url');
        $icon = $this->input->post ('icon');
        $is_active = $this->input->post ('is_active');
        $id = $this->input->post('id_sub_menu');

        $data = array( 
                'title' =>  $title,
                'id_menu' => $id_menu,
                'url' => $url,
                'icon' => $icon,
                'is_active' => $is_active

            );
        $where = array(
                'id_sub_menu' => $id
            ); 
        $this->m_menu->editsubaksi($where, $data, 'user_submenu');
        
        redirect('menu/submenu', 'refresh');


    }

    public function subdelete($id){
   
        $this->db->query("delete from user_submenu where id_sub_menu ='" . $id . "'");

        redirect('menu/submenu','refresh');
    

    }


}