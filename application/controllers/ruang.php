<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');
    class Ruang extends CI_Controller 
    {

        function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('m_ruang');
            $this->load->library('session');
            if(!$this->session->userdata('username')){
                redirect('login');
            }
            is_logged_in('1');
        }

        public function index() {
            $data['title'] = 'Ruangan';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
            $this->load->view('templates_dosen/header',$data);  
            $this->load->view('templates_dosen/sidebar_admin',$data); 

            $data['ruang'] = $this->m_ruang->tampil_data()->result();

            $query = $this->db->query("select a.*,b.* 
                                        from tbl_ruang a, tbl_jenis_ruang b
                                        where a.id_jenis_ruang = b.id_jenis_ruang order by a.id_jenis_ruang")->result();

            $data['ruang'] = $query;
            
            $this->load->view('ruang/index', $data); 
            $this->load->view('templates_dosen/footer'); 
        }

        public function input(){
            $data['title'] = 'Tambah Ruangan';

            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

            $this->load->view('templates_dosen/header', $data); 
            $this->load->view('templates_dosen/sidebar_admin', $data);
        
            $query= $this->db->query("select * from tbl_jenis_ruang")->result();
            $data['jenis_ruang'] = $query;
            
            $this->load->view('ruang/tambah', $data); 
            $this->load->view('templates_dosen/footer');  
        }

        public function simpan() {

            $this->_rules();
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

            if($this->form_validation->run() == FALSE) {
            $this->input();
        }else{
            $id_ruang = $this->input->post('id_ruang');
            $nama_ruang = $this->input->post('nama_ruang' );
            $id_jenis_ruang =$this->input->post('id_jenis_ruang');
            $kapasitas =  $this->input->post('kapasitas');
            $gedung = $this->input->post('gedung');
            $lantai = $this->input->post('lantai');
            $keterangan = $this->input->post('keterangan');

            $data = array(
                'id_ruang'      =>  $id_ruang,
                'nama_ruang'    =>  $nama_ruang,
                'id_jenis_ruang'=> $id_jenis_ruang,
                'kapasitas'     => $kapasitas,
                'gedung'        => $gedung,
                'lantai'        => $lantai ,
                'keterangan'    =>  $keterangan
            );

            $this->m_ruang->input_data($data,'tbl_ruang');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

             redirect('ruang');
        }
    }

            public function _rules(){
                $this->form_validation->set_rules('nama_ruang', 'nama_ruang', 'required' , ['required' => 'Nama Ruang wajib diisi!']);
                $this->form_validation->set_rules('id_jenis_ruang', 'id_jenis_ruang', 'required' , ['required' => 'Jenis Ruang wajib diisi!']);
                $this->form_validation->set_rules('kapasitas', 'kapasitas', 'required|numeric' , ['required' => 'Kapasitas wajib diisi!',
                                                                                                    'numeric' => 'Kapasitas wajib di isi dengan angka']);
                $this->form_validation->set_rules('gedung', 'gedung', 'required' , ['required' => 'Gedung wajib diisi!']);
                $this->form_validation->set_rules('lantai', 'lantai', 'required|numeric' , ['required' => 'Lantai wajib diisi!',
                                                                                                    'numeric' => 'Lantai wajib di isi dengan angka']);
                $this->form_validation->set_rules('keterangan', 'keterangan', 'required' , ['required' => 'Keterangan wajib diisi!']);
            }


            public function edit($id){
                $data['title'] = "Edit Ruangan";

                $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

                $this->load->view('templates_dosen/header',$data); 
                $this->load->view('templates_dosen/sidebar_admin',$data);

                $data['jenisnya'] = $this->db->query("Select * from tbl_jenis_ruang")->result();
                
                $where = array( 'id_ruang' => $id );
                $data['ruangnya'] = $this->m_ruang->edit_data($where,'tbl_ruang')->result();

                $this->load->view('ruang/update',$data); 
                $this->load->view('templates_dosen/footer',$data); 
            }

            public function update_aksi(){
                $this->_rules();
                $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
    
                if($this->form_validation->run() == FALSE) {
                    $data['title'] = "Edit Ruangan";

                    $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
                    
                    $this->load->view('templates_dosen/header',$data); 
                    $this->load->view('templates_dosen/sidebar_admin',$data);

                    $id_ruang	            = $this->input->post('id_ruang');

                    $data['jenisnya'] = $this->db->query("Select * from tbl_jenis_ruang")->result();
                    $data['ruangnya'] = $this->db->query("Select * from tbl_ruang where id_ruang = $id_ruang")->result();
                    $this->load->view('ruang/update',$data); 
                    $this->load->view('templates_dosen/footer',$data); 
                }else{
                    
                    $id_ruang = $this->input->post('id_ruang');
                    $nama_ruang = $this->input->post('nama_ruang' );
                    $id_jenis_ruang =$this->input->post('id_jenis_ruang');
                    $kapasitas =  $this->input->post('kapasitas');
                    $gedung = $this->input->post('gedung');
                    $lantai = $this->input->post('lantai');
                    $keterangan = $this->input->post('keterangan');
    
                    $data = array(
                        'id_ruang'      =>  $id_ruang,
                        'nama_ruang'    =>  $nama_ruang,
                        'id_jenis_ruang'=>  $id_jenis_ruang,
                        'kapasitas'     =>  $kapasitas,
                        'gedung'        =>  $gedung,
                        'lantai'        =>  $lantai ,
                        'keterangan'    =>  $keterangan
                    );
     
                    $where = array(
                        'id_ruang'=> $id_ruang
                    );
                    $this->m_ruang->updateaksi($where,$data, 'tbl_ruang');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Data berhasil diupdate. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button></div>');
    
                    redirect('ruang'); 
                }

            }

            public function delete($id) {

                $where = array('id_ruang' => $id);
                $this->m_ruang->hapus_data($where, 'tbl_ruang'); 
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true">&times;</span> </button></div>');

                redirect('ruang');
            }
        }
?>