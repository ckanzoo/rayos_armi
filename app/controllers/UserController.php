<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('UserModel');
    }

    public function index()
    {
        // Current page
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;

        // Search query
        $q = isset($_GET['q']) ? trim($_GET['q']) : '';

        $per_page = 5;

        // Get records + total count from model
        $result = $this->UserModel->page($q, $per_page, $page);
        $data['users'] = $result['records'];
        $total_rows = $result['total_rows'];

        // Pagination config (Lavalust built-in)
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next ›',
            'prev_link'      => '‹ Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('tailwind');
        $this->pagination->initialize($total_rows, $per_page, $page, site_url() . '?q=' . urlencode($q));

        $data['page'] = $this->pagination->paginate();

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
        if (!$user) redirect('/');

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
