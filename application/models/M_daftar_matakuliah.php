<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class M_daftar_matakuliah extends CI_Model
{

    public function construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $userlogin = $this->session->userdata('id');
        // print_r($userlogin);die;
        $query = "select
            tbl_mata_kuliah.*,
            tbl_dosen.id_dosen
        from
            tbl_mata_kuliah
            left join tbl_dosen on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen
        where
            tbl_dosen.id_user = " . $userlogin . "";

// print_r($userlogin);die;
        return $this->db->query($query)->result_array();
    }

    public function insert_multiple()
    {
        $durasi_ujian = $this->input->post('durasi_ujian');

        $timer_ujian = $durasi_ujian * 60;

        // $entri = array();
        // $count = $this->input->post('id_master_soal');
        // foreach ($count as $i => $value) {
        //     $entri[] = array(
        //         'id_master_soal'      => $this->input->post('id_master_soal')[$i],
        // 'id_mata_kuliah' => [$id],
        $entri = [
            'id_mata_kuliah' => $this->input->post('id_mata_kuliah'),
            'nama_paket_evaluasi' => $this->input->post('nama_paket_evaluasi'),
            'waktu_evaluasi_mulai' => $this->input->post('waktu_evaluasi_mulai'),
            'waktu_evaluasi_selesai' => $this->input->post('waktu_evaluasi_selesai'),
            'durasi_ujian' => $durasi_ujian,
            'timer_ujian' => $timer_ujian,
            'status_ujian' => 1,

            //     );
            // }

        ];
        // var_dump($entri);
        // die;

        //return $entri;
        // echo "<pre>"; print_r($timer_ujian);die;
        // $this->db->insert_batch('tbl_paket_evaluasi', $entri);
        $this->db->insert('tbl_paket_evaluasi', $entri);
        return true;
    }

    // public function getMataKuliah()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_paket_evaluasi');
    //     $this->db->join('tbl_mata_kuliah', 'tbl_paket_evaluasi.id_paket_evaluasi = tbl_mata_kuliah.id_mata_kuliah');
    //     $query = $this->db->get();
    // }

    // public function insert_multiple($data)
    // {
    //     $this->db->insert('tbl_paket_evaluasi', $data);
    // }

    // public function getMataKuliah()
    // {
    //     $query = $this->db->get('tbl_mata_kuliah')->result_array();
    //     return $query;
    // }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // public function hapus_data($where, $table){
    //     $this->db->where($where);
    //     $this->db->delete($table);
    // }

    public function hapus_data($where1, $table1, $where2, $table2)
    {
        $this->db->where($where1);
        $this->db->delete($table1);
        $this->db->where($where2);
        $this->db->delete($table2);
    }

}
