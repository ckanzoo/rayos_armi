<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel'); // Load UserModel
    }

    public function index()
    {
        // ✅ Safe defaults
        $page  = (int) ($this->io->get('page') ?? 1);
        $q     = trim($this->io->get('q') ?? '');
        $limit = 5; // records per page

        // Fetch paginated & filtered users
        $all = $this->UserModel->get_paginated($q, $limit, $page);
        $data['users'] = $all['records'];
        $total_rows    = $all['total_rows'];

        // Build pagination path
        $pagination_path = '/?';
        if ($q !== '') {
            $pagination_path .= 'q=' . urlencode($q) . '&';
        }

        // Configure pagination
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => 'page='
        ]);
        $this->pagination->set_theme('tailwind');
        $this->pagination->initialize($total_rows, $limit, $page, $pagination_path);

        $data['page'] = $this->pagination->paginate();
        $data['q']    = $q;

        // Load view
        $this->call->view('user/view', $data);
    }

    public function create()
    {
        if ($this->io->method() === 'post') {
            $username = trim($this->io->post('username'));
            $email    = trim($this->io->post('email'));

            if ($username !== '' && $email !== '') {
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
        if (!$user) redirect('/');

        if ($this->io->method() === 'post') {
            $username = trim($this->io->post('username'));
            $email    = trim($this->io->post('email'));

            if ($username !== '' && $email !== '') {
                $this->UserModel->update($id, [
                    'username' => $username,
                    'email'    => $email
                ]);
                redirect('/');
            } else {
                $data['user']  = $user;
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
