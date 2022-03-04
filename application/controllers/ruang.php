<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');


    class Ruang extends CI_Controller {
        public function index() {
            $data['title'] = 'Ruangan';


            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
            $this->load->view('templates_dosen/header',$data);  
            $this->load->view('templates_dosen/sidebar',$data); 

            $data['ruang'] = $this->ruang_model->tampil_data()->result();
            $this->load->view('ruang/ruang', $data); 
            $this->load->view('templates_dosen/footer'); 
        }

        // public function input() {

        //     $timestamp = date('Y-m-d H:i:s');

        //     $data = array(
        //         'id_ruang'          => set_value('id_ruang'),
        //         'nama_ruang'        => set_value('nama_ruang'),
        //         'id_jenis_ruang'    => set_value('id_jenis_ruang'),
        //         'kapasitas'         => set_value('kapasitas'),
        //         'gedung'            => set_value('gedung'),
        //         'lantai'            => set_value('lantai'),
        //         'keterangan'        => set_value('keterangan'),
        //         'created_at'        => set_value($timestamp)
        //     );
 
        //     $this->load->view('ruang/tambah_ruang', $data); 
        // }

        public function input(){
            $data['title'] = 'Tambah Ruangan';

            $data['user'] = $this->db->get_where('user', ['username'=> 
            $this->session->userdata('username')])->row_array();
            $this->load->view('templates_dosen/header', $data); 
            $this->load->view('templates_dosen/sidebar', $data);
        
            $query= $this->db->query("select * from tbl_jenis_ruang")->result();
            $data['jenis_ruang'] = $query;
            
            $this->load->view('ruang/tambah_ruang', $data); 
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
                        'id_jenis_ruang'=> $this->input->post('id_jenis_ruang', TRUE),
                        'lantai'        => $this->input->post('lantai', TRUE),
                        'gedung'        => $this->input->post('gedung', TRUE),
                        'keterangan'    => $this->input->post('keterangan', TRUE),
                    );

                    $this->ruang_model->input_data($data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button></div>');
                    redirect('ruang');
                }
            }

            public function _rules(){
                $this->form_validation->set_rules('id_ruang', 'id_ruang', 'required', ['required' => 'Id Ruang wajib diisi!']);
                $this->form_validation->set_rules('nama_ruang', 'nama_ruang', 'required' , ['required' => 'Nama Ruang wajib diisi!']);
                $this->form_validation->set_rules('id_jenis_ruang', 'id_jenis_ruang', 'required' , ['required' => 'Jenis Ruang wajib diisi!']);
                $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required' , ['required' => 'Kapasitas wajib diisi!']);
                $this->form_validation->set_rules('lantai', 'lantai', 'required' , ['required' => 'Lantai wajib diisi!']);
                $this->form_validation->set_rules('gedung', 'gedung', 'required' , ['required' => 'Gedung wajib diisi!']);
                $this->form_validation->set_rules('keterangan', 'keterangan', 'required' , ['required' => 'Keterangan wajib diisi!']);
            }

            public function update($id) {
                
                $where = array('id_ruang' => $id);
                $data['tbl_ruang'] = $this->ruang_model->edit_data($where, 'tbl_jurusan')->result();

                $this->load->view('templates_dosen/header'); 
                $this->load->view('templates_dosen/sidebar'); 
                $this->load->view('ruang/update_ruang', $data); 
                $this->load->view('templates_dosen/footer'); 
            }

            public function update_aksi(){
                $id     = $this->input->post('id_ruang');
                $nama_ruang     = $this->input->post('nama_ruang');
                
            }

            public function delete($id) {

                $where = array('id_ruang' => $id);
                $this->ruang_model->hapus_data($where, 'tbl_ruang'); 
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true">&times;</span> </button></div>');

                redirect('ruang');
            }
        }
?>