<?php

class Jenis_ruang extends CI_Controller{
    public function index(){
        $data['jenis_ruang'] = $this->jenis_ruang_model->tampil_data()->result();

        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar'); 
        $this->load->view('jenis_ruang/jenis_ruang', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function input() {
        $data = array(
            'id_jenis_ruang'           => set_value('id_jenis_ruang'),
            'nama_jenis_ruang'         => set_value('nama_jenis_ruang'),
            'created_at'               => set_value('created_at')
        );

        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar'); 
        $this->load->view('jenis_ruang/tambah_jenis_ruang', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function delete($id) {

        $where = array('id_jenis_ruang' => $id);
        $this->jenis_ruang_model->hapus_data($where, 'tbl_jenis_ruang'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span> </button></div>');

        redirect('jenis_ruang');
    }
}


?>