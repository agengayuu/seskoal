<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa');
        $this->load->library('session');
        is_logged_in('1');

        //session_start();
    }


    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $data['siswa'] = $this->m_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query2 = $this->db->query("select * from thn_akademik")->result();
        $query = $this->db->query("select * from tbl_diklat")->result();
        $data['diklat'] = $query;
        $data['akademik'] = $query2;

        $this->load->view('mahasiswa/tambah', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function adminsimpan()
    {
        $this->form_validation->set_rules(
            'nim',
            'Nim',
            'required|is_unique[user.username]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => '%s sudah ada.'
            )
        );

        $this->form_validation->set_rules(
            'no_tlp',
            'Nomor telepon',
            'required|numeric|min_length[11]',
            array(
                'required'      => 'You have not provided %s.',
                'min_length'     => 'Nomor telepon minimal 11 nomor dan maksimal 14 nomor.'
            )
        );

        $this->form_validation->set_rules(
            'angkatan',
            'Angkatan',
            'required|regex_match[/(?<=^)M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})(?=$)/]',
            array(
                'required'      => 'You have not provided %s.',
                'regex_match'     => 'Angkatan harus angka romawi.'
            )
        );

        $this->form_validation->set_rules(
            'tahun_masuk',
            'Tahun Masuk',
            'required|numeric|min_length[4]',
            array(
                'required'      => 'You have not provided %s.',
                'numeric'     => 'Tahun masuk minimal harus 4 nomor.'
            )
        );

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Mahasiswa';
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
            $query = $this->db->query("select * from tbl_diklat")->result();
            $query2 = $this->db->query("select * from thn_akademik")->result();
            $data['diklat'] = $query;
            $data['akademik'] = $query2;
            
            $this->load->view('templates_dosen/header', $data);
            $this->load->view('templates_dosen/sidebar_admin', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('templates_dosen/footer');
        } else {
            $nim            = $this->input->post('nim');
            $nama           = $this->input->post('nama');
            $angkatan       = $this->input->post('angkatan');
            $tgl_lahir      = $this->input->post('tgl_lahir');
            $tahun_masuk    = $this->input->post('tahun_masuk');
            $id_akademik    = $this->input->post('id_akademik');
            $jabatan        = $this->input->post('jabatan');
            $email          = $this->input->post('email');
            $no_tlp         = $this->input->post('no_tlp');
            // print_r($no_tlp);die;
            //$foto           = $this->input->post('foto');
            $foto               = $_FILES['foto'];
            if ($foto = '') {
            } else {
                $config['upload_path']      = './assets/uploads/';
                $config['allowed_types']    = 'jpg|png|jpeg|gif|tiff';
                $config['max_size']         = 2048;
                $config['file_name']        = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

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

            $id_diklat      = $this->input->post('id_diklat');
            $id_grup_user   = $this->input->post('id_grup_user');
            // $tgl_lhr        = $this->input->post('tgl_lhr');
            $hsl            = date('jmY', strtotime($tgl_lahir));
            $created_at     = $this->input->post('created_at');
            $created_at     = date('Y-m-d H:i:s');

            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'angkatan' => $angkatan,
                'tgl_lahir' => $tgl_lahir,
                'tahun_masuk' => $tahun_masuk,
                'id_akademik' => $id_akademik,
                'jabatan' => $jabatan,
                'email' =>  $email,
                'id_diklat' => $id_diklat,
                'no_tlp' => $no_tlp,
                'foto'   => $foto,
                'created_at' => $created_at
            );
            // echo "<pre>";
            // print_r($data);die;

            $data2 = array(
                'email' =>  $email,
                'username' => $nim,
                'id_grup_user' => 2,
                'is_active' => 1,
                'foto'   => $foto,
                'id_unique' => $nim . $hsl
            );



            $this->m_mahasiswa->adminsimpan($data, 'tbl_mahasiswa');
            $idmahasiswa = $this->m_mahasiswa->simpanuser($data2, 'user');

            $data3 = array(
                'id_mahasiswa' => $idmahasiswa,
                'nim' => $nim,
                'nama' => $nama,
                'angkatan' => $angkatan,
                'tgl_lahir' => $tgl_lahir,
                'jabatan' => $jabatan,
                'email' =>  $email,
                'id_diklat' => $id_diklat,
                'no_tlp' => $no_tlp,
                'foto'   => $foto,
                'created_at' => $created_at
            );
            $this->m_mahasiswa->adminsimpan($data3, 'tbl_profil_mahasiswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                Data berhasil ditambah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

            redirect('mahasiswa');
        }
    }
    public function adminedit($nim)
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Mahasiswa';
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $where = array(
            'nim' => $nim
        );

        $data['akademik'] = $this->db->query("select * from thn_akademik")->result();
        $data['diklat'] = $this->db->query("Select * from tbl_diklat")->result();
        $data['siswanya'] = $this->m_mahasiswa->adminedit($where, 'tbl_mahasiswa')->result();

        $this->load->view('mahasiswa/edit', $data);
        $this->load->view('templates_dosen/footer');
    }
    public function adminhapus($nim)
    {

        $where = array('nim' => $nim);
        $where2 = array('username' => $nim);
           
        $this->m_mahasiswa->adminhapus($where, 'tbl_mahasiswa');
        $this->m_mahasiswa->adminhapus($where2, 'user');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                Data berhasil dihapus. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                <span aria-hidden="true">&times;</span> </button></div>');

        redirect('mahasiswa', 'refresh');
    }

    public function admindetail($nim)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $where = array( 
            'nim' => $nim
        );
        $test = $this->m_mahasiswa->adminedit($where, 'tbl_mahasiswa')->result();
        // print_r($test);
        // echo "<pre>";
        $data['detail'] = $this->m_mahasiswa->admindetail($nim)->result();
        // print_r($data['detail']);die;
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('mahasiswa/detail');
        $this->load->view('templates_dosen/footer');
    }

    public function update()
    {
            // ---------UNTUK NAMPILIN VIEW NYA-----------------------
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
            $data['title'] = 'Tambah Mahasiswa';
            $this->load->view('templates_dosen/header', $data);
            $this->load->view('templates_dosen/sidebar_admin', $data);
            $this->load->view('mahasiswa/edit');
            $this->load->view('templates_dosen/footer');
            //-------------------END----------------------------------

            $id             = $this->input->post('id_mahasiswa');
            $nim            = $this->input->post('nim');
            $nama           = $this->input->post('nama');
            $angkatan       = $this->input->post('angkatan');
            $tgl_lahir      = $this->input->post('tgl_lahir');
            $tahun_masuk    = $this->input->post('tahun_masuk');
            $id_akademik    = $this->input->post('id_akademik');
            $jabatan        = $this->input->post('jabatan');
            $email          = $this->input->post('email');
            $no_tlp         = $this->input->post('no_tlp');
            $foto           = $this->input->post('foto');
            $id_diklat      = $this->input->post('id_diklat');
            $id_grup_user   = $this->input->post('id_grup_user');
            $tgl_lhr        = $this->input->post('tgl_lhr');
            $hsl            = date('jmY', strtotime($tgl_lhr));
    
            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'angkatan' => $angkatan,
                'tgl_lahir' => $tgl_lahir,
                'tahun_masuk' => $tahun_masuk,
                'id_akademik' => $id_akademik,
                'jabatan' => $jabatan,
                'email' =>  $email,
                'id_diklat' => $id_diklat,
                'no_tlp' => $no_tlp,
                'foto'   => $foto
            );
    
            $data2 = array(
                'foto'   => $foto,
                'email' =>  $email,
            );
    
            $where = array(
                'id_mahasiswa' => $id
            );
            $where2 = array(
                'username' => $nim
            );
            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";
            // print_r($data2);
            
            // print_r($where);die;
    
    
            $this->m_mahasiswa->update($where, $data, 'tbl_mahasiswa');
            $this->m_mahasiswa->update($where2, $data2, 'user');
            redirect('mahasiswa');
            
        }


    public function excel()
    {
        $data['siswa'] = $this->m_mahasiswa->tampildata()->result();

        $this->load->view('mahasiswa/export_excel', $data);

        // $spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();
        // // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        // // $style_col = [
        // //     'font' => ['bold' => true], // Set font nya jadi bold
        // //     'alignment' => [
        // //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        // //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        // //     ],
        // //     'borders' => [
        // //         'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        // //         'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        // //         'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        // //         'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
        // //     ]
        // // ];
        // // // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        // // $style_row = [
        // //     'alignment' => [
        // //         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
        // //     ],
        // //     'borders' => [
        // //         'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        // //         'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        // //         'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        // //         'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
        // //     ]
        // // ];


        // // $sheet->setCreator("SIAK SESKOAL");
        // // $sheet->setLastModifiedBy("SIAK SESKOAL");
        // $sheet->setTitle("Daftar Mahasiswa");


        // $sheet->setCellValue('A1', 'NO');
        // $sheet->setCellValue('B1', 'NIM');
        // $sheet->setCellValue('C1', 'Nama Mahasiswa');
        // $sheet->setCellValue('D1', 'Tanggal Lahir');
        // $sheet->setCellValue('E1', 'Angkatan');
        // $sheet->setCellValue('F1', 'Tahun Masuk');
        // $sheet->setCellValue('G1', 'Tahun Akademik');
        // $sheet->setCellValue('H1', 'Jabatan');
        // $sheet->setCellValue('I1', 'Diklat');
        // $sheet->setCellValue('J1', 'Email');
        // $sheet->setCellValue('K1', 'No. Telepon');

        // // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        // // $sheet->getStyle('A1')->applyFromArray($style_col);
        // // $sheet->getStyle('B1')->applyFromArray($style_col);
        // // $sheet->getStyle('C1')->applyFromArray($style_col);
        // // $sheet->getStyle('D1')->applyFromArray($style_col);
        // // $sheet->getStyle('E1')->applyFromArray($style_col);
        // // $sheet->getStyle('F1')->applyFromArray($style_col);
        // // $sheet->getStyle('G1')->applyFromArray($style_col);
        // // $sheet->getStyle('H1')->applyFromArray($style_col);
        // // $sheet->getStyle('I1')->applyFromArray($style_col);
        // // $sheet->getStyle('J1')->applyFromArray($style_col);
        // // $sheet->getStyle('K1')->applyFromArray($style_col);

        // $baris = 2;
        // $no = 1;
        // // echo "<pre>";
        // // print_r($data['siswa']);
        // // die();
        // foreach ($data['siswa'] as $mhs) {
        //     $sheet->setCellValue('A' . $baris, $no++);
        //     $sheet->setCellValue('B' . $baris, $mhs->nim);
        //     $sheet->setCellValue('C' . $baris, $mhs->nama);
        //     $sheet->setCellValue('E' . $baris, $mhs->tgl_lahir);
        //     $sheet->setCellValue('D' . $baris, $mhs->angkatan);
        //     $sheet->setCellValue('F' . $baris, $mhs->tahun_masuk);
        //     $sheet->setCellValue('G' . $baris, $mhs->tahun_akademik);
        //     $sheet->setCellValue('H' . $baris, $mhs->jabatan);
        //     $sheet->setCellValue('I' . $baris, $mhs->email);
        //     $sheet->setCellValue('J' . $baris, $mhs->no_tlp);

        //     // $sheet->getStyle('A1')->applyFromArray($style_row);
        //     // $sheet->getStyle('B1')->applyFromArray($style_row);
        //     // $sheet->getStyle('C1')->applyFromArray($style_row);
        //     // $sheet->getStyle('D1')->applyFromArray($style_row);
        //     // $sheet->getStyle('E1')->applyFromArray($style_row);
        //     // $sheet->getStyle('F1')->applyFromArray($style_row);
        //     // $sheet->getStyle('G1')->applyFromArray($style_row);
        //     // $sheet->getStyle('H1')->applyFromArray($style_row);
        //     // $sheet->getStyle('I1')->applyFromArray($style_row);
        //     // $sheet->getStyle('J1')->applyFromArray($style_row);
        //     // $sheet->getStyle('K1')->applyFromArray($style_row);

        //     $baris++;
        // }
        // // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        // $sheet->getDefaultRowDimension()->setRowHeight(-1);
        // // Set orientasi kertas jadi LANDSCAPE
        // $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);



        // $sheet->setTitle("Data Mahasiswa");
        // $writer = new Xlsx($spreadsheet);
        // // Proses file excel
        // header('Content-Type: application/vnd.ms-excel');
        // header('Content-Disposition: attachment; filename="Data Mahasiswa.xls"'); // Set nama file excel nya
        // header('Cache-Control: max-age=0');

        // $writer->save('php://output');
    }

    public function ex_pdf()
    {
        $this->load->library('Pdf');

        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('L', 'mm', 'Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'DATA MAHASISWA ', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(30, 6, 'NIM', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Mahasiswa', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tanggal Lahir', 1, 0, 'C');
        $pdf->Cell(35, 6, 'Tahun Masuk', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Tahun Akademik', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Jabatan', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Email', 1, 0, 'C');
        $pdf->Cell(40, 6, 'No. Telepon', 1, 0, 'C');

        $pdf->SetFont('Arial', '', 10);
        $data['siswa'] = $this->m_mahasiswa->tampildata()->result();
        $no = 1;
        foreach ($data['siswa'] as $s) {
            $no++;
            $pdf->Cell(10, 6, $no++, 1, 1, 'C');
            $pdf->Cell(30, 6, $s->nim, 1, 0, 'C') ;
            $pdf->Cell(90, 6, $s->nama, 1, 0,'C');
            $pdf->Cell(35, 6, $s->angkatan, 1, 0,'C');
            $pdf->Cell(35, 6, $s->tgl_lahir, 1, 0,'C');
            $pdf->Cell(40, 6, $s->tahun_masuk, 1, 0,'C');
            $pdf->Cell(40, 6, $s->tahun_akademik, 1, 0,'C');
            $pdf->Cell(40, 6, $s->jabatan, 1, 0,'C');
            $pdf->Cell(40, 6, $s->email, 1, 0,'C');
            $pdf->Cell(40, 6, $s->no_tlp, 1, 0,'C');
        }
        $pdf->Output();
    }
}
