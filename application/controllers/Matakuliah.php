<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_matakuliah');
        $this->load->library('session');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['matakuliah'] = $this->m_matakuliah->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('matakuliah/index', $data);
        $this->load->view('templates_dosen/footer'); 
        
    }

    public function tambah(){
        $data['title'] = 'Tambah Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
    
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['mata_kuliah'] = $query;
        $data['dosen'] = $this->db->query("select * from tbl_dosen")->result();
        
        $this->load->view('matakuliah/tambah',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function adminsimpan(){
        
        // ---------UNTUK NAMPILIN VIEW NYA-----------------------
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Mata Kuliah';
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('matakuliah/tambah');
        $this->load->view('templates_dosen/footer'); 
        //-------------------END----------------------------------

        $kode_mata_kuliah   = $this->input->post('kode_mata_kuliah');
        $nama_mata_kuliah   = $this->input->post('nama_mata_kuliah');
        $bobot              = $this->input->post('bobot');
        $id_dosen              = $this->input->post('id_dosen');

        $data = array(
            'kode_mata_kuliah' => $kode_mata_kuliah,
            'nama_mata_kuliah' => $nama_mata_kuliah,
            'bobot' => $bobot,
            'id_dosen' => $id_dosen
        );
        $this->m_matakuliah->adminsimpan($data,'tbl_mata_kuliah');
        redirect('matakuliah');

    }

    public function adminsimpanaksi() {

        $this->_rules();

        if($this->form_validation->run()== FALSE) {
            $this->adminsimpan();
        } else {
            $data = array(
                'kode_mata_kuliah' => $this->input->post('kode_mata_kuliah', TRUE),
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah', TRUE),
                'bobot' => $this->input->post('bobot', TRUE),
                'id_dosen' => $this->input->post('id_dosen', TRUE)
                
            );

            print_r($data);

            $this->m_matakuliah->adminsimpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data Berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('matakuliah');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_mata_kuliah', 'kode_mata_kuliah', 'required', ['required' => 'Kode Mata Kuliah Wajib diisi!']);
        $this->form_validation->set_rules('nama_mata_kuliah', 'nama_mata_kuliah', 'required', ['required' => 'Nama Mata Kuliah Wajib diisi!']);
        $this->form_validation->set_rules('bobot', 'bobot', 'required', ['required' => 'Bobot Wajib diisi!']);
    }

    public function adminedit($kode_mata_kuliah){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Mata Kuliah';
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $where = array(
            'kode_mata_kuliah' => $kode_mata_kuliah
        );
        $data['matakuliahnya'] = $this->m_matakuliah->adminedit($where, 'tbl_mata_kuliah')->result();
        $this->load->view('matakuliah/edit', $data);
        $this->load->view('templates_dosen/footer'); 

    }

    public function admineditaksi(){

        $kode_mata_kuliah = $this->input->post('kode_mata_kuliah');
        $nama_mata_kuliah = $this->input->post('nama_mata_kuliah');
        $bobot = $this->input->post('bobot');
        $id_dosen              = $this->input->post('id_dosen');

        $data = array(
            'kode_mata_kuliah' => $kode_mata_kuliah,
            'nama_mata_kuliah' => $nama_mata_kuliah,
            'bobot' => $bobot,
            'id_dosen' => $id_dosen
        );

        $where = array(
            'kode_mata_kuliah' => $kode_mata_kuliah
        );

        $this->m_matakuliah->admineditaksi($where, $data, 'tbl_mata_kuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('matakuliah');

    }

    public function adminhapus($kode_mata_kuliah){
    
        $where = array('kode_mata_kuliah' => $kode_mata_kuliah);
        $this->m_matakuliah->hapus_data($where, 'tbl_mata_kuliah'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('matakuliah');
        
    }
}


?>