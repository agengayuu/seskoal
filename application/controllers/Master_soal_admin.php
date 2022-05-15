<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Master_soal_admin  extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_master_soal');
        $this->load->model('m_diklat');
        $this->load->library('session');
        // is_logged_in('3');
        //session_start();
    }

    public function index(){
        $data['title'] = 'Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['diklat'] = $this->db->query("select * from tbl_diklat")->result();

        // $query = $this->db->query("select a.*,b.* 
        //                             from tbl_master_soal a, tbl_mata_kuliah b
        //                             where a.id_mata_kuliah = b.id_mata_kuliah order by a.id_mata_kuliah")->result();

        // $data['soal'] = $query;

        $this->load->view('master_soal_admin/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }  

    public function getmatkul($id){
    $data['title'] = 'Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $matkul = $this->db->query("select * from tbl_mata_kuliah where id_diklat = $id")->result();
        $data['matkul'] =   $matkul;
        $this->load->view('master_soal_admin/index2', $data); 
        $this->load->view('templates_dosen/footer'); 

    }

    public function getallsoal($id){
        $data['title'] = 'Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $soal = $this->db->query("select * from tbl_master_soal where id_mata_kuliah='".$id."'")->result();
        $data['soal'] = $soal;    

        $this->load->view('master_soal_admin/getsoal', $data); 
        $this->load->view('templates_dosen/footer'); 


    }

    public function getpaket($id){
        $data['title'] = 'Paket Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $paket = $this->db->query("select * from tbl_paket_evaluasi where id_mata_kuliah='".$id."'")->result();
        $data['paket'] = $paket;    

        $this->load->view('master_soal_admin/getpaket', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    // public function getmahasiswa($id){
    //     $data['title'] = 'Master Soal';

    //     $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
    //     $this->load->view('templates_dosen/header',$data);  
    //     $this->load->view('templates_dosen/sidebar_admin',$data); 

    //     $join = $this->db->query("select tbl_mata_kuliah.id_mata_kuliah, tbl_diklat.id_diklat, tbl_mahasiswa.*
    //                                 from tbl_diklat
    //                                 join tbl_mata_kuliah
    //                                 on tbl_mata_kuliah.id_diklat = tbl_diklat.id_diklat
    //                                 join tbl_mahasiswa
    //                                 on tbl_mahasiswa.id_diklat = tbl_diklat.id_diklat 
    //                                 where tbl_mata_kuliah.id_diklat = tbl_mahasiswa.id_diklat")->result();
    //     // echo "<pre>";
    //     // print_r($join);die;
    //     $mhs = $this->db->query("select * from tbl_mahasiswa where id_diklat = $id")->result();
    //     $data['mhs'] = $mhs;
    //     $this->load->view('master_soal_admin/index3', $data); 
    //     $this->load->view('templates_dosen/footer'); 
    // }

    public function getsoal_paket($id_eval){

        // mengambil data soal dari mata kuliah dan paekt yang dipilih
        $data['title'] = 'Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 
     
        // $soal_paket = $this->db->query("select tbl_master_eval.*, tbl_master_soal.*, tbl_paket_evaluasi.*, tbl_mata_kuliah.*
        //                                  from tbl_master_eval
        //                                  join tbl_master_soal
        //                                  on tbl_master_eval.id_master_soal = tbl_master_soal.id_master_soal
        //                                  join tbl_paket_evaluasi
        //                                  on tbl_master_eval.id_eval = tbl_paket_evaluasi.id_paket_evaluasi
        //                                  join tbl_mata_kuliah
        //                                  on tbl_master_soal.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah
        //                                  where tbl_master_eval.id_eval = $id_eval")->result(); 

                                        //  select master_eval where id_eval = $id_eval
        // $id_eval = $this->uri->segment(4);
        $data['list'] = $this->m_master_soal->getsoal_paket($id_eval);

        // echo "<pre>";
        // print_r( $data['list']);die;
        // print_r(  $soal_paket );die;

        $this->load->view('master_soal_admin/listsoal', $data); 
        $this->load->view('templates_dosen/footer'); 

    }
}
    

?>