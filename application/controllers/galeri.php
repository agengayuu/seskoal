<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_galeri');
        $this->load->library('session');
        $this->load->helper('download');
        is_logged_in('1');
    }

    public function index()
    {
        $data['title'] = 'Galeri';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['galeri'] = $this->m_galeri->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('galeri/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Galeri';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('galeri/tambah', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kegiatan', 'Nama kegiatan', 'required', ['required' => 'Nama kegiatan wajib diisi!']);
    }

    public function simpan()
    {
        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $nama_kegiatan = $this->input->post('nama_kegiatan', true);
            $dokumen = $_FILES['foto'];
            if ($dokumen = '') {
            } else {
                $config['upload_path'] = './assets/uploads/';
                $config['allowed_types'] = 'jpg|png|jpeg|gif|tiff|pdf';
                $config['max_size'] = 5000;
                $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);

                if (@$_FILES['foto']['name'] != null) {
                    if (!$this->upload->do_upload('foto')) {
                        echo 'Gagal Upload';
                        die();
                    } else {
                        $dokumen = $this->upload->data('file_name');
                    }
                }
            }
            $data = array(
                'nama_kegiatan' => $nama_kegiatan,
                'foto' => $dokumen,
                'created_at' => date('Y-m-d'),
            );

            $this->m_galeri->addsimpan($data, 'tbl_galeri');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
            redirect('galeri');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Galeri';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $where = array(
            'id_galeri' => $id,
        );
        $data['galeri'] = $this->m_galeri->edit($where, 'tbl_galeri')->result();
        $this->load->view('galeri/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function update()
    {
        $id_galeri = $this->input->post('id_galeri', true);
        $nama_kegiatan = $this->input->post('nama_kegiatan', true);
        $foto = $_FILES['foto']['name'];
        $foto = $_FILES['foto']['name'];
        if ($foto) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|tiff';
            $config['max_size'] = 2048;
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $this->db->set('foto', $foto);
            } else {
                echo "Gagal Upload";
            }
        }

        $data = array(
            'nama_kegiatan' => $nama_kegiatan,
            // 'foto' => $foto,
            'created_at' => date('Y-m-d'),
        );

        // print_r($data);die;
        $where = array(
            'id_galeri' => $id_galeri,
        );

        $this->m_galeri->editupdate($where, $data, 'tbl_galeri');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('galeri');
    }

    public function hapus($id)
    {

        $where = array('id_galeri' => $id);
        $this->db->query("delete  from tbl_galeri where id_galeri = $id");
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('galeri', 'refresh');
    }

}
