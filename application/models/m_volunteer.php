<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_volunteer extends CI_Model {
    private $table = 'tbl_volunteer';

	public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getWhere($cond)
    {
        return $this->db->get_where($this->table, $cond);
    }

    public function save($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($update)
    {
        return $this->db->update($this->table, $update);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, $id);
    }
}
