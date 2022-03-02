<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        $this->load->library('session');
        //session_start();
    }


public function index(){
    $data['title'] = 'Mahasiswa';
    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array(); 
    $this->load->view('templates_dosen/header', $data); 
    $data['siswa'] = $this->m_mahasiswa->tampildata()->result();

    $this->load->view('templates_dosen/sidebar_admin',$data); 
    $this->load->view('mahasiswa/index');
    $this->load->view('templates_dosen/footer'); 
    
}

public function tambah(){
    $data['title'] = 'Tambah Mahasiswa';
    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array();
   
    $this->load->view('templates_dosen/header',$data); 
    $this->load->view('templates_dosen/sidebar_admin',$data); 

    $query= $this->db->query("select * from tbl_diklat")->result();
    $data['diklat'] = $query;
    
    $this->load->view('mahasiswa/tambah',$data);
    $this->load->view('templates_dosen/footer'); 
}

public function adminsimpan(){
    // ---------UNTUK NAMPILIN VIEW NYA-----------------------
    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Tambah Mahasiswa';
    $this->load->view('templates_dosen/header', $data); 
    $this->load->view('templates_dosen/sidebar_admin',$data); 
    $this->load->view('mahasiswa/tambah');
    $this->load->view('templates_dosen/footer'); 
    //-------------------END----------------------------------

    $nim = $this->input->post('nim');
    $nama = $this->input->post('nama');
    $angkatan = $this->input->post('angkatan');
    $tahun_masuk = $this->input->post('tahun_masuk');
    $tahun_akademik = $this->input->post('tahun_akademik');
    $jabatan = $this->input->post('jabatan');
    $email = $this->input->post('email');
    $no_tlp = $this->input->post('no_tlp');
    $foto = $this->input->post('foto');

    $data = array(
        'nim' => $nim,
        'nama' => $nama,
        'angkatan' => $angkatan,
        'tahun_masuk' => $tahun_masuk,
        'tahun_akademik' => $tahun_akademik,
        'jabatan' => $jabatan,
        'email' =>  $email,
        'no_tlp' => $no_tlp,
        'foto'   => $foto 
    );
    $this->m_mahasiswa->adminsimpan($data,'tbl_mahasiswa');
    redirect('mahasiswa');

}
public function adminedit($nim){
    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array();
    $data['title'] = 'Edit Mahasiswa';
    $this->load->view('templates_dosen/header'); 
    $this->load->view('templates_dosen/sidebar_admin',$data); 
    $where = array(
        'nim' => $nim
    );
    $data['siswanya'] = $this->m_mahasiswa->adminedit($where, 'tbl_mahasiswa')->result();
    $this->load->view('mahasiswa/edit', $data);
    $this->load->view('templates_dosen/footer'); 

}
public function adminhapus($nim){
   
        $this->db->query("delete from tbl_mahasiswa where nim ='" . $nim . "'");

        redirect('mahasiswa','refresh');
    
}
public function dosenindex(){

}



}


?>