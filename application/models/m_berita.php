<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

    public function construct(){
        parent:: __construct();
    }

    public function tampildata()
    {
        $data['title'] = 'Berita';
        return $this->db->get('tbl_berita');
    }

    public function edit($where,$table){
        return $this->db->get_where($table,$where);

    }

    public function editupdate($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function addsimpan($data,$table){
        return $this->db->insert($table, $data);
    }
    
    public function delete($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}