<?php
    class Jenis_ruang_model extends CI_Model {

        public function tampil_data() {
           return $this->db->get('tbl_jenis_ruang');
        }
    }
?>