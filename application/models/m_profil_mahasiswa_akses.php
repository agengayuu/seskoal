<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class M_profil_mahasiswa_akses extends CI_Model{

    function construct(){
        parent:: __construct();
    }

    public function tampildata(){
        $data['title'] = 'Data Diri';
        return $this->db->get('tbl_profil_mahasiswa');
    }

    public function admintambah($data,$table){
        return $this->db->insert($table, $data);

        $insert_id = $this->db->insert_id();

        return  $insert_id;

    }
    public function simpanuser($data2){
        $a = $this->db->insert('user',$data2);
        return $a;
        print_r($a);die;
    }

    public function adminedit($where,$table){
        return $this->db->get_where($table,$where);
 
    }

    public function edituser($where,$table){
        return $this->db->get_where($table,$where);
 
    }

    public function editortuwali($jenis){
        extract($jenis);
        $this->db->where('id_mahasiswa', $mahasiswa);
        $this->db->update($tbl_ortu_wali, array('nik_ortu' => $nik_ortu, 'nama_ortu' => $nama_ortu, 'tempat_lahir_ortu' => $tempat_lahir_ortu,
                                            'tgl_lahir_ortu' => $tgl_lahir_ortu, 'pendidikan_ortu' => $pendidikan_ortu, 'pekerjaan_ortu'
                                             => $pekerjaan_ortu, 'penghasilan_ortu' => $penghasilan_ortu));
        return true;
    }

    public function delete1($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function delete2($where1, $table){
        $this->db->where($where1);
        $this->db->delete($table);
    }

    // public function simpanjenis($jenis){
    //     $a = $this->db->insert('tbl_ortu_wali',$jenis);
    //     return $a;
    //     print_r($a);die;
    // }

    

}

?>