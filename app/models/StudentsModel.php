<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsModel extends Model {
    protected $table = 'students';

    /** CREATE ACCOUNT */
    public function create_account($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    /** FIND USER BY EMAIL */
    public function find_by_email($email)
    {
        $sql = "SELECT * FROM {$this->table} WHERE email = ? AND deleted_at IS NULL LIMIT 1";
        $stmt = $this->db->raw($sql, [$email]);

        return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
    }

    /** GET ALL STUDENTS (with pagination + search + deleted filter) */
    public function get_all($page = 1, $per_page = 10, $search = '', $with_deleted = false)
    {
        $sql = "SELECT * FROM {$this->table} WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if ($with_deleted) {
            $sql .= " AND deleted_at IS NOT NULL";
        } else {
            $sql .= " AND deleted_at IS NULL";
        }

        $offset = ($page - 1) * $per_page;
        $sql .= " ORDER BY id ASC LIMIT {$per_page} OFFSET {$offset}";

        $stmt = $this->db->raw($sql, $params);
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
    }

    /** COUNT ALL (for pagination) */
    public function count_all($search = '', $with_deleted = false)
    {
        $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (first_name LIKE ? OR last_name LIKE ? OR email LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        if ($with_deleted) {
            $sql .= " AND deleted_at IS NOT NULL";
        } else {
            $sql .= " AND deleted_at IS NULL";
        }

        $stmt = $this->db->raw($sql, $params);
        $row = $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;

        return $row ? (int) $row['total'] : 0;
    }

    /** INSERT */
    public function insert($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    /** UPDATE */
    public function update($id, $data)
    {
        return $this->db->table($this->table)->where('id', $id)->update($data);
    }

    /** SOFT DELETE */
    public function soft_delete($id)
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }

    /** RESTORE */
    public function restore($id)
    {
        return $this->db->table($this->table)
            ->where('id', $id)
            ->update(['deleted_at' => null]);
    }

    /** HARD DELETE */
    public function delete($id)
    {
        return $this->db->table($this->table)->where('id', $id)->delete();
    }

    /** FIND BY ID */
    public function find($id, $with_deleted = false)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $params = [$id];

        if (!$with_deleted) {
            $sql .= " AND deleted_at IS NULL";
        }

        $sql .= " LIMIT 1";

        $stmt = $this->db->raw($sql, $params);
        return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
    }
}

