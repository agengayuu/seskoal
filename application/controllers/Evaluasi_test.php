<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Evaluasi_test extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_evaluasi_test');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
       // session_start();
    }
 
	public function soal()
	{
		$id_evaluasi = $this->uri->segment(3);		
		$id = $this->db->query('SELECT * FROM tbl_mahasiswa_evaluasi WHERE id_evaluasi="' . $id_evaluasi . '"  ')->row_array();
		$soal_ujian = $this->db->query('SELECT * FROM tbl_soal_evaluasi WHERE id_mata_kuliah="'.$id['id_mata_kuliah'].'" ORDER BY RAND()');
		$where = array('id_evaluasi' => $id_evaluasi);
		$data2 = array('status_ujian_ujian' => 1);
		$this->m_evaluasi_test->update_data($where,$data2,'tbl_mahasiswa_evaluasi');
		$time = $id['timer_ujian'];
		$data = array(
			"soal" => $soal_ujian->result(),
			"total_soal" => $soal_ujian->num_rows(),
			"max_time" => $time,
			"id" => $id
		);
		$this->load->view('evaluasi_test/index', $data);
	}
    


}