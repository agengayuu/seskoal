<?php
    class Ruang extends CI_Controller {
        public function index() {

            $data['ruang'] = $this->ruang_model->tampil_data()->result();

            $this->load->view('templates_dosen/header'); 
            $this->load->view('templates_dosen/sidebar'); 
            $this->load->view('dosen/ruang', $data); 
            $this->load->view('templates_dosen/footer'); 
        }

        public function input() {
            $data = array(
                'id_ruang'          => set_value('id_ruang'),
                'nama_ruang'        => set_value('nama_ruang'),
                'id_jenis_ruang'    => set_value('id_jenis_ruang'),
                'kapasitas'         => set_value('kapasitas'),
                'gedung'            => set_value('gedung'),
                'lantai'            => set_value('lantai'),
                'keterangan'        => set_value('keterangan'),
                'created_at'        => set_value('created_at')
            );

            $this->load->view('templates_dosen/header'); 
            $this->load->view('templates_dosen/sidebar'); 
            $this->load->view('dosen/tambah_ruang', $data); 
            $this->load->view('templates_dosen/footer'); 
        }

        public function simpan() {
            $this->_rules();

                if($this->form_validation->run() == FALSE) {
                    $this->input();
                } else {
                    $data = array(
                        'id_ruang'      => $this->input->post('id_ruang', TRUE),
                        'nama_ruang'    => $this->input->post('nama_ruang', TRUE),
                        'id_jenis_ruang'=> $this->input->post('keterangan', TRUE),
                        'lantai'        => $this->input->post('lantai', TRUE),
                        'gedung'        => $this->input->post('gedung', TRUE),
                        'keterangan'    => $this->input->post('keterangan', TRUE),
                    );

                    $this->ruang_model->input_data($data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button></div>');
                    redirect('dosen/ruang');
                }
            }

            public function _rules(){
                $this->form_validation->set_rules('id_ruang', 'id_ruang', 'required', ['required' => 'Id Ruang wajib diisi!']);
                $this->form_validation->set_rules('nama_ruang', 'nama_ruang', 'required' , ['required' => 'Nama Ruang wajib diisi!']);
                $this->form_validation->set_rules('lantai', 'lantai', 'required' , ['required' => 'Lantai wajib diisi!']);
            }

            public function update($id) {
                $where = array('id_ruang' => $id);
                $data['tbl_ruang'] = $this->ruang_model->edit_data($where, 'tbl_jurusan')->result();

                $this->load->view('templates_dosen/header'); 
                $this->load->view('templates_dosen/sidebar'); 
                $this->load->view('dosen/update_ruang', $data); 
                $this->load->view('templates_dosen/footer'); 
            }

            public function update_aksi(){
                $id     = $this->input->post('id_ruang');
                $id     = $this->input->post('id_ruang');
                
            }

            public function delete($id) {
                $where = array('id_ruang' => $id);
                $this->ruang_model->hapus_data($where, 'tbl_ruang'); 
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span> </button></div>');

                redirect('dosen/ruang');
            }
        }
?>