<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
 
class Peserta_evaluasi extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_peserta_evaluasi');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        //session_start();
    }

    public function index() {
        $data['title'] = 'Mahasiswa Evaluasi';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_mahasiswa_evaluasi")->result();
        $data['peserta'] = $query;

        $query = $this->db->query("select a.*,b.* 
                                from tbl_mahasiswa_evaluasi a, tbl_profil_mahasiswa b
                                where a.id_mahasiswa = b.id_mahasiswa order by a.id_mahasiswa")->result();
        $data['peserta'] = $query;
    
        
        $this->load->view('peserta_evaluasi/index', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function input() {
        $data['title'] = 'Tambah Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $query;

        $query= $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['matakuliah'] = $query;

        $query= $this->db->query("select * from tbl_profil_mahasiswa")->result();
        $data['mahasiswa'] = $query;

        $query = $this->db->query("select a.*,b.* 
                                    from tbl_profil_mahasiswa a, tbl_diklat b
                                    where a.id_diklat = b.id_diklat order by a.id_diklat")->result();
        $data['mahasiswa'] = $query;

        $this->load->view('peserta_evaluasi/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpan(){
		$id_mata_kuliah 	= $this->input->post('id_mata_kuliah');
		$tanggal_ujian		= $this->input->post('tanggal_ujian');
		$jam_ujian			= $this->input->post('jam_ujian');
		$durasi_ujian		= $this->input->post('durasi_ujian');

		
		if ($id_mata_kuliah == '' || $tanggal_ujian == '' || $jam_ujian == '' || $durasi_ujian == '') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="icon fa fa-check"></i> Input Data Peserta Gagal ! Cek kembali data yang diinputkan.</div>');
			redirect(base_url('peserta_evaluasi'));
		} else {
			$result = $this->m_peserta_evaluasi->insert_multiple();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil di Tambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button></div>');
			redirect(base_url('peserta_evaluasi'));
		}
    }

    public function update($id){
        $data['title'] = 'Edit Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data);

        $where = array( 'id_evaluasi' => $id );
        $data['peserta'] = $this->m_peserta_evaluasi->edit_data($where,'tbl_mahasiswa_evaluasi')->result();

        $query= $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['matakuliah'] = $query;

        $query= $this->db->query("select * from tbl_profil_mahasiswa")->result();
        $data['mahasiswa'] = $query;

        $this->load->view('peserta_evaluasi/update',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function update_aksi()
	{
		$id_mahasiswa 		= $this->input->post('id_mahasiswa');
		$id_mata_kuliah 	= $this->input->post('id_mata_kuliah');
		$tanggal_ujian		= $this->input->post('tanggal_ujian');
		$jam_ujian			= $this->input->post('jam_ujian');
		$durasi_ujian		= $this->input->post('durasi_ujian');
		$timer_ujian 		= $durasi_ujian*60;
		$where  = array('id_evaluasi' => $this->input->post('id_evaluasi'));

		if ($id_mahasiswa == '' || $id_mata_kuliah == '' || $tanggal_ujian == '' || $jam_ujian == '' || $durasi_ujian == '') {
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Data gagal. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span> </button></div>');
			redirect(base_url('peserta_evaluasi'));
		} else {
			$data = array(
				'id_mahasiswa'		=> $id_mahasiswa,
				'id_mata_kuliah'	=> $id_mata_kuliah,
				'tanggal_ujian'		=> $tanggal_ujian,
				'jam_ujian'			=> $jam_ujian,
				'durasi_ujian'		=> $durasi_ujian,
				'timer_ujian'		=> $timer_ujian,
				'status_ujian'		=> 1
				
			);

			$this->m_peserta_evaluasi->update_data($where, $data, 'tbl_mahasiswa_evaluasi');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span> </button></div>');
			redirect(base_url('peserta_evaluasi'));
		}
	}

    public function delete($id) {

        $where = array('id_evaluasi' => $id);
        $this->m_peserta_evaluasi->hapus_data($where, 'tbl_mahasiswa_evaluasi'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('peserta_evaluasi');
    }

} 
