<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Nilai extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_nilai');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('1');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Nilai';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $query = $this->m_nilai->tampil()->result();
        $data['nilai'] = $query;
        $this->load->view('nilai/index',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function tambah(){
        $data['title'] = 'Nilai';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('nilai/tambah');

        $data['nilai'] = $this->m_nilai->tampil()->result();
        $this->load->view('templates_dosen/footer'); 

    }

    public function simpan (){
        // $this->form_validation->set_rules('batas_akhir', 'Batas Akhir', 'trim|required|greater_than['.$this->input->post('batas_awal').']');
        $this->form_validation->set_rules('batas_awal', 'Batas Awal', 'trim|required|numeric');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

         if ($this->form_validation->run() == FALSE){
             $this->tambah();
         }else{
             $awal = $this->input->post('batas_awal');
             $akhir = $this->input->post('batas_akhir');
             $mutu = $this->input->post('mutu');
             $ket = $this->input->post('keterangan');


             $data = array(
                 'batas_awal' => $awal,
                 'batas_akhir' => $akhir,
                 'mutu'  => $mutu,
                 'keterangan' => $ket
             );
        }
        $this->m_nilai->adminsimpan($data, 'tbl_nilai');
        redirect('nilai');
    }
    

    public function hapus($id){
    $this->db->query("delete from tbl_nilai where id_nilai ='" . $id . "'");

        redirect('nilai','refresh');
    }

    public function edit($id){
        $data['title'] = 'Edit Nilai';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $where = array(
            'id_nilai' => $id
        );
    
        $data['nilainya'] = $this->m_nilai->edit_data($where, 'tbl_nilai')->result();
        $this->load->view('nilai/edit',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function update(){

             $awal = $this->input->post('batas_awal');
             $akhir = $this->input->post('batas_akhir');
             $mutu = $this->input->post('mutu');
             $ket = $this->input->post('keterangan');
             $id = $this->input->post('id_nilai');


             $data = array(
                 'batas_awal' => $awal,
                 'batas_akhir' => $akhir,
                 'mutu'  => $mutu,
                 'keterangan' => $ket
             );

             $where = array(
                 'id_nilai' => $id
             );

             $this->m_nilai->update_data($where,$data, 'tbl_nilai');
             $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                            Data Berhasil diupdate! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span></button></div>');
             redirect('nilai');
    }

    // public function get_mutu(){
    //     $mutu = $this->input->post('mutu');
    //     print_r($mutu);die;
    //     $mutu = [];
    //     foreach($mutu as $m){
    //         if($mutu == A){
    //             echo"Sangat Baik";
    //         }elseif($mutu == B){
    //             echo"Cukup Baik";
    //         }else{
    //             echo"Baik";
    //         }

    //     }

    // }
}