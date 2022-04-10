<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Evaluasi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_evaluasi');
        $this->load->library('session');
        is_logged_in('3');
        //session_start();
    }

}


?>