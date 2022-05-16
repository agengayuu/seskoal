<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
class Master_soal extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_master_soal');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');
    }

    public function index(){
        $data['title'] = 'Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $data['soal'] = $this->m_master_soal->tampil_data2()->result();

        $query = $this->db->query("select a.*,b.* 
                                    from tbl_master_soal a, tbl_mata_kuliah b
                                    where a.id_mata_kuliah = b.id_mata_kuliah order by a.id_mata_kuliah")->result();

        $data['soal'] = $query;

        $this->load->view('master_soal/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }  

    public function input() {
        $data['title'] = 'Tambah Master Soal';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query= $this->m_master_soal->get();
        $data['matakuliah'] = $query;

        $this->load->view('master_soal/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpan() {
        $id_mata_kuliah =$this->input->post('id_mata_kuliah');
        $pertanyaan =  $this->input->post('pertanyaan');
        $a = $this->input->post('a');
        $b = $this->input->post('b');
        $c = $this->input->post('c');
        $d = $this->input->post('d');
        $e = $this->input->post('e');
        $kunci_jawaban = $this->input->post('kunci_jawaban');

        $data = array(
            'id_mata_kuliah'        =>  $id_mata_kuliah,
            'pertanyaan'            =>  $pertanyaan,
            'a'                     =>  $a,
            'b'                     =>  $b,
            'c'                     =>  $c,
            'd'                     =>  $d,
            'e'                     =>  $e,
            'kunci_jawaban'         =>  $kunci_jawaban
        );

        $this->m_master_soal->input_data($data,'tbl_master_soal');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Data berhasil di Tambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span> </button></div>');

         redirect('master_soal');
    }

    public function edit($id){
        $data['title'] ="Edit Soal";

        $data['user'] = $this->db->get_where('user', ['username'=>$this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header' ,$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data);

        $query= $this->m_master_soal->get();
        $data['matakuliah'] = $query;
        
        $where = array( 'id_master_soal' => $id );
        $data['ujian'] = $this->m_master_soal->edit_data($where,'tbl_master_soal')->result();

        $this->load->view('master_soal/update',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function update_aksi(){

        $id_master_soal = $this->input->post('id_master_soal');
        $id_mata_kuliah = $this->input->post('id_mata_kuliah');
        $pertanyaan     = $this->input->post('pertanyaan');
        $a              = $this->input->post('a' );
        $b              = $this->input->post('b');
        $c              = $this->input->post('c');
        $d              = $this->input->post('d');
        $e              = $this->input->post('e');
        $kunci_jawaban  = $this->input->post('kunci_jawaban');

        $data = array(
            'id_master_soal'  =>  $id_master_soal,
            'id_mata_kuliah'  =>  $id_mata_kuliah,
            'pertanyaan'      =>  $pertanyaan,
            'a'               =>  $a,
            'b'               =>  $b,
            'c'               =>  $c,
            'd'               =>  $d,
            'e'               =>  $e,
            'kunci_jawaban'   =>  $kunci_jawaban
        );

        $where = array(
            'id_master_soal'=> $id_master_soal
        );
        $this->m_master_soal->updateaksi($where,$data, 'tbl_master_soal');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span> </button></div>');

        redirect('master_soal'); 
    }

    public function delete($id) {

        $where = array('id_master_soal' => $id);
        $this->m_master_soal->hapus_data($where, 'tbl_master_soal'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('master_soal');
    }

}


?>