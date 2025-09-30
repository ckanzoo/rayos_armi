<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->library('form_validation');
        $this->call->model('StudentsModel');
    }

    /** LOGIN */
    public function login()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->name('email')->required()->valid_email();
            $this->form_validation->name('password')->required()->min_length(6);

            if ($this->form_validation->run()) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                $user = $this->StudentsModel->find_by_email($email);

                if ($user && password_verify($password, $user['password'])) {
                    $this->session->set_userdata('logged_in', true);
                    $this->session->set_userdata('user_id', $user['id']);
                    $this->session->set_userdata('role', $user['role']);

                    if ($user['role'] === 'admin') {
                        redirect('students/get-all');
                    } else {
                        redirect('students/view_only');
                    }
                    return;
                } else {
                    $error = "Invalid email or password.";
                }
            } else {
                $error = "Invalid form input.";
            }
        }

        $this->call->view('auth/login', ['error' => $error]);
    }

    /** REGISTER */
    public function register()
    {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->name('first_name')->required();
            $this->form_validation->name('last_name')->required();
            $this->form_validation->name('email')->required()->valid_email();
            $this->form_validation->name('password')->required()->min_length(6);
            $this->form_validation->name('role')->required();

            if ($this->form_validation->run()) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $role = $_POST['role'];

                if ($this->StudentsModel->find_by_email($email)) {
                    $error = "Email already exists.";
                } else {
                    $this->StudentsModel->create_account([
                        'first_name' => $_POST['first_name'],
                        'last_name'  => $_POST['last_name'],
                        'email'      => $email,
                        'password'   => password_hash($password, PASSWORD_DEFAULT),
                        'role'       => $role
                    ]);
                    redirect('auth/login');
                    return;
                }
            } else {
                $error = "Invalid form input.";
            }
        }

        $this->call->view('auth/register', ['error' => $error]);
    }

    /** LOGOUT */
    public function logout()
    {
        $this->session->unset_userdata(['logged_in','user_id','role']);
        redirect('auth/login');
    }
}

