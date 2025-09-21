<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    
public function get_paginated($limit, $offset)
{
    return $this->db->table($this->table)
                    ->order_by('id', 'ASC')
                    ->limit($limit, $offset)
                    ->get_all();
}

public function count_all_users()
{
    return $this->db->table($this->table)->count();
}

}
