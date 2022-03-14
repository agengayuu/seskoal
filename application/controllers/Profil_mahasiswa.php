<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Profil_mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa');
        $this->load->library('session');
        is_logged_in('2');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Profil Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['profil_mahasiswa'] = $this->m_profil_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('profil_mahasiswa/index', $data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function tambah(){
        $data['title'] = 'Tambah Profil Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
       
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
    
        $query1= $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $query1;

        $query2= $this->db->query("select * from tbl_ortu_wali")->result();
        $data['ortuwali'] = $query2;

        $query3= $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query3;
        
        $this->load->view('profil_mahasiswa/tambah',$data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function admintambah(){
        // $this->_rules();
        //     if($this->form_validation->run() == FALSE) {
        //         $this->tambah();
        //     } else {
                $nama = $this->input->post('nama', TRUE);
                $nim   = $this->input->post('nim', TRUE);
                $tempat_lahir   = $this->input->post('tempat_lahir', TRUE);
                $tgl_lahir        = $this->input->post('tgl_lahir');
                $hsl            = date('jmY', strtotime($tgl_lahir));
                $jenis_kelamin   = $this->input->post('jenis_kelamin', TRUE);
                $foto           = $_FILES['foto'];
                if ($foto=''){}else{
                    $config['upload_path']      = './assets/uploads/';
                    $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff';
                    $config['max_size']         = 2048;
                    $config['file_name']        = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
    
                    $this->load->library('upload', $config);
    
                    if(@$_FILES['foto']['name'] != null){
                        if(!$this->upload->do_upload('foto')){
                            echo 'Gagal Upload'; die();
                        } else {
                            $foto = $this->upload->data('file_name');
                        }
                    }
                }
                $created_at             = $this->input->post('created_at');
                
    
                $created_at = date('Y-m-d H:i:s');
                $agama      = $this->input->post('agama');
                $id_diklat      = $this->input->post('id_diklat');
                $angkatan      = $this->input->post('angkatan');
                $id_akademik    = $this->input->post('id_akademik');
                $kewarganegaraan = $this->input->post('kewarganegaraan');
                $nik = $this->input->post('nik');
                $npwp = $this->input->post('npwp');
                $jalan = $this->input->post('jalan');
                $dusun = $this->input->post('dusun');
                $rt = $this->input->post('rt');
                $rw = $this->input->post('rw');
                $kelurahan = $this->input->post('kelurahan');
                $kecamatan = $this->input->post('kecamatan');
                $kode_pos = $this->input->post('kode_pos');
                $email = $this->input->post('email');
                $jabatan = $this->input->post('jabatan');
                $no_tlp = $this->input->post('no_tlp');
                
                // $id_mahasiswa   = $this->input->post('id_mahasiswa');

                $data = array(
                    'nama' => $nama,
                    'nim' => $nim,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => date('Y-m-d'),
                    'jenis_kelamin' => $jenis_kelamin,
                    'foto' => $foto,
                    'agama' => $agama,
                    'id_diklat' => $id_diklat,
                    'angkatan' => $angkatan,
                    'id_akademik' => $id_akademik,
                    'kewarganegaraan' => $kewarganegaraan,
                    'nik' => $nik,
                    'npwp' => $npwp,
                    'jalan' => $jalan,
                    'dusun' => $dusun,
                    'rt' => $rt,
                    'rw' => $rw,
                    'kelurahan' => $kelurahan,
                    'kecamatan' => $kecamatan,
                    'kode_pos' => $kode_pos,
                    'email' => $email,
                    'jabatan' => $jabatan,
                    'no_tlp' => $no_tlp,
                    'created_at'  => $created_at
                );

                $data2 = array(
                    'username' => $nim,
                    'id_grup_user' => 2,
                    'is_active' => 1,
                    'id_unique' => $nim.$hsl,
                    'date_created' => time()
                );

                $mahasiswa = $this->m_profil_mahasiswa->admintambah($data,'tbl_profil_mahasiswa');
                $this->m_profil_mahasiswa->simpanuser($data2, 'user');
                $jenis = ['AYAH','IBU'];
		        foreach($jenis as $key=>$val){
			        $this->db->insert("tbl_ortu_wali",[
                    'id_mahasiswa' => $mahasiswa,
                    'nik_ortu' => ($_POST['nik_ortu'][$key]) ? $_POST['nik_ortu'][$key] : NULL,
                    'nama_ortu' => ($_POST['nama_ortu'][$key]) ? $_POST['nama_ortu'][$key] : NULL,
                    'tempat_lahir_ortu' => ($_POST['tempat_lahir_ortu'][$key]) ? $_POST['tempat_lahir_ortu'][$key] : NULL,
                    'tgl_lahir_ortu' => ($_POST['tgl_lahir_ortu'][$key]) ? $_POST['tgl_lahir_ortu'][$key] : NULL,
                    'pendidikan_ortu' => ($_POST['pendidikan_ortu'][$key]) ? $_POST['pendidikan_ortu'][$key] : NULL,
                    'pekerjaan_ortu' => ($_POST['pekerjaan_ortu'][$key]) ? $_POST['pekerjaan_ortu'][$key] : NULL,
                    'penghasilan_ortu' => ($_POST['penghasilan_ortu'][$key]) ? $_POST['penghasilan_ortu'][$key] : NULL,
                    'jenis_data_ortu' => $val,
			        ]);
		        }
                //$this->m_profil_mahasiswa->simpanjenis($jenis, 'tbl_ortu_wali');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
                redirect('profil_mahasiswa');
            // }
    }

    // public function _rules(){
    //     $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama wajib diisi!']);
    //     $this->form_validation->set_rules('nim', 'nim', 'required' , ['required' => 'NIM wajib diisi!']);
    //     $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required' , ['required' => 'Tempat Lahir wajib diisi!']);
    //     $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required' , ['required' => 'Tanggal Lahir wajib diisi!']);
    //     $this->form_validation->set_rules('nim', 'nim', 'required' , ['required' => 'NIM wajib diisi!']);
    //     $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required' , ['required' => 'Jenis Kelamin wajib diisi!']);
    //     $this->form_validation->set_rules('foto', 'foto', 'required' , ['required' => 'Foto wajib dipilih!']);
    //     $this->form_validation->set_rules('agama', 'agama', 'required' , ['required' => 'Agama wajib dipilih!']);
    //     $this->form_validation->set_rules('id_akademik', 'id_akademik', 'required' , ['required' => 'Tahun Akademik wajib diisi!']);
    //     $this->form_validation->set_rules('id_diklat', 'id_diklat', 'required' , ['required' => 'Diklat wajib diisi!']);
    //     $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required' , ['required' => 'Kewarganegaraan wajib diisi!']);
    //     $this->form_validation->set_rules('nik', 'nik', 'required' , ['required' => 'NIK wajib diisi!']);
    //     $this->form_validation->set_rules('jalan', 'jalan', 'required' , ['required' => 'Jalan wajib diisi!']);
    //     $this->form_validation->set_rules('dusun', 'dusun', 'required' , ['required' => 'Dusun wajib diisi!']);
    //     $this->form_validation->set_rules('rt', 'rt', 'required' , ['required' => 'RT wajib diisi!']);
    //     $this->form_validation->set_rules('rw', 'rw', 'required' , ['required' => 'RW wajib diisi!']);
    //     $this->form_validation->set_rules('kelurahan', 'kelurahan', 'required' , ['required' => 'Kelurahan wajib diisi!']);
    //     $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required' , ['required' => 'Kecamatan wajib diisi!']);
    //     $this->form_validation->set_rules('kode_pos', 'kode_post', 'required' , ['required' => 'Kode Pos wajib diisi!']);
    //     $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required' , ['required' => 'Telepon wajib diisi!']);
    //     $this->form_validation->set_rules('email', 'email', 'required' , ['required' => 'Email wajib diisi!']);
    //     $this->form_validation->set_rules('pendidikan', 'pendidikan', 'required' , ['required' => 'Pendidikan wajib dipilih!']);
    //     $this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'required' , ['required' => 'Pekerjaan wajib dipilih!']);
    //     $this->form_validation->set_rules('penghasilan', 'penghasilan', 'required' , ['required' => 'Penghasilan wajib dipilih!']);
    // }

    public function detail($id_mahasiswa){
		$data['title'] = "Detail Mahasiswa";

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();

        // $userlogin = $this->session->userdata('username');
        // $mahasiswa = $this->db->query("SELECT tbl_profil_mahasiswa.*, user.*
        //                 FROM tbl_profil_mahasiswa
        //                 JOIN user ON tbl_profil_mahasiswa.nim = user.username
        //                 WHERE tbl_profil_mahasiswa.nim = $userlogin ")->result();

        // $data['user'] = $mahasiswa;

        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);

        $query1= $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2= $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;
		
        $query3= $this->db->query("select * from tbl_profil_mahasiswa where id_mahasiswa = ".$id_mahasiswa."")->row();
        $data['datadiri'] = $query3;

        // echo $query4;die;

        $query4= $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = ".$id_mahasiswa."")->row();
        $data['ayah'] = $query4;

        // print_r($query5);die;

        $query5= $this->db->query("select * from data_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = ".$id_mahasiswa."")->row();
        $data['ibu'] = $query5;
		
    	$this->load->view('profil_mahasiswa/detail',$data);
        $this->load->view('templates_dosen/footer'); 
    }
}
