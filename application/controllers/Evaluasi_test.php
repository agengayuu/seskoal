<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Evaluasi_test extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_evaluasi_test');
        $this->load->model('m_nilai');
        $this->load->library('session');
        if(!$this->session->userdata('id')){
            redirect('login');
        }
       // session_start();
    }
 
	public function soal()
	{
		$id_paket_evaluasi = $this->uri->segment(3);		
		$id = $this->db->query('SELECT * FROM tbl_master_eval WHERE id_eval="' . $id_paket_evaluasi . '"  ')->row_array();
		// echo "<pre>";
		
		$soal_ujian = $this->db->query('SELECT tbl_master_soal.*, tbl_master_eval.*
										FROM tbl_master_eval
										join tbl_master_soal
										on tbl_master_soal.id_master_soal = tbl_master_eval.id_master_soal
										WHERE id_eval="'.$id['id_eval'].'" ORDER BY RAND()')->result();
		$where = array('id_mahasiswa_evaluasi' => $id_paket_evaluasi);
		// echo "<pre>";
		$data2 = array('status_ujian_ujian' => 1);
		// echo "<pre>";
		$this->m_evaluasi_test->update_data($where,$data2,'tbl_mahasiswa_evaluasi');
		// $time = $id['timer_ujian'];
		// echo $time;
		$data = array(
			"soal" => $soal_ujian,
			"total_soal" => count($soal_ujian),
			// "max_time" => $time,
			"id" => $id
		);
		// $data['soalnya'] = $data;

		// $this->load->view('evaluasi_test/footer', $data);
		// $this->load->view('evaluasi_test/header', $data);
		$this->load->view('evaluasi_test/index', $data);
		// $this->load->view('evaluasi_test/js', $data);
		// $this->load->view('evaluasi_test/topbar', $data);
	}

	public function jawab_aksi()
	{

		$userlogin = $this->session->userdata('id');
        $query1 = "SELECT
        thn_akademik.*,
        tbl_profil_mahasiswa.id_mahasiswa
    FROM
    thn_akademik
        INNER JOIN tbl_profil_mahasiswa ON thn_akademik.id_akademik = tbl_profil_mahasiswa.id_akademik
    WHERE 
        tbl_profil_mahasiswa.id_mahasiswa = $userlogin";

		// $data['matkul'] = $this->db->query("select * from tbl_mata_kuliah");
  
		$id_evaluasi = $this->input->post('id_eval');
		$id_mahasiswa = $this->session->userdata('id');
		$jumlah 	= $_POST['jumlah_soal'];
		$id_master_soal 	= $_POST['soal'];
		$jawaban 	= $_POST['jawaban'];
		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_master_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_eval' => $id_evaluasi,
				'id_master_soal' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
			$data2[] = array(
				'id_eval' => $id_evaluasi
			);
			$this->db->insert_batch('tbl_jawaban', $data);
			
			
			// $this->db->insert_batch('tbl_mahasiswa_evaluasi', $data);
		}
		$cek = $this->db->query('SELECT id_jawaban, jawaban, tbl_master_soal.kunci_jawaban, tbl_master_soal.id_mata_kuliah
								FROM tbl_jawaban 
								join tbl_master_soal 
								ON tbl_jawaban.id_eval = tbl_master_soal.id_master_soal 
								WHERE tbl_jawaban.id_master_soal="' . $id_evaluasi . '"');
		$id_mata_kuliah = 0;
		$jumlah = $cek->num_rows();
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			$id_mata_kuliah = $d['id_mata_kuliah'];
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
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, tbl_master_soal.kunci_jawaban 
								FROM tbl_jawaban 
								join tbl_master_soal 
								ON tbl_jawaban.id_eval=tbl_master_soal.id_master_soal 
								WHERE tbl_jawaban.id_master_soal="' . $id_evaluasi . '"');
		$jumlah = $cek2->num_rows();
		echo "<pre>";
		$where = $id_evaluasi;
		$skor = 0;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}

			$skor += $c['skor'];
		}
		$total_nilai = 0;
		$total_nilai = $skor / $jumlah * 100;
		$list_nilai = $this->db->query('SELECT * FROM tbl_nilai ');
		$mutu  = "x";
		$found = false;
		foreach($list_nilai->result_array() as $nilai){
			for($i=$nilai['batas_awal']; $i<=$nilai['batas_akhir']; $i++){
				if(ceil($total_nilai) == $i){
					$mutu = $nilai['mutu'];
					$found = true;
					break;
				}
			}

			if($found){
				break;
			}
		}
		$tbl_mhs = $this->db->query("select *
			from tbl_mahasiswa_evaluasi
			where id_eval = $id_evaluasi
			and id_mata_kuliah = $id_mata_kuliah
			and id_mahasiswa = $id_mahasiswa")->result();
		$data = array(
			'id_eval' => $id_evaluasi,
			'id_mata_kuliah' => $id_mata_kuliah,
			'id_mahasiswa' => $id_mahasiswa,
			'benar' => $benar,
			'salah' => $salah,
			'status_ujian' => 2,
			'status_ujian_ujian' => 2,
			'nilai' => $total_nilai,
			'mutu' => $mutu
		);
		// print_r($tbl_mhs);die;
		if ($tbl_mhs){
			echo "update";
			$this->m_evaluasi_test->UpdateNilai2($where, $data, 'tbl_mahasiswa_evaluasi');
		}else{
			echo "insert";
			$this->m_evaluasi_test->insertNilai2($data, 'tbl_mahasiswa_evaluasi');
		}
		redirect(base_url('jadwal_mahasiswa_evaluasi'));
	}
}