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
        is_logged_in('1');
        
        //session_start();
    }


public function index(){
    $data['title'] = 'Mahasiswa';
    $data['user'] = $this->db->get_where('user', ['username'=> 
    $this->session->userdata('username')])->row_array(); 
    $this->load->view('templates_dosen/header', $data); 
    $data['siswa'] = $this->m_mahasiswa->tampildata()->result();

    $this->load->view('templates_dosen/sidebar_admin',$data); 
    $this->load->view('mahasiswa/index',$data);
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

    $nim            = $this->input->post('nim');
    $nama           = $this->input->post('nama');
    $angkatan       = $this->input->post('angkatan');
    $tgl_lahir      = $this->input->post('tgl_lahir');
    $tahun_masuk    = $this->input->post('tahun_masuk');
    $tahun_akademik = $this->input->post('tahun_akademik');
    $jabatan        = $this->input->post('jabatan');
    $email          = $this->input->post('email');
    $no_tlp         = $this->input->post('no_tlp');
    $foto           = $this->input->post('foto');
    $id_diklat      = $this->input->post('id_diklat');
    $id_grup_user   = $this->input->post('id_grup_user');
    // $tgl_lhr        = $this->input->post('tgl_lhr');
    $hsl            = date('jmY', strtotime($tgl_lahir));

    $data = array(
        'nim' => $nim,
        'nama' => $nama,
        'angkatan' => $angkatan,
        'tgl_lahir' => $tgl_lahir,
        'tahun_masuk' => $tahun_masuk,
        'tahun_akademik' => $tahun_akademik,
        'jabatan' => $jabatan,
        'email' =>  $email,
        'id_diklat' => $id_diklat,
        'no_tlp' => $no_tlp,
        'foto'   => $foto
    );

    $data2 = array(
        'username' => $nim,
        'id_grup_user' => 2,
        'is_active' =>1,
        'foto'   => $foto,
        'id_unique' => $nim.$hsl
    );

    

    $this->m_mahasiswa->adminsimpan($data,'tbl_mahasiswa');
    $idmahasiswa = $this->m_mahasiswa->simpanuser($data2, 'user');
    
    $data3 = array(
        'id_mahasiswa' => $idmahasiswa,
        'nim' => $nim,
        'nama' => $nama,
        'angkatan' => $angkatan,
        'tgl_lahir' => $tgl_lahir,
        'jabatan' => $jabatan,
        'email' =>  $email,
        'id_diklat' => $id_diklat,
        'no_tlp' => $no_tlp,
        'foto'   => $foto
    );
    $this->m_mahasiswa->adminsimpan($data3, 'tbl_profil_mahasiswa');
    
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
    $data['diklat'] = $this->db->query("Select * from tbl_diklat")->result();
    $data['siswanya'] = $this->m_mahasiswa->adminedit($where, 'tbl_mahasiswa')->result();
    $this->load->view('mahasiswa/edit', $data);
    $this->load->view('templates_dosen/footer'); 

}
public function adminhapus($nim){

        $where = array('nim' => $nim);
        $this->m_mahasiswa->adminhapus($where, 'tbl_mahasiswa'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
    
        redirect('mahasiswa','refresh');
}

public function admindetail($nim){
        $data['title'] = 'Detail Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['detail'] = $this->m_mahasiswa->admindetail($nim);

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('mahasiswa/detail');
        $this->load->view('templates_dosen/footer'); 
}

    public function update()
    {

        // ---------UNTUK NAMPILIN VIEW NYA-----------------------
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Mahasiswa';
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('mahasiswa/tambah');
        $this->load->view('templates_dosen/footer');
        //-------------------END----------------------------------
        $id             = $this->input->post('id_mahasiswa');
        $nim            = $this->input->post('nim');
        $nama           = $this->input->post('nama');
        $angkatan       = $this->input->post('angkatan');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $tahun_masuk    = $this->input->post('tahun_masuk');
        $tahun_akademik = $this->input->post('tahun_akademik');
        $jabatan        = $this->input->post('jabatan');
        $email          = $this->input->post('email');
        $no_tlp         = $this->input->post('no_tlp');
        $foto           = $this->input->post('foto');
        $id_diklat      = $this->input->post('id_diklat');
        $id_grup_user   = $this->input->post('id_grup_user');
        $tgl_lhr        = $this->input->post('tgl_lhr');
        $hsl            = date('jmY', strtotime($tgl_lhr));

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'angkatan' => $angkatan,
            'tgl_lahir' => $tgl_lahir,
            'tahun_masuk' => $tahun_masuk,
            'tahun_akademik' => $tahun_akademik,
            'jabatan' => $jabatan,
            'email' =>  $email,
            'id_diklat' => $id_diklat,
            'no_tlp' => $no_tlp,
            'foto'   => $foto
        );

        $data2 = array(
            'foto'   => $foto,
        );

        $where = array (
          'id_mahasiswa' => $id
        );

       
        $this->m_mahasiswa->adminsimpan($where, $data, 'tbl_mahasiswa');
        $this->m_mahasiswa->simpanuser($where, $data2, 'user');
        redirect('mahasiswa');
    }



}



?>