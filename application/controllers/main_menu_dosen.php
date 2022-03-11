<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu_dosen extends CI_Controller {

    public function index() {
        $data['title'] = 'Menu Dosen';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 


        $querya = $this->db->query("select * from tbl_diklat")->result();
		$queryc = $this->db->query("select * from tbl_mahasiswa")->result();
		$tomi = count($queryc);

		$wx = "";
		foreach ($querya as $ruk){ 
		$queryd = $this->db->query("select * from tbl_mahasiswa where id_diklat='".$ruk->id_diklat."'")->result();
		$toma = count($queryd);
		$hasil = $toma / $tomi * 100;
		$wx .= '{ name :"'.$ruk->nama_diklat.'",y:'.$hasil.' },';
		}
 
		$data['grafik'] = $wx; 

        $this->load->view('main_menu/dosen', $data); 
        $this->load->view('templates_dosen/footer'); 
    }
}
 
?>