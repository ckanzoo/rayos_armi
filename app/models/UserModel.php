<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function page($q, $limit, $page)
    {
        $query = $this->db->table($this->table);

        if (!empty($q)) {
            $query->like('id', '%'.$q.'%')
                  ->or_like('username', '%'.$q.'%')
                  ->or_like('email', '%'.$q.'%');
        }

        // Count total
        $countQuery = clone $query;
        $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

        // Get records with pagination
        $data['records'] = $query->pagination($limit, $page)->get_all();

        return $data;
    }
}
