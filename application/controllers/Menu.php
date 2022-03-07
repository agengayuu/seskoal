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

    public function edit(){


    }

    public function editaksi(){


    }

    public function hapus (){


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
        $is_active = $this->input->post ('status');

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

    }

    










}