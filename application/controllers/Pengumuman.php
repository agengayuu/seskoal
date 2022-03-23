<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_pengumuman');
        $this->load->library('session');
        $this->load->helper('download');
        //session_start();
        is_logged_in('1');
    }

    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['pengumuman'] = $this->m_pengumuman->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('pengumuman/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Pengumuman';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $data['pengumuman'] = $query;

        $this->load->view('pengumuman/add', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function addsimpan()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $judul_pengumuman = $this->input->post('judul_pengumuman', TRUE);
            $isi_pengumuman   = $this->input->post('isi_pengumuman', TRUE);
            $status   = $this->input->post('status', TRUE);
            $dokumen             = $_FILES['dokumen'];
            if ($dokumen = '') {
            } else {
                $config['upload_path']      = './assets/file/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff|pdf';
                $config['max_size']         = 5000;
                $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);

                if (@$_FILES['dokumen']['name'] != null) {
                    if (!$this->upload->do_upload('dokumen')) {
                        echo 'Gagal Upload';
                        die();
                    } else {
                        $dokumen = $this->upload->data('file_name');
                    }
                }
            }
            $data = array(
                'judul_pengumuman' => $judul_pengumuman,
                'isi_pengumuman' => $isi_pengumuman,
                'dokumen' => $dokumen,
                'tgl_pembuatan' => date('Y-m-d'),
                'status' => $status
            );
            // print_r ($data);die;

            $this->m_pengumuman->addsimpan($data, 'tbl_pengumuman');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
            redirect('pengumuman');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required', ['required' => 'Judul Pengumuman wajib diisi!']);
        $this->form_validation->set_rules('isi_pengumuman', 'isi_pengumuman', 'required', ['required' => 'Isi Pengumuman wajib diisi!']);
    }

    public function edit($id_pengumuman)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Pengumuman';
        $this->load->view('templates_dosen/header');
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $where = array(
            'id_pengumuman' => $id_pengumuman
        );
        $data['pengumumannya'] = $this->m_pengumuman->edit($where, 'tbl_pengumuman')->result();
        $this->load->view('pengumuman/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function editupdate()
    {
        $id_pengumuman = $this->input->post('id_pengumuman');
        $judul_pengumuman = $this->input->post('judul_pengumuman');
        $isi_pengumuman = $this->input->post('isi_pengumuman');
        $status = $this->input->post('status');
        $dokumen             = $_FILES['dokumen'];
            if ($dokumen = '') {
            } else {
                $config['upload_path']      = './assets/file/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff|pdf';
                $config['max_size']         = 5000;
                $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

                $this->load->library('upload', $config);

                if (@$_FILES['dokumen']['name'] != null) {
                    if (!$this->upload->do_upload('dokumen')) {
                        echo 'Gagal Upload';
                        die();
                    } else {
                        $dokumen = $this->upload->data('file_name');
                    }
                }
            }

         $data = array(
                'judul_pengumuman' => $judul_pengumuman,
                'isi_pengumuman' => $isi_pengumuman,
                'dokumen' => $dokumen,
                'tgl_pembuatan' => date('Y-m-d'),
                'status' => $status
            );

        $where = array(
            'id_pengumuman' => $id_pengumuman
        );

        $this->m_pengumuman->editupdate($where, $data, 'tbl_pengumuman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('pengumuman');
    }

    public function delete($id_pengumuman)
    {

        $where = array('id_pengumuman' => $id_pengumuman);
        $this->m_pengumuman->delete($where, 'tbl_pengumuman');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('pengumuman');
    }

    function download($id)
	{
		$data = $this->db->get_where('tbl_pengumuman',['dokumen'=>$id])->row();
		// $test = force_download($data->dokumen,$data);
        force_download(FCPATH.'/assets/file/'.$data->dokumen, null);
        // print_r($test);die;
	}
}
