<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_evaluasi_test extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    //fungsi untuk mengupdate data di database
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function UpdateNilai($id_jawaban, $data)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('tbl_jawaban', $data);
	}

    public function UpdateNilai2($id_peserta, $data)
	{
		$this->db->where('id_evaluasi', $id_peserta);
		$this->db->update('tbl_mahasiswa_evaluasi', $data);
	}
}

?>