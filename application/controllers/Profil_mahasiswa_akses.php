<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Profil_mahasiswa_akses extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa_akses');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('2');


        // if(!$this->session->userdata('username')){
        //     redirect('login');
        // }
        // session_start();
    }

    public function index()
    {
        $data['title'] = 'Data Diri';

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');
        // echo $userlogin;
        // die();

        $mahasiswa = $this->db->query(
            "SELECT 
                            tbl_profil_mahasiswa.*, 
                            tbl_ortu_wali.id_ortu_wali,
                            tbl_ortu_wali.nik_ortu,
                            tbl_ortu_wali.nama_ortu,
                            tbl_ortu_wali.tempat_lahir_ortu,
                            tbl_ortu_wali.tgl_lahir_ortu,
                            tbl_ortu_wali.pendidikan_ortu,
                            tbl_ortu_wali.pekerjaan_ortu,
                            tbl_ortu_wali.penghasilan_ortu,
                            tbl_ortu_wali.jenis_data_ortu
                        FROM 
                            user 
                        LEFT JOIN tbl_profil_mahasiswa ON tbl_profil_mahasiswa.id_mahasiswa = user.id
                        LEFT JOIN tbl_ortu_wali ON tbl_ortu_wali.id_mahasiswa = user.id
                        WHERE 
                            user.id = $userlogin"
        )->row();


        // echo "<pre>";
        // print_r($mahasiswa);
        // die();
        //                         $ortu = $this->db->query("select * from tbl_ortu_wali where nim = '".$userlogin."'")->row_array();
        //                         echo "<pre>";
        //                         print_r($ortu);die;
        // echo "<pre>";
        //                         print_r($mahasiswa);die;


        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $data['datadiri'] = $mahasiswa;

        //   echo "<pre>";print_r($data['datadiri']);die;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ayah'] = $query4;
        // print_r($query4);die;

        // print_r($query5);die;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ibu'] = $query5;
        // echo "<pre>";print_r($data);die;

        $this->load->view('profil_mahasiswa_akses/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function edit()
    {
        $data['title'] = 'Data Diri';

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');
        // echo $userlogin;
        // die();

        $mahasiswa = $this->db->query(
            "SELECT 
                            tbl_profil_mahasiswa.*, 
                            tbl_ortu_wali.id_ortu_wali,
                            tbl_ortu_wali.nik_ortu,
                            tbl_ortu_wali.nama_ortu,
                            tbl_ortu_wali.tempat_lahir_ortu,
                            tbl_ortu_wali.tgl_lahir_ortu,
                            tbl_ortu_wali.pendidikan_ortu,
                            tbl_ortu_wali.pekerjaan_ortu,
                            tbl_ortu_wali.penghasilan_ortu,
                            tbl_ortu_wali.jenis_data_ortu
                        FROM 
                            user 
                        LEFT JOIN tbl_profil_mahasiswa ON tbl_profil_mahasiswa.id_mahasiswa = user.id
                        LEFT JOIN tbl_ortu_wali ON tbl_ortu_wali.id_mahasiswa = user.id
                        WHERE 
                            user.id = $userlogin"
        )->row();


        // echo "<pre>";
        // print_r($mahasiswa);
        // die();
        //                         $ortu = $this->db->query("select * from tbl_ortu_wali where nim = '".$userlogin."'")->row_array();
        //                         echo "<pre>";
        //                         print_r($ortu);die;
        // echo "<pre>";
        //                         print_r($mahasiswa);die;


        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $data['datadiri'] = $mahasiswa;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ayah'] = $query4;
        // print_r($query4);die;

        // print_r($query5);die;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ibu'] = $query5;
        // echo "<pre>";print_r($data);die;

        $this->load->view('profil_mahasiswa_akses/detail', $data);
        $this->load->view('templates_dosen/footer');
    }



    public function update()
    {
        $nama   = $this->input->post('nama', NULL);
        $tempat_lahir   = $this->input->post('tempat_lahir', NULL);
        $jenis_kelamin   = $this->input->post('jenis_kelamin', NULL);
        $foto           = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path']      = './assets/uploads/';
            $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff';
            $config['max_size']         = 2048;
            $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if (@$_FILES['foto']['name'] != null) {
                if (!$this->upload->do_upload('foto')) {
                    echo 'Gagal Upload';
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
        }

        $agama      = $this->input->post('agama', NULL);
        $id_akademik    = $this->input->post('id_akademik', NULL);
        $kewarganegaraan = $this->input->post('kewarganegaraan', NULL);
        $nik = $this->input->post('nik', NULL);
        $npwp = $this->input->post('npwp', NULL);
        $jalan = $this->input->post('jalan', NULL);
        $dusun = $this->input->post('dusun', NULL);
        $rt = $this->input->post('rt', NULL);
        $rw = $this->input->post('rw', NULL);
        $kelurahan = $this->input->post('kelurahan', NULL);
        $kecamatan = $this->input->post('kecamatan', NULL);
        $kode_pos = $this->input->post('kode_pos', NULL);
        $foto_hidden = $this->input->post('foto_hidden', NULL);
        $id_mahasiswa   = $this->input->post('id_mahasiswa');

        $data = array(
            'nama' => $nama,
            'tempat_lahir' => $tempat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'foto' => ($foto == '') ? $foto_hidden :  $foto,
            'agama' => $agama,
            'id_akademik' => $id_akademik,
            'kewarganegaraan' => $kewarganegaraan,
            'nik' => $nik,
            'npwp' => $npwp,
            'jalan' => $jalan,
            'dusun' => $dusun,
            'rt' => $rt,
            'rw' => $rw,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
            'kode_pos' => $kode_pos,
            'id_mahasiswa' => $id_mahasiswa
        );
        //  echo "<pre>";print_r($data);die;
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('tbl_profil_mahasiswa', $data);

        $jenis = ['AYAH', 'IBU'];

        $cek_table_ortu_wali = $this->db->query("select id_mahasiswa from tbl_ortu_wali where id_mahasiswa = $id_mahasiswa")->row();
        if($cek_table_ortu_wali == ''){
            foreach ($jenis as $key => $val) {
                $this->db->insert("tbl_ortu_wali", [
                    'id_mahasiswa' => $id_mahasiswa,
                    'nik_ortu' => ($_POST['nik_ortu'][$key]) ? $_POST['nik_ortu'][$key] : NULL,
                    'nama_ortu' => ($_POST['nama_ortu'][$key]) ? $_POST['nama_ortu'][$key] : NULL,
                    'tempat_lahir_ortu' => ($_POST['tempat_lahir_ortu'][$key]) ? $_POST['tempat_lahir_ortu'][$key] : NULL,
                    'tgl_lahir_ortu' => ($_POST['tgl_lahir_ortu'][$key]) ? $_POST['tgl_lahir_ortu'][$key] : NULL,
                    'pendidikan_ortu' => ($_POST['pendidikan_ortu'][$key]) ? $_POST['pendidikan_ortu'][$key] : NULL,
                    'pekerjaan_ortu' => ($_POST['pekerjaan_ortu'][$key]) ? $_POST['pekerjaan_ortu'][$key] : NULL,
                    'penghasilan_ortu' => ($_POST['penghasilan_ortu'][$key]) ? $_POST['penghasilan_ortu'][$key] : NULL,
                    'jenis_data_ortu' => $val,
                ]);
            }
        } else {
            foreach ($jenis as $key => $val) {
                $this->db->where('id_mahasiswa', $id_mahasiswa);
                $this->db->where('jenis_data_ortu', $val);
                $this->db->update("tbl_ortu_wali", [
                    'id_mahasiswa' => $id_mahasiswa,
                    'nik_ortu' => ($_POST['nik_ortu'][$key]) ? $_POST['nik_ortu'][$key] : NULL,
                    'nama_ortu' => ($_POST['nama_ortu'][$key]) ? $_POST['nama_ortu'][$key] : NULL,
                    'tempat_lahir_ortu' => ($_POST['tempat_lahir_ortu'][$key]) ? $_POST['tempat_lahir_ortu'][$key] : NULL,
                    'tgl_lahir_ortu' => ($_POST['tgl_lahir_ortu'][$key]) ? $_POST['tgl_lahir_ortu'][$key] : NULL,
                    'pendidikan_ortu' => ($_POST['pendidikan_ortu'][$key]) ? $_POST['pendidikan_ortu'][$key] : NULL,
                    'pekerjaan_ortu' => ($_POST['pekerjaan_ortu'][$key]) ? $_POST['pekerjaan_ortu'][$key] : NULL,
                    'penghasilan_ortu' => ($_POST['penghasilan_ortu'][$key]) ? $_POST['penghasilan_ortu'][$key] : NULL,
                    'jenis_data_ortu' => $val,
                ]);
            }
        }
        

        

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
        redirect('profil_mahasiswa_akses');
    }
}
