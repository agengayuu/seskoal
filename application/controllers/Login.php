<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');
        $this->load->library('session');
        $this->load->library('email');

        // session_start();
        //$this->load->view('login/index');
    }

    public function index()
    {
        $this->load->view('login/index');
    }

    public function cek_login()
    {

        //$data['hasil'] = $this->m_user->cek_user();
        //var_dump($data['hasil']);die;

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $this->load->view('login/index');
        } else {
            //validation success..
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            // //var_dump($password);
            // $data = array(
            //     'username' => $username,
            //     'passsword' => md5($password)
            // );

            //print_r($data);die;
            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            //jika usernya ada
            if ($user) {
                if ($user['is_active'] == 1) {
                    //cek password
                    if (password_verify($password, $user['password'])) {
                        // menyiapkan data di session
                        $data = [
                            'username' => $user['username'],
                            'password' => $user['password'],
                            'id_grup_user' => $user['id_grup_user'],
                            'id' => $user['id'],
                            'foto' => $user['foto'],
                            'data_created' => time(),
                        ];

                        //save to session
                        $this->session->set_userdata($data);
                        if ($user['id_grup_user'] == 1) {
                            // $this->_admin();
                            redirect('main_menu/admin', 'refresh');
                        } elseif ($user['id_grup_user'] == 2) {
                            redirect('main_menu/siswa', 'refresh');
                        } else {
                            redirect('main_menu/dosen', 'refresh');
                        }

                        //arahkan ke view sesuai dengan grup
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Password salah</div>');
                        //echo password_hash($password, PASSWORD_DEFAULT);die;
                        redirect('login');
                    }

                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Username belum aktif</div>');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Username belum terdaftar</div>');
                redirect('login');

                redirect('login');
            }

        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> anda sudah logged out</div>');
        redirect('login');
    }

    public function buatpass()
    {
        $this->load->view('login/buatpass');
    }
    public function buatpass2()
    {
        $this->load->view('login/buatpass2');
    }

    public function validasi_pass()
    {
        $this->form_validation->set_rules('tgl_lhr', 'Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/buatpass');
        } else {
            //validation success..
            $username = $this->input->post('username');
            $tgl_lhr = $this->input->post('tgl_lhr');
            $hsl = date('jmY', strtotime($tgl_lhr));
            $unik = $username . $hsl;
            $usernya = $this->db->query("select * from
                                            user where
                                            username = '$username' and id_unique ='$unik'")->result();
            $data['user'] = $usernya[0];

            if ($usernya == null) {
                $this->session->set_Flashdata('pesan', '<div class="alert alert-danger" role="alert">Data anda belum terdaftar</div>');
                redirect('login');
            } else {
                if ($usernya[0]->id_unique == $unik && $usernya[0]->password == 0) {
                    $this->load->view('login/buatpass2', $data);
                } else {
                    $this->session->set_Flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil login</div>');
                    redirect('login');
                }
            }
        }

    }
    public function simpanpass()
    {
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|matches[password]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|xss_clean|min_length[3]|matches[password2]');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/buatpass2');
        } else {
            $password = $this->input->post('password');
            $password2 = $this->input->post('password2');
            $id = $this->input->post('id');
            $usernya = $this->db->query("select * from
                                            user where
                                            id = '$id'")->result();
           

            $data['user'] = $usernya;
            
            if ($password == $password2) {
             
                $newpass = password_hash($password, PASSWORD_DEFAULT);

                $new = $this->db->query("update user set password = '" . $newpass . "' where id = '" . $id . "'");
                $hasil = $this->db->query("select * from
                                            user where
                                            id = '$id'")->result();
                // print_r($hasil[0]);die();
                redirect('login');

            } else {
                $this->session->set_Flashdata('pesan', '<div class="alert alert-success" role="alert">Password tidak sama</div>');
                redirect('login/buatpass2');

            }

        }

    }

    public function set()
    {
        $data['title'] = 'Ganti Password';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('login/setpass', $data);
        $this->load->view('templates_dosen/footer');

    }
    public function set_password()
    {
        $data['title'] = 'Set Password';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['password'] = $this->db->get_where('user', ['password' => $this->session->userdata('password')])->row_array();
        $this->form_validation->set_rules('passbaru', 'Password', 'trim|required|xss_clean|min_length[6]');
        $this->form_validation->set_rules('passbaru1', 'Password2', 'trim|required|xss_clean|min_length[6]');

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        // $data['set_password'] = $this->m_set_password->tampil_data()->result();
        if (!$this->form_validation->run() == false) {
            $this->load->view('templates_dosen/header', $data);
            $this->load->view('templates_dosen/sidebar_admin', $data);
            $this->load->view('login/setpass', $data);
            $this->load->view('templates_dosen/footer');
        } else {
            $passlama = $this->input->post('passlama');
            $passbaru = $this->input->post('passbaru');
            $passbaru1 = $this->input->post('passbaru1');

            if (!password_verify($passlama, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                               Password lama salah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                               <span aria-hidden="true">&times;</span> </button>','</div>');
                redirect('login/set', 'refresh');

            } else {
                if ($passlama == $passbaru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                   Password baru tidak boleh sama dengan password lama. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                   <span aria-hidden="true">&times;</span> </button>','</div>');
                    redirect('login/set', 'refresh');

                    // echo"pass lama sama dgn pass baru";

                } else if
                ($passbaru != $passbaru1) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Konfirmasi password tidak sesuai <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button>','</div>');
                    redirect('login/set', 'refresh');

                } else {
                    //password sudah benar
                    //    echo"password sudah benar";die;
                    $passwordhash = password_hash($passbaru, PASSWORD_DEFAULT);
                    $this->db->set('password', $passwordhash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Password berhasil di ubah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button>','</div>');
                    redirect('login/set', 'refresh');
                    // echo "password berhasil di updt";die;

                }
            }

        }
    }

    public function blocked()
    {
        $this->load->view('login/blocked');
    }

    private function _sendEmail($token, $type)
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'sseskoal@gmail.com'; //SMTP username
        $mail->Password = 'Seskoal0609'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465;

        if ($type == 'verify') {
            $this->email->subject('testing');
            $this->email->message('hellow');
        } else if ($type == 'forgot') {

            $mail->setFrom('no-reply@seskoal.com', 'SESKOAL');
            $mail->addAddress($this->input->post('email'), 'User'); //Add a recipient

            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = 'Reset password';
            $mail->Body = 'Klik link di bawah untuk reset password anda:
            <a href="' . base_url() . 'login/resetpass?email=' . $this->input->post('email')
            . '&token' . urlencode($token) . '">Reset</a>';
            if ($mail->send()) {
                return true;
            } else {
                echo $this->email->print_debugger();

            };
        }

    }
    public function lupapass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/lupapass');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Silahkan cek email anda</div>');
               
                redirect('login/lupapass');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Email belum terdaftar atau belum aktif</div>');
               
                redirect('login/lupapass');
            }
        }
    }

    public function resetpass()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        // print_r($user);die;
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['email' => $email])->row_array(); //mau pake token atau email boleh
            // print_r($user_token);die;
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->gantipass();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        Reset password gagal! email token. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                        <span aria-hidden="true">&times;</span> </button>','</div>');
                redirect('login', 'refresh');
            }

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    Reset password gagal! email salah. <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                                    <span aria-hidden="true">&times;</span> </button>','</div>');
            redirect('login', 'refresh');
        }
    }

    public function gantipass()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login', 'refresh');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[3]|matches[password]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|required|xss_clean|min_length[3]|matches[password2]');
        $p = $this->input->post('password');
        $p2 = $this->input->post('password2');
        if ($this->form_validation->run() == false) {
            $this->load->view('login/gantipass');
        } else {
            if($p != $p2){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Konfirmasi password tidak sesuai </div>');
                redirect('login/gantipass', 'refresh');
            }else{
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $email = $this->session->userdata('reset_email');
    
                $this->db->set('password', $password);
                $this->db->where('email', $email);
                $this->db->update('user');
    
                $this->session->unset_userdata('reset_email');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password berhasil di ubah </div>');
                redirect('login', 'refresh');
            }
        }
    }
}
