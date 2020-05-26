<?php

function check_admin() {
    $ci =& get_instance();
    $ci->load->library('fungsi');
    if($ci->fungsi->user_login()->role != "admin") {
        redirect('admin');
    }
}