<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_dosen');
        $this->load->library('session');
        is_logged_in('1');
    }

    public function index()
    {
        $data['title'] = " Dosen";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $query = $this->db->query("select * from
                        tbl_dosen ")->result();
        $data['dosen'] = $query;

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('dosen/index');
        $this->load->view('templates_dosen/footer');
    }

    public function admintambah()
    {
        $data['title'] = "Tambah Dosen";
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $query = $this->db->query("select * from
                        tbl_dosen ")->result();
        $data['dosen'] = $query;
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('dosen/tambah');
        $this->load->view('templates_dosen/footer');
    }

    public function adminsimpan()
    {

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $created_at = date('Y-m-d H:i:s');

        $this->_rules();
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $this->admintambah();
        } else {
            $nip = $this->input->post('nip');
            $nik = $this->input->post('nik');
            $npwp = $this->input->post('npwp');
            $kewarganegaraan = $this->input->post('kewarganegaraan');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $gelar_depan = $this->input->post('gelar_depan');
            $gelar_belakang = $this->input->post('gelar_belakang');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $jk = $this->input->post('jk');
            $agama = $this->input->post('agama');
            $alamat = $this->input->post('alamat');
            $hsl = date('jmY', strtotime($tgl_lahir));
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
            $created_at = $this->input->post('created_at');

            $created_at = date('Y-m-d H:i:s');

            $data2 = array(
                'email' => $email,
                'username' => $nip,
                'id_grup_user' => 3,
                'is_active' => 1,
                'id_unique' => $nip . $hsl,
                'foto' => $foto,
                'date_created' => time(),

            );
            $iduser = $this->m_dosen->simpanuser($data2, 'user');

            $data = array(
                'nip' => $nip,
                'nik' => $nik,
                'npwp' => $npwp,
                'kewarganegaraan' => $kewarganegaraan,
                'nama' => $nama,
                'email' => $email,
                'no_tlp' => $no_tlp,
                'gelar_depan' => $gelar_depan,
                'gelar_belakang' => $gelar_belakang,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'jk' => $jk,
                'agama' => $agama,
                'alamat' => $alamat,
                'foto' => $foto,
                'created_at' => $created_at,
                'id_user' => $iduser,
            );

            $this->m_dosen->adminsimpan($data, 'tbl_dosen');

            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade show" role="alert">
                                            Data Berhasil dimasukkan! <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                            <span aria-hidden="true">&times;</span></button></div>');
            redirect('dosen');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[user.username]', [
            'required' => 'NIP Wajib diisi!',
            'is_unique' => '%s sudah ada'
        ]);

        $this->form_validation->set_rules('nik', 'nik', 'required|is_unique[user.username]', [
            'required' => 'NIK Wajib diisi!',
            'is_unique' => '%s sudah ada'
        ]);

        $this->form_validation->set_rules('npwp', 'npwp', 'required|is_unique[user.username]', [
            'required' => 'NPWP Wajib diisi!',
            'is_unique' => '%s sudah ada'
        ]);

        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'required', ['required' => 'Kewarganegaraan Wajib diisi!']);
        $this->form_validation->set_rules('nama', 'nama', 'required', ['required' => 'Nama Wajib diisi!']);
        $this->form_validation->set_rules('email', 'email', 'required|valid_email', [
            'required' => 'Email Wajib diisi!',
            'valid_email' => 'Masukan email yang benar'
        ]);

        $this->form_validation->set_rules('no_tlp', 'no_tlp', 'required|numeric|min_length[11]', [
            'required' => 'No Telpon Wajib diisi!',
            'min_length' => 'Nomor telepon minimal 11 nomor dan maksimal 14 nomor.'
        ]);
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required', ['required' => 'Tempat Lahir Wajib diisi!']);
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required', ['required' => 'Tanggal Lahir Wajib diisi!']);
        $this->form_validation->set_rules('jk', 'jk', 'required', ['required' => 'Jenis Kelamin Wajib diisi!']);
        $this->form_validation->set_rules('agama', 'agama', 'required', ['required' => 'Agama Wajib diisi!']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', ['required' => 'Alamat Wajib diisi!']);
    }

    public function adminedit($id)
    {
        $data['title'] = "Edit Update";
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $where = array(
            'id_dosen' => $id,
        );

        $data['dosennya'] = $this->m_dosen->adminedit($where, 'tbl_dosen')->result();

        $data['detail'] = $this->m_dosen->admindetail($id);
        $this->load->view('dosen/edit', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function adminupdate()
    {
        // $data['user'] = $this->db->get_where('user',['username' =>
        // $this->session->userdata('username')])->row_array();

        // $this->load->view('templates_dosen/header',$data);
        // $this->load->view('templates_dosen/sidebar_admin',$data);

        // $this->_rules();

        // if($this->form_validation->run() == FALSE){
        //     $this->adminedit();
        // } else {
        $id_dosen = $this->input->post('id_dosen');
        $nip = $this->input->post('nip');
        $nik = $this->input->post('nik');
        $npwp = $this->input->post('npwp');
        $kewarganegaraan = $this->input->post('kewarganegaraan');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $gelar_depan = $this->input->post('gelar_depan');
        $gelar_belakang = $this->input->post('gelar_belakang');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $jk = $this->input->post('jk');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $foto = $_FILES['userfile']['name'];
        if ($foto) {
            $config['upload_path'] = './assets/uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif|tiff';
            $config['max_size'] = 2048;
            $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('foto', $userfile);
            } else {
                echo "Gagal Upload";
            }
        }

        $data = array(
            'nip' => $nip,
            'nik' => $nik,
            'npwp' => $npwp,
            'kewarganegaraan' => $kewarganegaraan,
            'nama' => $nama,
            'email' => $email,
            'no_tlp' => $no_tlp,
            'gelar_depan' => $gelar_depan,
            'gelar_belakang' => $gelar_belakang,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'agama' => $agama,
            'alamat' => $alamat,

        );

        $data2 = array(
            'email' => $email,
        );

        $where = array(
            'id_dosen' => $id_dosen,
        );

        $where2 = array(
            'username' => $nip,

        );

        $this->m_dosen->adminupdate($where, $data, 'tbl_dosen');
        $this->m_dosen->adminupdate($where2, $data2, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
        redirect('dosen');

        // }

        // $id_dosen       = $this->input->post('id_dosen');
        // $nip            = $this->input->post('nip');
        // $nama           = $this->input->post('nama');
        // $email          = $this->input->post('email');
        // $no_tlp         = $this->input->post('no_tlp');
        // $gelar_depan    = $this->input->post('gelar_depan');
        // $gelar_belakang = $this->input->post('gelar_belakang');
        // $tempat_lahir   = $this->input->post('tempat_lahir');
        // $tgl_lahir      = $this->input->post('tgl_lahir');
        // $jk             = $this->input->post('jk');
        // $agama          = $this->input->post('agama');
        // $alamat          = $this->input->post('alamat');
        // $foto           = $this->input->post('foto');

        // $data = array(
        //     'id_dosen' => $id_dosen,
        //     'nip' => $nip,
        //     'nama' => $nama,
        //     'email' => $email,
        //     'no_tlp' => $no_tlp,
        //     'gelar_depan' =>$gelar_depan,
        //     'gelar_belakang' => $gelar_belakang,
        //     'tempat_lahir' =>  $tempat_lahir,
        //     'tgl_lahir' => $tgl_lahir,
        //     'jk'   => $jk,
        //     'agama'   => $agama,
        //     'alamat'   => $alamat,
        //     'foto'   => $foto,
        //     'jk'   => $jk
        // );

        // $where = array(
        //     'id_dosen' => $id_dosen
        // );

        // $this->m_dosen->adminupdate($where,$data,'tbl_dosen');
        // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        //                                         Data berhasil di Update. <button type="button" class="close" data-dismiss="alert" aria-label="close">
        //                                         <span aria-hidden="true">&times;</span> </button></div>');

        // redirect('dosen');

    }

    public function adminhapus($id_dosen)
    {

        $where = array('id_dosen' => $id_dosen);
        $user = $this->db->query("delete a.* from user a
                                join tbl_dosen b on a.id = b.id_user where b.id_dosen = $id_dosen");
        // print_r($user);die;

        $this->m_dosen->adminhapus($where, 'tbl_dosen');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('dosen', 'refresh');
    }

    public function admindetail($id_dosen)
    {
        $data['title'] = 'Detail Dosen';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['detail'] = $this->m_dosen->admindetail($id_dosen);

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('dosen/detail');
        $this->load->view('templates_dosen/footer');
    }

    public function importcsv()
    {

        if (isset($_POST['import'])) {

            $file = $_FILES['filecsv']['tmp_name'];
            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi = explode('.', $_FILES['filecsv']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
                echo 'File tidak boleh kosong!';
            } else {
                // Validasi apakah file yang diupload benar-benar file csv.
                if (strtolower(end($ekstensi)) === 'csv' && $_FILES["filecsv"]["size"] > 0) {

                    $i = 0;
                    $handle = fopen($file, "r");
                    while (($row = fgetcsv($handle, 2048))) {
                        $i++;
                        if ($i == 1) {
                            continue;
                        }

                        $dsn = explode(";", $row[0]);
                        // Data yang akan disimpan ke dalam databse
                        $data = [
                            'nip' => $dsn[0],
                            'nik' => $dsn[1],
                            'npwp' => $dsn[2],
                            'nama' => $dsn[3],
                            'email' => $dsn[4],
                            'tempat_lahir' => $dsn[5],
                            'tgl_lahir' => $dsn[6],
                        ];

                        // Simpan data ke database.
                        $this->m_dosen->adminsimpan($data, 'tbl_dosen');
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil ditambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');
                    }

                    fclose($handle);
                    redirect('dosen');
                } else {
                    echo 'Format file tidak valid!';
                }
            }
        }
    }
}
