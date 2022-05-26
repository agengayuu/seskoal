<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Matakuliah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_matakuliah');
        $this->load->model('m_akademik');
        $this->load->library('session');
        is_logged_in('1');
        //session_start();
    }

    public function index()
    {
        $data['title'] = 'Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['matakuliah'] = $this->m_matakuliah->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('matakuliah/index', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query = $this->db->query("select * from tbl_mata_kuliah")->result();
        $data['mata_kuliah'] = $query;
        $data['dosen'] = $this->db->query("select * from tbl_dosen")->result();
        $data['diklat'] = $this->db->query("select * from tbl_diklat")->result();
        $data['akademik'] = $this->db->query("Select * from thn_akademik where status = 'Aktif'")->result();

        $this->load->view('matakuliah/tambah', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function adminsimpan()
    {

        // ---------UNTUK NAMPILIN VIEW NYA-----------------------
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Mata Kuliah';
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('matakuliah/tambah');
        $this->load->view('templates_dosen/footer');
        //-------------------END----------------------------------

        $kode_mata_kuliah = $this->input->post('kode_mata_kuliah');
        $nama_mata_kuliah = $this->input->post('nama_mata_kuliah');
        // $sks              = $this->input->post('sks');
        $id_dosen = $this->input->post('id_dosen');
        $id_diklat = $this->input->post('id_diklat');
        $id_akademik = $this->input->post('id_akademik');

        $data = array(
            'kode_mata_kuliah' => $kode_mata_kuliah,
            'nama_mata_kuliah' => $nama_mata_kuliah,
            // 'sks' => $sks,
            'id_dosen' => $id_dosen,
            'id_diklat' => $id_diklat,
            'id_akademik' => $id_akademik,
        );
        $this->m_matakuliah->adminsimpan($data, 'tbl_mata_kuliah');
        redirect('matakuliah');

    }

    public function adminsimpanaksi()
    {

        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $this->tambah();
        } else {
            $data = array(
                'kode_mata_kuliah' => $this->input->post('kode_mata_kuliah', true),
                'nama_mata_kuliah' => $this->input->post('nama_mata_kuliah', true),
                // 'sks' => $this->input->post('sks', TRUE),
                'id_dosen' => $this->input->post('id_dosen', true),
                'id_diklat' => $this->input->post('id_diklat', true),
                'id_akademik' => $this->input->post('id_akademik', true),

            );

            $this->m_matakuliah->adminsimpan($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('matakuliah');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kode_mata_kuliah', 'kode_mata_kuliah', 'required', ['required' => 'Kode Mata Kuliah Wajib diisi!']);
        $this->form_validation->set_rules('nama_mata_kuliah', 'nama_mata_kuliah', 'required', ['required' => 'Nama Mata Kuliah Wajib diisi!']);
        // $this->form_validation->set_rules('sks', 'sks', 'required', ['required' => 'sks wajib diisi!']);
    }

    public function adminedit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Mata Kuliah';
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $data['dosen'] = $this->db->query("Select * from tbl_dosen")->result();
        $data['diklat'] = $this->db->query("Select * from tbl_diklat")->result();
        $data['akademik'] = $this->db->query("Select * from thn_akademik")->result();

        $where = array(
            'id_mata_kuliah' => $id,
        );
        $data['matakuliahnya'] = $this->m_matakuliah->adminedit($where, 'tbl_mata_kuliah')->result();

        $this->load->view('matakuliah/edit', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function admineditaksi()
    {
        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' =>
                $this->session->userdata('username')])->row_array();
            $data['title'] = 'Edit Mata Kuliah';
            $this->load->view('templates_dosen/header', $data);
            $this->load->view('templates_dosen/sidebar_admin', $data);

            $data['dosen'] = $this->db->query("Select * from tbl_dosen")->result();
            $data['diklat'] = $this->db->query("Select * from tbl_diklat")->result();
            $data['akademik'] = $this->db->query("Select * from thn_akademik")->result();

            $id_mata_kuliah = $this->input->post('id_mata_kuliah');
            $data['matakuliahnya'] = $this->db->query("Select * from tbl_mata_kuliah where id_mata_kuliah = $id_mata_kuliah")->result();
            // print_r($data['matakuliahnya']);die;
            $this->load->view('matakuliah/edit', $data);
            $this->load->view('templates_dosen/footer');

        } else {
            $id_mata_kuliah = $this->input->post('id_mata_kuliah');
            $kode_mata_kuliah = $this->input->post('kode_mata_kuliah');
            $nama_mata_kuliah = $this->input->post('nama_mata_kuliah');
            // $sks = $this->input->post('sks');
            $id_dosen = $this->input->post('id_dosen');
            $id_diklat = $this->input->post('id_diklat');
            $id_akademik = $this->input->post('id_akademik');

            $data = array(
                'id_mata_kuliah' => $id_mata_kuliah,
                'kode_mata_kuliah' => $kode_mata_kuliah,
                'nama_mata_kuliah' => $nama_mata_kuliah,
                // 'sks' => $sks,
                'id_dosen' => $id_dosen,
                'id_diklat' => $id_diklat,
                'id_akademik' => $id_akademik,
            );
            $where = array(
                'id_mata_kuliah' => $id_mata_kuliah,
            );

            $this->m_matakuliah->admineditaksi($where, $data, 'tbl_mata_kuliah');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

            redirect('matakuliah');
        }
    }

    public function adminhapus($id_mata_kuliah)
    {

        $where = array('id_mata_kuliah' => $id_mata_kuliah);
        $this->m_matakuliah->hapus_data($where, 'tbl_mata_kuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('matakuliah');

    }

    public function thn_akademik()
    {

        $data['title'] = 'Tahun Akademik';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $data['akademik'] = $this->m_akademik->getdata();

        $this->load->view('matakuliah/tahun', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function daftarmatkul($id)
    {
        $data['title'] = 'Daftar Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $thn = $this->db->query("select * from thn_akademik where id_akademik = $id")->row_array();
        $data["thn"] = $thn;

        $join = $this->db->query("Select tbl_mata_kuliah.*, thn_akademik.*, tbl_dosen.*, tbl_diklat.*
                                    from tbl_mata_kuliah
                                    join thn_akademik
                                    on thn_akademik.id_akademik = tbl_mata_kuliah.id_akademik
                                    join tbl_dosen
                                    on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen
                                    join tbl_diklat
                                    on tbl_mata_kuliah.id_diklat = tbl_diklat.id_diklat
                                    where tbl_mata_kuliah.id_akademik = $id")->result();
        $data['daftarmatkul'] = $join;

        $this->load->view('matakuliah/daftarmatkul', $data);
        $this->load->view('templates_dosen/footer');
    }

    // public function daftardiklat(){
    //     $data['title'] = 'Daftar Mata Kuliah';
    //     $data['user'] = $this->db->get_where('user', ['username'=>
    //     $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates_dosen/header', $data);
    //     $this->load->view('templates_dosen/sidebar_admin',$data);

    //     $diklat = $this->db->query("select * from tbl_diklat")->result();
    //     $data['diklat'] = $diklat;

    //     $this->load->view('matakuliah/daftardiklat',$data);
    //     $this->load->view('templates_dosen/footer');

    // }

    // public function tambahdaftar(){
    //     $data['title'] = 'Tambah Daftar Mata Kuliah';
    //     $data['user'] = $this->db->get_where('user', ['username'=>
    //     $this->session->userdata('username')])->row_array();
    //     $this->load->view('templates_dosen/header', $data);
    //     $this->load->view('templates_dosen/sidebar_admin',$data);

    //     $akademik = $this->db->query("select * from thn_akademik")->result();
    //     $matkul   = $this->db->query("select * from tbl_mata_kuliah")->result();
    //     $data['matkul'] = $matkul;
    //     $data['akademik']=$akademik;

    //     $this->load->view('matakuliah/tambahdaftar',$data);
    //     $this->load->view('templates_dosen/footer');
    // }

    // public function simpanmatkul(){

    //         $data = array(
    //             'id_akademik' => $this->input->post('id_akademik', TRUE),
    //             'id_mata_kuliah' => $this->input->post('id_mata_kuliah', TRUE),
    //         );

    //         $this->m_matakuliah->daftarsimpan($data);
    //         $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
    //                                                 Data berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
    //                                                 <span aria-hidden="true">&times;</span></button></div>');
    //         redirect('matakuliah/daftarmatkul');

    // }

    // public function daftarhapus($id){
    //     $where = array('id_daftar_matkul' => $id);
    //     $this->m_matakuliah->hapus_data($where, 'tbl_daftar_matkul');
    //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                                             Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
    //                                             <span aria-hidden="true">&times;</span> </button></div>');

    //     redirect('matakuliah','refresh');
    // }

}
