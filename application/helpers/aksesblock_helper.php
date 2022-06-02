 <?php

function strposa(string $haystack, array $needles, int $offset = 0): bool
{
    foreach ($needles as $needle) {
        if (strpos($haystack, $needle, $offset) !== false) {
            return true; // stop on first true result
        }
    }

    return false;
}

function is_logged_in($id_group)
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $id_grup_user = $ci->session->userdata('id_grup_user');
        if ($id_grup_user == $id_group) {

            $queryMenu = $ci->db->get_where('user_akses_menu', ['id_grup_user' => $id_grup_user])->result();

            $sub_menu_array = [];
            foreach ($queryMenu as $menu) {
                $querySubMenu = $ci->db->get_where('user_submenu', ['id_menu' => $menu->id_menu])->result();
                foreach ($querySubMenu as $sub_menu) {
                    $sub_menu_array[] = $sub_menu->url;
                }
            }
            // print_r($sub_menu_array);die();
            $match = true;
            if (strposa(uri_string(), $sub_menu_array, 0)) {
                // url match
                $match = true;
            } else {
                // url not match
                $match = false;
            }
            if (!$match) {
                redirect('Login/blocked');
            }
        } else {
            $url_back = '';
            if ($id_grup_user == '1') {
                $url_back = 'main_menu/admin';
            } else if ($id_grup_user == '2') {
                $url_back = 'main_menu/siswa';
            } else if ($id_grup_user == '3') {
                $url_back = 'main_menu/dosen';
            } else {
                $url_back = '/';
            }
            redirect($url_back);
        }
    }
}

function cek_akses($id_grup_user, $id_menu)
{

    $ci = get_instance();

    $result = $ci->db->where('id_grup_user', $id_grup_user);
    $result = $ci->db->where('id_menu', $id_menu);
    // echo '<pre>';
    // print_r($menu);
    // echo '<pre>';
    // print_r ($grup);die;

    $result = $ci->db->get('user_akses_menu');
    // echo '<pre>';
    // print_r($result->result_array());
    // die;
    if ($result->num_rows() > 0) {
        // print_r($result);
        // die;
        // $ci->load->view('templates_dosen/header');
        // $ci->load->view('templates_dosen/sidebar_admin');
        return "checked='checked'";
        // $ci->load->view('hak_akses/index');
        // $ci->load->view('templates_dosen/footer');

    }
}
