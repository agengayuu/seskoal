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
        $this->load->model('m_akademik');
        $this->load->library('session');
        is_logged_in('1');
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
        $sks              = $this->input->post('sks');
        $id_dosen              = $this->input->post('id_dosen');

        $data = array(
            'kode_mata_kuliah' => $kode_mata_kuliah,
            'nama_mata_kuliah' => $nama_mata_kuliah,
            'sks' => $sks,
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
                'sks' => $this->input->post('sks', TRUE),
                'id_dosen' => $this->input->post('id_dosen', TRUE)
                
            );



            $this->m_matakuliah->adminsimpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('matakuliah');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_mata_kuliah', 'kode_mata_kuliah', 'required', ['required' => 'Kode Mata Kuliah Wajib diisi!']);
        $this->form_validation->set_rules('nama_mata_kuliah', 'nama_mata_kuliah', 'required', ['required' => 'Nama Mata Kuliah Wajib diisi!']);
        $this->form_validation->set_rules('sks', 'sks', 'required', ['required' => 'sks Wajib diisi!']);
    }

    public function adminedit($kode_mata_kuliah){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Mata Kuliah';
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['dosen'] = $this->db->query("Select * from tbl_dosen")->result();

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
        $sks = $this->input->post('sks');
        $id_dosen              = $this->input->post('id_dosen');

        $data = array(
            'kode_mata_kuliah' => $kode_mata_kuliah,
            'nama_mata_kuliah' => $nama_mata_kuliah,
            'sks' => $sks,
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

    public function thn_akademik(){

        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $data['akademik'] = $this->m_akademik->getdata();

        $this->load->view('matakuliah/tahun', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function daftarmatkul($id){
        $data['title'] = 'Daftar Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $join = $this->db->query("Select tbl_daftar_matkul.*, tbl_mata_kuliah.*, thn_akademik.*, tbl_dosen.*
                                    from tbl_mata_kuliah
                                    join tbl_daftar_matkul
                                    on tbl_mata_kuliah.id_mata_kuliah = tbl_daftar_matkul.id_mata_kuliah
                                    join thn_akademik
                                    on thn_akademik.id_akademik = tbl_daftar_matkul.id_akademik
                                    join tbl_dosen
                                    on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen
                                    where tbl_daftar_matkul.id_akademik = $id")->result();
        // echo"<pre>";
        // print_r($join);die;
        $data['daftarmatkul'] = $join;
     
        $this->load->view('matakuliah/daftarmatkul',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function tambahdaftar(){
        $data['title'] = 'Tambah Daftar Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $akademik = $this->db->query("select * from thn_akademik")->result();
        $matkul   = $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['matkul'] = $matkul;
        $data['akademik']=$akademik;

        $this->load->view('matakuliah/tambahdaftar',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpanmatkul(){
    
            $data = array(
                'id_akademik' => $this->input->post('id_akademik', TRUE),
                'id_mata_kuliah' => $this->input->post('id_mata_kuliah', TRUE),
            );

            $this->m_matakuliah->daftarsimpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('matakuliah/daftarmatkul','refresh');

    }
}


?>