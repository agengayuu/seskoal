 <?php

function is_logged_in()
{
    $ci = get_instance();
    if(!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if($userAccess->num_rows() < 1) {
            redirect('Login/blocked');
        }
    }
}


function cek_akses($id_grup_user, $id_menu)
{

    $ci = get_instance();

    $ci->db->where('id_grup_user', $id_grup_user);
    $ci->db->where('id_menu', $id_menu);

    $result = $ci->db->get('user_akses_menu');

    if ($result->num_rows() > 0) {
        // print_r($result);
        // die;
        // $ci->load->view('templates_dosen/header'); 
        // $ci->load->view('templates_dosen/sidebar_admin');
        return "checked='checked";
        // $ci->load->view('hak_akses/index');
        // $ci->load->view('templates_dosen/footer'); 

    }
}
