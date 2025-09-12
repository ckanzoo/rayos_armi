<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    
  public function index()
{
    $this->call->model('UserModel');

    $per_page = 5; 

    
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) {
        $page = 1;
    }

    
    $total_users = $this->UserModel->count_all_users();
    $total_pages = max(1, ceil($total_users / $per_page));

    
    if ($page > $total_pages) {
        $page = $total_pages;
    }

    
    $offset = ($page - 1) * $per_page;

    
    $users = $this->UserModel->get_paginated($per_page, $offset);

    
    $pagination_links = '';

    if ($page > 1) {
        $pagination_links .= '<a href="?page='.($page - 1).'" class="bg-green-100 text-green-700 px-3 py-1 rounded hover:bg-green-200">Prev</a> ';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        $active = ($i == $page)
            ? 'bg-green-700 text-white px-3 py-1 rounded'
            : 'bg-green-100 text-green-700 px-3 py-1 rounded hover:bg-green-200';
        $pagination_links .= '<a href="?page='.$i.'" class="'.$active.'">'.$i.'</a> ';
    }

    if ($page < $total_pages) {
        $pagination_links .= '<a href="?page='.($page + 1).'" class="bg-green-100 text-green-700 px-3 py-1 rounded hover:bg-green-200">Next</a>';
    }

    
    $data['users'] = $users;
    $data['pagination_links'] = $pagination_links;

    $this->call->view('user/view', $data);
}

    public function create()
    {
        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email    = $this->io->post('email');

            if (!empty($username) && !empty($email)) {
                $this->UserModel->insert([
                    'username' => $username,
                    'email'    => $email
                ]);
                redirect('/'); 
            } else {
                $data['error'] = "All fields are required!";
                $this->call->view('user/create', $data);
            }
        } else {
            $this->call->view('user/create');
        }
    }

    
    public function update($id)
    {
        $user = $this->UserModel->find($id);

        if (!$user) {
            redirect('/'); 
        }

        if ($this->io->method() === 'post') {
            $username = $this->io->post('username');
            $email    = $this->io->post('email');

            if (!empty($username) && !empty($email)) {
                $this->UserModel->update($id, [
                    'username' => $username,
                    'email'    => $email
                ]);
                redirect('/'); 
            } else {
                $data['user'] = $user;
                $data['error'] = "All fields are required!";
                $this->call->view('user/update', $data);
            }
        } else {
            $this->call->view('user/update', ['user' => $user]);
        }
    }

    
    public function delete($id)
    {
        $this->UserModel->delete($id);
        redirect('/');
    }
}
