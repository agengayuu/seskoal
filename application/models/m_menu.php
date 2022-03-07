<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_menu extends CI_Model{

    function construct(){
        parent:: __construct();
    }
 
  
    public function adminsimpan($d){
        return $this->db->insert('user_menu', $d);

    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function edit_data_aksi($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    
    public function hapus_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function submenutampil(){
        $query = "select user_submenu.*, user_menu.nama_menu 
                from user_submenu join user_menu 
                on user_submenu.id_menu = user_menu.id_menu";

    return $this->db->query($query)->result();

    }

    public function adminsubsimpan($data){
        return $this->db->insert('user_submenu',$data);

    }
}
