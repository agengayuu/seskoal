<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profil_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('1');
        //session_start();
    }

    public function index()
    {
        $data['title'] = 'Profil Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['profil_mahasiswa'] = $this->m_profil_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('profil_mahasiswa/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Profil Mahasiswa';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query1 = $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from tbl_ortu_wali")->result();
        $data['ortuwali'] = $query2;

        $query3 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query3;

        $this->load->view('profil_mahasiswa/tambah', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function admintambah()
    {
        // $this->_rules();
        //     if($this->form_validation->run() == FALSE) {
        //         $this->tambah();
        //     } else {
        $nama = $this->input->post('nama', true);
        $nim = $this->input->post('nim', true);
        $tempat_lahir = $this->input->post('tempat_lahir', true);
        $tgl_lahir = $this->input->post('tgl_lahir');
        $hsl = date('jmY', strtotime($tgl_lahir));
        $jenis_kelamin = $this->input->post('jenis_kelamin', true);
        $foto = $_FILES['foto'];
        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|tiff';
            $config['max_size'] = 2048;
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if (@$_FILES['foto']['name'] != null) {
                if (!$this->upload->do_upload('foto')) {
                    echo 'Gagal Upload ukuran harus kurang dari 2 MB';
                    die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
        }
        $created_at = $this->input->post('created_at');

        $created_at = date('Y-m-d H:i:s');
        $agama = $this->input->post('agama');
        $id_diklat = $this->input->post('id_diklat');
        $angkatan = $this->input->post('angkatan');
        $id_akademik = $this->input->post('id_akademik');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $nik = $this->input->post('nik');
        $npwp = $this->input->post('npwp');
        $jalan = $this->input->post('jalan');
        $dusun = $this->input->post('dusun');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $kode_pos = $this->input->post('kode_pos');
        $email = $this->input->post('email');
        $jabatan = $this->input->post('jabatan');
        $no_tlp = $this->input->post('no_tlp');

        // $id_mahasiswa   = $this->input->post('id_mahasiswa');
        $data2 = array(
            'username' => $nim,
            'id_grup_user' => 2,
            'is_active' => 1,
            'id_unique' => $nim . $hsl,
            'date_created' => time(),
        );
        $idmahasiswa = $this->m_profil_mahasiswa->simpanuser($data2, 'user');

        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'foto' => $foto,
            'agama' => $agama,
            'id_diklat' => $id_diklat,
            'angkatan' => $angkatan,
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
            'email' => $email,
            'jabatan' => $jabatan,
            'no_tlp' => $no_tlp,
            'created_at' => $created_at,
            'id_mahasiswa' => $idmahasiswa,
        );
        $this->db->insert("tbl_profil_mahasiswa", $data);

        $jenis = ['AYAH', 'IBU'];
        foreach ($jenis as $key => $val) {
            $this->db->insert("tbl_ortu_wali", [
                'id_mahasiswa' => $idmahasiswa,
                'nik_ortu' => ($_POST['nik_ortu'][$key]) ? $_POST['nik_ortu'][$key] : null,
                'nama_ortu' => ($_POST['nama_ortu'][$key]) ? $_POST['nama_ortu'][$key] : null,
                'tempat_lahir_ortu' => ($_POST['tempat_lahir_ortu'][$key]) ? $_POST['tempat_lahir_ortu'][$key] : null,
                'tgl_lahir_ortu' => ($_POST['tgl_lahir_ortu'][$key]) ? $_POST['tgl_lahir_ortu'][$key] : null,
                'pendidikan_ortu' => ($_POST['pendidikan_ortu'][$key]) ? $_POST['pendidikan_ortu'][$key] : null,
                'pekerjaan_ortu' => ($_POST['pekerjaan_ortu'][$key]) ? $_POST['pekerjaan_ortu'][$key] : null,
                'penghasilan_ortu' => ($_POST['penghasilan_ortu'][$key]) ? $_POST['penghasilan_ortu'][$key] : null,
                'jenis_data_ortu' => $val,
            ]);
        }
        //$this->m_profil_mahasiswa->simpanjenis($jenis, 'tbl_ortu_wali');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil dimasukkan. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
        redirect('profil_mahasiswa');
        // }

    }

    public function detail($id_mahasiswa)
    {
        $data['title'] = "Detail Mahasiswa";

        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

        // $userlogin = $this->session->userdata('username');
        // $mahasiswa = $this->db->query("SELECT tbl_profil_mahasiswa.*, user.*
        //                 FROM tbl_profil_mahasiswa
        //                 JOIN user ON tbl_profil_mahasiswa.nim = user.username
        //                 WHERE tbl_profil_mahasiswa.nim = $userlogin ")->result();

        // $data['user'] = $mahasiswa;

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $query3 = $this->db->query("select * from tbl_profil_mahasiswa where id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['datadiri'] = $query3;

        // echo $query4;die;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['ayah'] = $query4;

        // print_r($query5);die;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['ibu'] = $query5;

        $this->load->view('profil_mahasiswa/detail', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function edit($id_mahasiswa)
    {
        $data['title'] = "Edit Mahasiswa";

        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

        // $userlogin = $this->session->userdata('username');
        // $mahasiswa = $this->db->query("SELECT tbl_profil_mahasiswa.*, user.*
        //                 FROM tbl_profil_mahasiswa
        //                 JOIN user ON tbl_profil_mahasiswa.nim = user.username
        //                 WHERE tbl_profil_mahasiswa.nim = $userlogin ")->result();

        // $data['user'] = $mahasiswa;

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $query3 = $this->db->query("select * from tbl_profil_mahasiswa where id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['datadiri'] = $query3;

        // echo $query4;die;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['ayah'] = $query4;

        // print_r($query5);die;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $id_mahasiswa . "")->row();
        $data['ibu'] = $query5;

        $this->load->view('profil_mahasiswa/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function adminedit()
    {
        //$id_mahasiswa = $this->input->post('id_mahasiswa', NULL);
        $nama = $this->input->post('nama', null);
        $nim = $this->input->post('nim', null);
        $tempat_lahir = $this->input->post('tempat_lahir', null);
        $tgl_lahir = $this->input->post('tgl_lahir');
        $hsl = date('jmY', strtotime($tgl_lahir));
        $jenis_kelamin = $this->input->post('jenis_kelamin', null);
        $foto = $_FILES['foto'];

        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|tiff';
            $config['max_size'] = 2048;
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

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

        $agama = $this->input->post('agama', null);
        $id_diklat = $this->input->post('id_diklat', null);
        $angkatan = $this->input->post('angkatan', null);
        $id_akademik = $this->input->post('id_akademik', null);
        $kewarganegaraan = $this->input->post('kewarganegaraan', null);
        $nik = $this->input->post('nik', null);
        $npwp = $this->input->post('npwp', null);
        $jalan = $this->input->post('jalan', null);
        $dusun = $this->input->post('dusun', null);
        $rt = $this->input->post('rt', null);
        $rw = $this->input->post('rw', null);
        $kelurahan = $this->input->post('kelurahan', null);
        $kecamatan = $this->input->post('kecamatan', null);
        $kode_pos = $this->input->post('kode_pos', null);
        $email = $this->input->post('email', null);
        $jabatan = $this->input->post('jabatan', null);
        $no_tlp = $this->input->post('no_tlp', null);
        $foto_hidden = $this->input->post('foto_hidden', null);

        $id_mahasiswa = $this->input->post('id_mahasiswa');

        $data2 = array(
            'username' => $nim,
            'id_grup_user' => 2,
            'is_active' => 1,
            'id_unique' => $nim . $hsl,
        );
        $this->db->where('username', $nim);
        $this->db->update('user', $data2);

        $data = array(
            'nama' => $nama,
            'nim' => $nim,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'foto' => ($foto == '') ? $foto_hidden : $foto,
            'agama' => $agama,
            'id_diklat' => $id_diklat,
            'angkatan' => $angkatan,
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
            'email' => $email,
            'jabatan' => $jabatan,
            'no_tlp' => $no_tlp,
        );
        //$idmahasiswa = $this->db->insert_id();

        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('tbl_profil_mahasiswa', $data);

        $jenis = ['AYAH', 'IBU'];
        //$delete_ortu = $this->db->query("update from tbl_ortu_wali where id_mahasiswa='".$id_mahasiswa."'");
        foreach ($jenis as $key => $val) {
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->where('jenis_data_ortu', $val);
            $this->db->update("tbl_ortu_wali", [
                'id_mahasiswa' => $id_mahasiswa,
                'nik_ortu' => ($_POST['nik_ortu'][$key]) ? $_POST['nik_ortu'][$key] : null,
                'nama_ortu' => ($_POST['nama_ortu'][$key]) ? $_POST['nama_ortu'][$key] : null,
                'tempat_lahir_ortu' => ($_POST['tempat_lahir_ortu'][$key]) ? $_POST['tempat_lahir_ortu'][$key] : null,
                'tgl_lahir_ortu' => ($_POST['tgl_lahir_ortu'][$key]) ? $_POST['tgl_lahir_ortu'][$key] : null,
                'pendidikan_ortu' => ($_POST['pendidikan_ortu'][$key]) ? $_POST['pendidikan_ortu'][$key] : null,
                'pekerjaan_ortu' => ($_POST['pekerjaan_ortu'][$key]) ? $_POST['pekerjaan_ortu'][$key] : null,
                'penghasilan_ortu' => ($_POST['penghasilan_ortu'][$key]) ? $_POST['penghasilan_ortu'][$key] : null,
                'jenis_data_ortu' => $val,
            ]);
            // $this->load->model('m_profil_mahasiswa');
            // $this->m_profil_mahasiswa->editortuwali($jenis);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                            Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                            <span aria-hidden="true">&times;</span> </button></div>');
        redirect('profil_mahasiswa');
    }

    public function delete($id_mahasiswa)
    {
        $where = array('id_mahasiswa' => $id_mahasiswa);
        $this->m_profil_mahasiswa->delete1($where, 'tbl_profil_mahasiswa');

        $where1 = array('id_mahasiswa' => $id_mahasiswa);
        $this->m_profil_mahasiswa->delete2($where1, 'tbl_ortu_wali');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
        redirect('profil_mahasiswa');
    }
}
