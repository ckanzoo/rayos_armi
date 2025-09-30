<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsController extends Controller {
    private $per_page = 10; // default per page; palitan kung kailangan

    public function __construct()
    {
        parent::__construct();
        $this->call->library('session');
        $this->call->model('StudentsModel');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    private function require_admin()
{
    if ($this->session->userdata('role') !== 'admin') {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://cdn.tailwindcss.com"></script>
            <title>Access Denied</title>
            <script>
                // Auto-redirect after 3 seconds
                setTimeout(function() {
                    window.location.href = "/students/view_only";
                }, 3000);
            </script>
        </head>
        <body class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="text-center bg-white p-10 rounded-2xl shadow-xl max-w-lg">
                <div class="text-red-600 text-6xl mb-4">🚫</div>
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Access Denied</h1>
                <p class="text-gray-600 mb-6">
                    Only <span class="font-semibold text-red-500">admins</span> can access this page.
                </p>
                <a href="/students/view_only" 
                   class="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                    ⬅️ Back to Students
                </a>
                <p class="text-sm text-gray-500 mt-4">(Redirecting in 3 seconds...)</p>
            </div>
        </body>
        </html>';
        exit;
    }
}


  
    public function get_all()
    {
        $this->require_admin();

        $page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $show_deleted = (isset($_GET['show']) && $_GET['show'] === 'deleted') ? true : false;

        $records = $this->StudentsModel->get_all($page, $this->per_page, $search, $show_deleted);
        $total = $this->StudentsModel->count_all($search, $show_deleted);

        $pagination_links = $this->generate_pagination($page, $total, $this->per_page, $search, $show_deleted);

        $this->call->view('ui/get_all', [
            'records' => $records,
            'students' => $records,
            'page' => $page,
            'per_page' => $this->per_page,
            'search' => $search,
            'show_deleted' => $show_deleted,
            'pagination_links' => $pagination_links,
            'role' => 'admin',
            'upload_url' => '/uploads/'
        ]);
    }

    public function view_only()
    {
        $page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        $show_deleted = false; // users cannot see deleted items

        $records = $this->StudentsModel->get_all($page, $this->per_page, $search, $show_deleted);
        $total = $this->StudentsModel->count_all($search, $show_deleted);

        $pagination_links = $this->generate_pagination($page, $total, $this->per_page, $search, $show_deleted);

        $this->call->view('ui/get_all', [
            'records' => $records,
            'students' => $records,
            'page' => $page,
            'per_page' => $this->per_page,
            'search' => $search,
            'show_deleted' => $show_deleted,
            'pagination_links' => $pagination_links,
            'role' => 'user',
            'upload_url' => '/uploads/'
        ]);
    }


    public function create()
    {
        $this->require_admin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->StudentsModel->insert($_POST);
            redirect('students/get-all');
        }

        $this->call->view('ui/create', [
            'role' => $this->session->userdata('role')
        ]);
    }


    public function update($id)
    {
        $this->require_admin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->StudentsModel->update($id, $_POST);
            redirect('students/get-all');
        }

        $student = $this->StudentsModel->find($id);
        $this->call->view('ui/update', [
            'user' => $student,
            'role' => $this->session->userdata('role')
        ]);
    }

    public function delete($id)
    {
        $this->require_admin();
        $this->StudentsModel->soft_delete($id);
        redirect('students/get-all');
    }

    public function restore($id)
    {
        $this->require_admin();
        $this->StudentsModel->restore($id);
        redirect('students/get-all?show=deleted');
    }

    public function hard_delete($id)
    {
        $this->require_admin();
        $this->StudentsModel->delete($id);
        redirect('students/get-all?show=deleted');
    }

    private function generate_pagination($page, $total, $per_page, $search = '', $show_deleted = false)
{
    $pages = (int) ceil($total / $per_page);
    if ($pages <= 1) return '';

    $query_base = [];
    if ($search !== '') $query_base['search'] = $search;
    if ($show_deleted) $query_base['show'] = 'deleted';

    $html = '<ul>';

    // ⏮️ First
    if ($page > 1) {
        $query = $query_base;
        $query['page'] = 1;
        $qs = http_build_query($query);
        $html .= "<li><a href='?{$qs}'>⏮️ First</a></li>";
    } else {
        $html .= "<li><span class='disabled'>⏮️ First</span></li>";
    }

    // ← Prev
    if ($page > 1) {
        $query = $query_base;
        $query['page'] = $page - 1;
        $qs = http_build_query($query);
        $html .= "<li><a href='?{$qs}'>← Prev</a></li>";
    } else {
        $html .= "<li><span class='disabled'>← Prev</span></li>";
    }

    // Page numbers
    for ($i = 1; $i <= $pages; $i++) {
        $query = $query_base;
        $query['page'] = $i;
        $qs = http_build_query($query);
        $active = ($i === $page) ? 'active' : '';
        $html .= "<li><a href='?{$qs}' class='{$active}'>{$i}</a></li>";
    }

    // Next →
    if ($page < $pages) {
        $query = $query_base;
        $query['page'] = $page + 1;
        $qs = http_build_query($query);
        $html .= "<li><a href='?{$qs}'>Next →</a></li>";
    } else {
        $html .= "<li><span class='disabled'>Next →</span></li>";
    }

    // ⏭️ Last
    if ($page < $pages) {
        $query = $query_base;
        $query['page'] = $pages;
        $qs = http_build_query($query);
        $html .= "<li><a href='?{$qs}'>Last ⏭️</a></li>";
    } else {
        $html .= "<li><span class='disabled'>Last ⏭️</span></li>";
    }

    $html .= '</ul>';
    return $html;
}

}

