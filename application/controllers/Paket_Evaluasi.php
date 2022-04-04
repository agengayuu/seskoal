<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Paket_evaluasi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_paket_evaluasi');
        $this->load->library('session');
        is_logged_in('3');
        //session_start();
    }
    public function index(){
        $data['title'] = 'Paket Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['paket_evaluasi'] = $this->m_paket_evaluasi->tampil_data()->result();
        $this->load->view('paket_evaluasi/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }

    public function input() {
        $data['title'] = 'Tambah Paket Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data = array(
            'id_paket_evaluasi'           => set_value('id_paket_evaluasi'),
            'nama_paket_evaluasi'         => set_value('nama_paket_evaluasi')
        );

        $this->load->view('paket_evaluasi/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpan() {

        $this->_rules();

        if($this->form_validation->run()== FALSE) {
            $this->input();
        } else {
            $data = array(
                'nama_paket_evaluasi' => $this->input->post('nama_paket_evaluasi', TRUE)
            );

            $this->m_paket_evaluasi->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data Berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('paket_evaluasi');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nama_paket_evaluasi', 'nama_paket_evaluasi', 'required', ['required' => 'Nama Paket Wajib diisi!']);
    }

    public function update($id) {
        $data['title'] = 'Update Paket Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $where = array('id_paket_evaluasi' => $id);
        $data['paket_evaluasi'] = $this->m_paket_evaluasi->edit_data($where, 'tbl_paket_evaluasi')->result();

        $this->load->view('paket_evaluasi/update', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function update_aksi(){

        $id = $this->input->post('id_paket_evaluasi');
        $nama_paket_evaluasi = $this->input->post('nama_paket_evaluasi');

        $data = array(
            'nama_paket_evaluasi' => $nama_paket_evaluasi
        );

        $where = array(
            'id_paket_evaluasi' => $id
        );

        $this->m_paket_evaluasi->update_data($where, $data, 'tbl_paket_evaluasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('paket_evaluasi');

    }

    public function delete($id) {

        $where = array('id_paket_evaluasi' => $id);
        $this->m_paket_evaluasi->hapus_data($where, 'tbl_paket_evaluasi'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('paket_evaluasi');
    }

}


?>