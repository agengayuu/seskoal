<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Profil_mahasiswa_akses extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa_akses');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('2');
        
        
        // if(!$this->session->userdata('username')){
        //     redirect('login');
        // }
       // session_start();
    }

    public function index(){
        $data['title'] = 'Data Diri';

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data); 

        $userlogin = $this->session->userdata('id');
       
        $mahasiswa = $this->db->query("SELECT 
                            tbl_profil_mahasiswa.*, 
                            user.*, 
                            tbl_ortu_wali.*
                        FROM 
                            user 
                        LEFT JOIN tbl_profil_mahasiswa ON tbl_profil_mahasiswa.id_mahasiswa = user.id
                        LEFT JOIN tbl_ortu_wali ON tbl_ortu_wali.id_mahasiswa = user.id
                        WHERE 
                            user.id = $userlogin"
                            )->row();

                        
// echo "<pre>";
//                         print_r($mahasiswa);
//                         $ortu = $this->db->query("select * from tbl_ortu_wali where nim = '".$userlogin."'")->row_array();
//                         echo "<pre>";
//                         print_r($ortu);die;
// echo "<pre>";
//                         print_r($mahasiswa);die;

         
        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;
       
        $data['datadiri'] = $mahasiswa;
        
        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ayah'] = $query4;
        // print_r($query4);die;

        // print_r($query5);die;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ibu'] = $query5;
        // print_r($query5);die;
        
        $this->load->view('profil_mahasiswa_akses/detail', $data); 
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

}
