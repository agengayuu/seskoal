<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_hasil_evaluasi_mahasiswa extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function get_id_matakuliah($id){
        $query = "select id_mata_kuliah from tbl_mahasiswa_evaluasi where id_mahasiswa = ". $id;
        return $this->db->query($query)->result_array();
    }

    public function get_mahasiswa($id_mata_kuliah)
	{
        $array_id_matakuliah = array_column($id_mata_kuliah, 'id_mata_kuliah');
        $explode_id_mata_kuliah = implode(', ', $array_id_matakuliah);
		// $this->db->select('*');
		// $this->db->from('tbl_mahasiswa_evaluasi');
		// $this->db->join('tbl_mata_kuliah', 'tbl_mahasiswa_evaluasi.id_mata_kuliah=tbl_mata_kuliah.id_mata_kuliah');
		// $this->db->join('tbl_mahasiswa', 'tbl_mahasiswa_evaluasi.id_mahasiswa=tbl_mahasiswa.id_mahasiswa');
		// $this->db->where('tbl_mahasiswa.id_mahasiswa', $id_mahasiswa);
        $query = "select 
                    tbl_profil_mahasiswa.*, 
                    user.*, 
                    tbl_mahasiswa_evaluasi.*,
                    tbl_mata_kuliah.nama_mata_kuliah
                from 
                    tbl_profil_mahasiswa 
                join user on tbl_profil_mahasiswa.id_mahasiswa = user.id
                join tbl_mahasiswa_evaluasi on tbl_profil_mahasiswa.id_mahasiswa = tbl_mahasiswa_evaluasi.id_mahasiswa 
                join tbl_mata_kuliah on tbl_mata_kuliah.id_mata_kuliah = tbl_mahasiswa_evaluasi.id_mata_kuliah 
                where 
                tbl_mahasiswa_evaluasi.id_mata_kuliah in (".$explode_id_mata_kuliah.")";

		return $this->db->query($query)->result();
	}
}

?>