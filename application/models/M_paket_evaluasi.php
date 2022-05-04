<?php
    class M_paket_evaluasi extends CI_Model {

        public function tampil_data() {
           return $this->db->get('tbl_paket_evaluasi');
        }

        public function input_data($data){
            $this->db->insert('tbl_paket_evaluasi', $data);
        }

        public function edit_data($where, $table) {
            return $this->db->get_where($table, $where);
         }
 
         public function update_data($where, $data, $table){
             $this->db->where($where);
             $this->db->update($table, $data);
         }

        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function updateEval()
        {
            $query = $this->db->set('id_mata_kuliah', $this->input->post('id_mata_kuliah'))
                              ->set('nama_paket_evaluasi', $this->input->post('nama_paket_evaluasi'))
                              ->set('waktu_evaluasi_mulai', $this->input->post('waktu_evaluasi_mulai'))
                              ->set('waktu_evaluasi_selesai', $this->input->post('waktu_evaluasi_selesai'))
                              ->set('durasi_ujian', $this->input->post('durasi_ujian'))
                              ->set('timer_ujian', $this->input->post('durasi_ujian'))
                              ->set('status_ujian', 1)
                              ->set('status_ujian_ujian', $this->input->post('status_ujian_ujian'))
                              ->where('id_paket_evaluasi', $this->input->post('id_paket_evaluasi'))
                              ->update('tbl_paket_evaluasi');
            return $query;
        }

    }
?>