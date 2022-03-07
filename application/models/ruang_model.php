<?php
    class Ruang_model extends CI_Model {

        function construct(){
            parent:: __construct();
        }

        public function tampil_data() {
           return $this->db->get('tbl_ruang');
        }

        public function input_data($data, $table){
           return $this->db->insert($table, $data); 
        }

        public function hapus_data($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
    }
?> 