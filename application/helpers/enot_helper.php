<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $tipe_id = $ci->session->userdata('tipe_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_arrray();
        $menu_id = $queryMenu['id'];

        $userAkses = $ci->db->get_where('user_akses_menu', [
            'tipe_id' => $tipe_id,
            'menu_id' => $menu_id
        ]);

        if ($userAkses->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}
