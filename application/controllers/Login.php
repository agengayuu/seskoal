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

        //$data['hasil'] = $this->m_user->cek_user();
        //var_dump($data['hasil']);die;
        
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
        if($this->form_validation->run() == false){
            $this->load->view('login/index');
        } else {
            //validation success
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //var_dump($password); 

            $user = $this->db->get_where('user',['username' => $username, 'password' => md5($password)])->row_array();
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
                        $a = $this->session->set_userdata($data);
                        //print($a);die;
                        //arahkan ke view sesuai dengan grup
                        //redirect('main_menu');
                        echo"masuk pa eko";

                    }else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password </div>');
                        echo "password salah";
                        //redirect('login');
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
}

?>