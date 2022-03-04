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

     public function update_data($where, $data, $table){
         $this->db->where($where);
         $this->db->update($table, $data);
     }

     public function submenutampil(){
         $query = "select user_submenu.*, user_menu.nama_menu 
                    from user_submenu join user_menu 
                    on user_submenu.id_menu = user_menu.id_menu";

        return $this->db->query($query)->result();

     }
}
