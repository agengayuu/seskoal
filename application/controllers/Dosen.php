<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_dosen');
        $this->load->library('session');
        //session_start();
    }


    public function index(){
        $data['title'] = " Dosen";
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 

        $this->load->view('templates_dosen/header',$data); 
        $query = $this->db->query("select * from 
                        tbl_dosen ")->result();
        $data['dosen'] = $query;
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('dosen/index');
        $this->load->view('templates_dosen/footer');
    }

    public function admintambah(){
        $data['title'] = "Tambah Dosen";
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header',$data); 
        $query = $this->db->query("select * from 
                        tbl_dosen ")->result();
        $data['dosen'] = $query;
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('dosen/tambah');
        $this->load->view('templates_dosen/footer');

    }

    public function adminsimpan(){
        $data['title'] = "Simpan Dosen";
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        

        $nip            = $this->input->post('nip');
        $nama           = $this->input->post('nama');
        $email          = $this->input->post('email');
        $no_tlp         = $this->input->post('no_tlp');
        $gelar_depan    = $this->input->post('gelar_depan');
        $gelar_belakang = $this->input->post('gelar_belakang');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $jk             = $this->input->post('jk');
        $agama          = $this->input->post('agama');
        $alamat          = $this->input->post('alamat');
        $foto           = $this->input->post('foto');
        $id_grup_user   = $this->input->post('id_grup_user');
        $created_at     = $this->input->post('created_at');
        $hsl            = date('jmY', strtotime($tgl_lahir));

        $data = array(
            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'no_tlp' => $no_tlp,
            'gelar_depan' =>$gelar_depan,    
            'gelar_belakang' => $gelar_belakang,
            'tempat_lahir' =>  $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jk'   => $jk,
            'agama'   => $agama,
            'alamat'   => $alamat,
            'foto'   => $foto,
            'jk'   => $jk ,
            'created_at' => time()

        );

        $data2 = array(
            'username' => $nip,
            'id_grup_user' => 3,
            'is_active' =>1,
            'id_unique' => $nip.$hsl,
            'date_created' => time()

        );

        $this->m_dosen->adminsimpan($data, 'tbl_dosen');
        $this->m_dosen->simpanuser($data2,'user');
        redirect ('dosen');
    }


    public function adminedit($iddosen){
        $data['title'] ="Edit Update";
        $data['user'] = $this->db->get_where('user',['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $where = array(
            'id_dosen' => $iddosen
        );
        $data['dosennya'] = $this->m_dosen->adminedit($where,'tbl_user')->result();
        $this->load->view('dosen/edit',$data);
        $this->load->view('templates_dosen/footer');

    }

    public function adminupdate(){
        $data['title'] ="Edit Update";
        $data['user'] = $this->db->get_where('user',['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $id_dosen       = $this->input->post('id_dosen');
        $nip            = $this->input->post('nip');
        $nama           = $this->input->post('nama');
        $email          = $this->input->post('email');
        $no_tlp         = $this->input->post('no_tlp');
        $gelar_depan    = $this->input->post('gelar_depan');
        $gelar_belakang = $this->input->post('gelar_belakang');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tgl_lahir      = $this->input->post('tgl_lahir');
        $jk             = $this->input->post('jk');
        $agama          = $this->input->post('agama');
        $alamat          = $this->input->post('alamat');
        $foto           = $this->input->post('foto');

        $data = array(
            'id_dosen' => $id_dosen,
            'nip' => $nip,
            'nama' => $nama,
            'email' => $email,
            'no_tlp' => $no_tlp,
            'gelar_depan' =>$gelar_depan,    
            'gelar_belakang' => $gelar_belakang,
            'tempat_lahir' =>  $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jk'   => $jk,
            'agama'   => $agama,
            'alamat'   => $alamat,
            'foto'   => $foto,
            'jk'   => $jk 
        );

        $where = array(
            'id_dosen' => $id_dosen
        );

        $this->m_dosen->adminupdate($where,$data,'tbl_dosen');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('dosen');

    }

    public function adminhapus($id_dosen){

        $where = array('id_dosen' => $id_dosen);
        $this->m_dosen->adminhapus($where, 'tbl_dosen'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('dosen', 'refresh');
    }

    public function admindetail($id_dosen){
        $data['title'] = 'Detail Dosen';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['detail'] = $this->m_dosen->admindetail($id_dosen);

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('dosen/detail');
        $this->load->view('templates_dosen/footer'); 
    }
}