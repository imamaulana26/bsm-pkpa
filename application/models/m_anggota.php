<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_anggota extends CI_Model
{
	private $table = 'tbl_anggota';

	function get_anggota($key)
	{
		$data = $this->db->select('*')->from('tbl_koperasi a')->join('tbl_anggota b', 'a.noloan = b.noloan_kop', 'left')
			->where(['b.noloan_anggota' => $key])->get();
		return $data;
	}

	public function simpan($data)
	{
		$this->db->insert($this->table, $data);

		return true;
	}

	public function sunting($key, $data)
	{
		$this->db->update($this->table, $data, ['id' => $key]);

		return true;
	}

	public function hapus($key)
	{
		$this->db->delete($this->table, ['noloan_anggota' => $key]);
	}
}
