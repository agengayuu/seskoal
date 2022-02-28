<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');
        $this->load->library('session');
       // session_start();
        //$this->load->view('login/index');
    }

    public function index(){
        $this->load->view('login/index');
    }

    public function cek_login(){

        //$data['hasil'] = $this->m_user->cek_user();
        //var_dump($data['hasil']);die;
        
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
        if($this->form_validation->run() == false){
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

            $user = $this->db->get_where('user',['username' => $username])->row_array();
            //var_dump($password);die();
            //jika usernya ada
            if($user){
                if($user['is_active'] == 1){
                    //cek password
                    if(password_verify($password, $user['password'])){
                         // menyiapkan data di session
                        $data = [
                            'username' => $user['username'],
                            'password' => $user ['password'],
                            'id_grup_user' => $user ['id_grup_user'],
                            'data_created' => time()
                        ];

                        //save to session
                        $this->session->set_userdata($data);
                        if($user['id_grup_user'] == 1){              
                            $this->_admin();
                        }
                        elseif ($user ['id_grup_user'] == 2){
                            $this->_siswa();
                        }
                        else{
                            $this->_dosen();
                        }

                        //arahkan ke view sesuai dengan grup
                        
                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password </div>');
                        //echo password_hash($password, PASSWORD_DEFAULT);die;
                        redirect('login');
                    }

                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username is not been actived</div>');
                    //echo "user tidak aktif";die; 
                    redirect('login');
                }
            } else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Username is not registerd!</div>');
                //echo "user tidak ada";die; 
                redirect('login');
            }

            
        }

    
    }

    public function logout(){
        $this->session->unset_usedata('username');
        $this->session->unset_usedata('id_grup_user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> you have been logged out</div>');
        redirect('login');
    }


    private function _admin(){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/admin');
        $this->load->view('templates_dosen/footer'); 
        
    }

    private function _siswa(){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_mahasiswa'); 
        $this->load->view('main_menu/siswa');
        $this->load->view('templates_dosen/footer'); 
        
    }

    private function _dosen(){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar', $data); 
        $this->load->view('dosen/index');
        $this->load->view('templates_dosen/footer'); 
        
    }
}

?>