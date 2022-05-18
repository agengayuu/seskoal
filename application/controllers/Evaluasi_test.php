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
		$id = $this->db->query('SELECT tbl_master_eval.*, tbl_master_soal.*
								 FROM tbl_master_eval
								 join tbl_master_soal 
								 on tbl_master_eval.id_master_soal = tbl_master_soal.id_master_soal 
								 WHERE id_eval="' . $id_paket_evaluasi . '"  ')->row_array();
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
		$this->db->select('tbl_mahasiswa.id_mahasiswa');
        $this->db->from('user');
        $this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = user.username');
        $this->db->where('tbl_mahasiswa.nim', $this->session->userdata('username'));
		$getmhs = $this->db->get()->row();
		$user = $this->session->userdata('username');
		// print_r($getmhs);die;
        // return $query
		$userlogin = $this->session->userdata('username');

		$id_evaluasi = $this->input->post('id_eval');
		$id_mahasiswa = $getmhs->id_mahasiswa;
		// print_r($id_mahasiswa);die;
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
			// print_r($data);die;
			$this->db->insert_batch('tbl_jawaban', $data);
		}

		$cek = $this->db->query('SELECT id_jawaban, jawaban, tbl_master_soal.kunci_jawaban, skor, tbl_master_soal.id_mata_kuliah
								FROM tbl_jawaban 
								join tbl_master_soal 
								ON tbl_jawaban.id_master_soal = tbl_master_soal.id_master_soal 
								WHERE tbl_jawaban.id_eval="' . $id_evaluasi . '"');
		$id_mata_kuliah = 0;
		$jumlah = $cek->num_rows() == 0 ? 1:$cek->num_rows();
		$benar = 0;
		$salah = 0;

		$skor = 0;
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			$id_mata_kuliah = $d['id_mata_kuliah'];
			$data = array(
				'skor' => 0,
			);
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$benar++;
				$data['skor'] = 1;
				$this->m_evaluasi_test->UpdateNilai($where, $data, 'tbl_jawaban');
			} else {
				$salah++;
				$this->m_evaluasi_test->UpdateNilai($where, $data, 'tbl_jawaban');
			}
			
			$skor += $d['skor']; 	
		}
		$where = $id_evaluasi;
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
		// print_r($data);die;
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