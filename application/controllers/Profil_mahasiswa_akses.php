<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Profil_mahasiswa_akses extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa_akses');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('2');
    }

    public function index()
    {
        $data['title'] = 'Data Diri';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');

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

        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $data['datadiri'] = $mahasiswa;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ayah'] = $query4;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ibu'] = $query5;

        $this->load->view('profil_mahasiswa_akses/index', $data);
        $this->load->view('templates_dosen/footer');
    }
    public function editku($id_mahasiswa)
    {
        $where = array('id' => $id_mahasiswa);
        $data['user'] = $this->m_profil_mahasiswa_akses->edit_data($where, 'user')->result();
        $this->load->view('profil_mahasiswa_akses/detail', $data);
    }

    public function edit()
    {
        $data['title'] = 'Data Diri';

        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $userlogin = $this->session->userdata('id');

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

        $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
        $data['diklat'] = $query1;

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $data['tahunakademik'] = $query2;

        $data['datadiri'] = $mahasiswa;

        $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ayah'] = $query4;

        $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
        $data['ibu'] = $query5;

        $this->load->view('profil_mahasiswa_akses/detail', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function update()
    {
        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Diri';

            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
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

            $query1 = $this->db->query("select * from tbl_diklat order by id_diklat asc")->result();
            $data['diklat'] = $query1;

            $query2 = $this->db->query("select * from thn_akademik")->result();
            $data['tahunakademik'] = $query2;

            $data['datadiri'] = $mahasiswa;

            $query4 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='AYAH' AND id_mahasiswa = " . $userlogin . "")->row();
            $data['ayah'] = $query4;

            $query5 = $this->db->query("select * from tbl_ortu_wali where jenis_data_ortu='IBU' AND id_mahasiswa = " . $userlogin . "")->row();
            $data['ibu'] = $query5;

            $this->load->view('profil_mahasiswa_akses/detail', $data);
            $this->load->view('templates_dosen/footer');
        } else {
            $nama = $this->input->post('nama', null);
            $tempat_lahir = $this->input->post('tempat_lahir', null);
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
            $id_akademik = $this->input->post('id_akademik', null);
            $kewarganegaraan = $this->input->post('kewarganegaraan', null);
            $nim = $this->input->post('nim', null);
            $nik = $this->input->post('nik', null);
            $npwp = $this->input->post('npwp', null);
            $jalan = $this->input->post('jalan', null);
            $dusun = $this->input->post('dusun', null);
            $rt = $this->input->post('rt', null);
            $rw = $this->input->post('rw', null);
            $kelurahan = $this->input->post('kelurahan', null);
            $kecamatan = $this->input->post('kecamatan', null);
            $kode_pos = $this->input->post('kode_pos', null);
            $foto_hidden = $this->input->post('foto_hidden', null);
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $no_tlp = $this->input->post('no_tlp'); //tambah ini
            $tgl_lahir = $this->input->post('tgl_lahir'); //tambah ini
            $jabatan = $this->input->post('jabatan'); //tambah ini
            $id_diklat = $this->input->post('id_diklat', null);
            $angkatan = $this->input->post('angkatan', null);

            $data = array(
                'nama' => $nama,
                'tempat_lahir' => $tempat_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'foto' => ($foto == '') ? $foto_hidden : $foto,
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
                'id_mahasiswa' => $id_mahasiswa,
                'no_tlp' => $no_tlp, //tambah ini
                'tgl_lahir' => $tgl_lahir, //tambah ini
                'jabatan' => $jabatan, //tambah ini
                'id_diklat' => $id_diklat, //tambah ini
                'angkatan' => $angkatan,
            );

            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->update('tbl_profil_mahasiswa', $data);

            $data2 = array(
                'foto' => ($foto == '') ? $foto_hidden : $foto,
            );
            $this->db->where('username', $nim);
            $this->db->update('user', $data2);

            //  echo "<pre>";print_r($data);die;

            $jenis = ['AYAH', 'IBU'];

            $cek_table_ortu_wali = $this->db->query("select id_mahasiswa from tbl_ortu_wali where id_mahasiswa = $id_mahasiswa")->row();
            if ($cek_table_ortu_wali == '') {
                foreach ($jenis as $key => $val) {
                    $this->db->insert("tbl_ortu_wali", [
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
                }
            } else {
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
                }
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                Data berhasil di edit. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                                <span aria-hidden="true">&times;</span> </button></div>');
            redirect('profil_mahasiswa_akses');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir');
        $this->form_validation->set_rules('jabatan', 'jabatan');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan');
        $this->form_validation->set_rules('npwp', 'npwp', 'min_length[20]', ['min_length' => 'NPWP wajib diisi sesuai contoh format']);
        $this->form_validation->set_rules('jalan', 'jalan');
        $this->form_validation->set_rules('rt', 'rt', 'numeric', ['numeric' => 'RT wajib diisi dengan angka']);
        $this->form_validation->set_rules('rw', 'rw', 'numeric', ['numeric' => 'RW wajib diisi dengan angka']);
        $this->form_validation->set_rules('kelurahan', 'kelurahan');
        $this->form_validation->set_rules('kecamatan', 'kecamatan');
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'numeric', ['numeric' => 'Kode pos wajib diisi dengan angka']);
        $this->form_validation->set_rules('email', 'email');
        $this->form_validation->set_rules(
            'no_tlp',
            'Nomor telepon',
            'required|numeric|min_length[11]',
            array(
                'required' => 'You have not provided %s.',
                'min_length' => 'Nomor telepon minimal 11 nomor dan maksimal 14 nomor.',
            )
        );
        $this->form_validation->set_rules(
            'angkatan',
            'Angkatan',
            'required|regex_match[/(?<=^)M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})(?=$)/]',
            array(
                'required' => 'You have not provided %s.',
                'regex_match' => 'Angkatan harus angka romawi.',
            )
        );
        $this->form_validation->set_rules(
            'nik',
            'NIK',
            'required|numeric|min_length[16]',
            array(
                'required' => 'You have not provided %s.',
                'numeric' => 'hanya number',
                'min_length' => 'NIK harus terdiri dari 16 nomor.',
            )
        );
    }

}
