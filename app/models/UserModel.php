<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_paginated($q = '', $limit = 5, $page = 1) {
        $query = $this->db->table($this->table);

        // Apply search filter
        if (!empty($q)) {
            $query->like('username', $q)
                  ->or_like('email', $q);
        }

        // Count total rows matching search
        $countQuery = clone $query;
        $total_rows = $countQuery->select_count('*', 'count')->get()['count'];

        // Fetch paginated records
        $records = $query->order_by('id', 'ASC')
                         ->pagination($limit, $page)
                         ->get_all();

        return [
            'records'    => $records,
            'total_rows' => $total_rows
        ];
    }
}
