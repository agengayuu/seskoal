<?php

class Jenis_ruang extends CI_Controller{
    public function index(){
        $data['title'] = 'Jenis Ruangan';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $data['jenis_ruang'] = $this->m_jenis_ruang->tampil_data()->result();
        $this->load->view('jenis_ruang/index', $data); 
        $this->load->view('templates_dosen/footer'); 

    }

    public function input() {
        $data['title'] = 'Tambah Jenis Ruangan';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $timestamp = date('Y-m-d H:i:s'); 

        $data = array(
            'id_jenis_ruang'           => set_value('id_jenis_ruang'),
            'nama_jenis_ruang'         => set_value('nama_jenis_ruang'),
            'created_at'               => set_value($timestamp)
        );

        $this->load->view('jenis_ruang/tambah', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function simpan() {

        $this->_rules();

        if($this->form_validation->run()== FALSE) {
            $this->input();
        } else {
            $data = array(
                'nama_jenis_ruang' => $this->input->post('nama_jenis_ruang', TRUE)
            );

            print_r($data);

            $this->m_jenis_ruang->input_data($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    Data Berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span></button></div>');
            redirect('jenis_ruang');
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('nama_jenis_ruang', 'nama_jenis_ruang', 'required', ['required' => 'Nama Ruangan Wajib diisi!']);
    }

    public function update($id) {
        $data['title'] = 'Update Jenis Ruangan';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $where = array('id_jenis_ruang' => $id);
        $data['jenis_ruang'] = $this->m_jenis_ruang->edit_data($where, 'tbl_jenis_ruang')->result();

        $this->load->view('jenis_ruang/update', $data); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function update_aksi(){

        $id = $this->input->post('id_jenis_ruang');
        $nama_jenis_ruang = $this->input->post('nama_jenis_ruang');

        $data = array(
            'nama_jenis_ruang' => $nama_jenis_ruang
        );

        $where = array(
            'id_jenis_ruang' => $id
        );

        $this->m_jenis_ruang->update_data($where, $data, 'tbl_jenis_ruang');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('jenis_ruang');

    }

    public function delete($id) {

        $where = array('id_jenis_ruang' => $id);
        $this->m_jenis_ruang->hapus_data($where, 'tbl_jenis_ruang'); 
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('jenis_ruang');
    }
}


?>