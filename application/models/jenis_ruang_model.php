<?php
    class Jenis_ruang_model extends CI_Model {

        public function tampil_data() {
           return $this->db->get('tbl_jenis_ruang');
        }

        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
    }
?>