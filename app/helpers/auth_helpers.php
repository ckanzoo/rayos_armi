<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

function is_logged_in()
{
    $lava = lava_instance();
    $lava->call->library('session');
    return $lava->session->userdata('logged_in') === true;
}

function user_role()
{
    $lava = lava_instance();
    $lava->call->library('session');
    return $lava->session->userdata('role');
}

function authorize($roles = [])
{
    if (!is_logged_in()) {
        redirect('auth/login');
        exit;
    }

    $role = user_role();

    if (!in_array($role, (array) $roles)) {
        http_response_code(403);
        echo "🚫 Access Denied!";
        exit;
    }
}

