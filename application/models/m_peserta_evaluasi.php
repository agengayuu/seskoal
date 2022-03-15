<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class M_peserta_evaluasi extends CI_Model{

    function construct(){ 
        parent:: __construct();
    }
    
    public function insert_multiple()
	{
		$durasi_ujian		= $this->input->post('durasi_ujian');
				
		$timer_ujian 		= $durasi_ujian*60;

		$entri = array();
		$count = $this->input->post('id_mahasiswa');
		foreach ($count as $i => $value) {
			$entri[] = array(
				'id_mahasiswa' 	 => $this->input->post('id_mahasiswa')[$i],
				'id_mata_kuliah' => $this->input->post('id_mata_kuliah'),
				'tanggal_ujian'  => $this->input->post('tanggal_ujian'),
				'jam_ujian' 	 => $this->input->post('jam_ujian'),
				'durasi_ujian' 	 => $durasi_ujian,
				'timer_ujian' 	 => $timer_ujian,
				'status_ujian' 	 => 1

			);
		}
		//return $entri;
		// echo "<pre>"; print_r($timer_ujian);die;
		$this->db->insert_batch('tbl_mahasiswa_evaluasi', $entri);
		return true;
	}

	public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
     }

	 public function update_data($where, $data, $table)
	 {
		 $this->db->where($where);
		 $this->db->update($table, $data);
	 }

    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

}

?>