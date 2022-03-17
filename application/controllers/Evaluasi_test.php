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
        if(!$this->session->userdata('id')){
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

	public function jawab_aksi()
	{
		$id_evaluasi = $this->input->post('id_evaluasi');
		$jumlah 	= $_POST['jumlah_soal'];
		$id_soal 	= $_POST['soal'];
		$jawaban 	= $_POST['jawaban'];
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_evaluasi' => $id_evaluasi,
				'id_soal_evaluasi' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
		}
		$this->db->insert_batch('tbl_jawaban', $data);
		$cek = $this->db->query('SELECT id_jawaban, jawaban, tbl_soal_evaluasi.kunci_jawaban FROM tbl_jawaban join tbl_soal_evaluasi ON tbl_jawaban.id_soal_evaluasi=tbl_soal_evaluasi.id_soal_evaluasi WHERE id_evaluasi="' . $id_evaluasi . '"');
		$jumlah = $cek->num_rows();
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$data = array(
					'skor' => 1,
				);
				$this->m_evaluasi_test->UpdateNilai($where, $data, 'tbl_jawaban');
			} else {
				$data = array(
					'skor' => 0,
				);
				$this->m_evaluasi_test->UpdateNilai($where, $data, 'tbl_jawaban');
			}
		}

		$benar = 0;
		$salah = 0;
		$total_nilai = 0;
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, tbl_soal_evaluasi.kunci_jawaban FROM tbl_jawaban join tbl_soal_evaluasi ON tbl_jawaban.id_soal_evaluasi=tbl_soal_evaluasi.id_soal_evaluasi WHERE id_evaluasi="' . $id_evaluasi . '"');
		$jumlah = $cek2->num_rows();
		$where = $id_evaluasi;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}
			$total_nilai += $c['skor'] / $jumlah * 100;
		}
		$data = array(
			'benar' => $benar,
			'salah' => $salah,
			'status_ujian' => 2,
			'status_ujian_ujian' => 2,
			'nilai' => $total_nilai
		);
		$this->m_evaluasi_test->UpdateNilai2($where, $data, 'tbl_mahasiswa_evaluasi');
		redirect(base_url('jadwal_mahasiswa_evaluasi'));
	}
}