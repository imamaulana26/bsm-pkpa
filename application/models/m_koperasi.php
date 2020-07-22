<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_koperasi extends CI_Model
{
	private $table = 'tbl_koperasi';

	public function list_koperasi()
	{
		$data = $this->db->select('a.*, count(b.nocif_anggota) as anggota')->from('tbl_koperasi a')->join('tbl_anggota b', 'a.noloan = b.noloan_kop', 'left')
			->group_by('a.cif')->get()->result_array();
		return $data;
	}

	public function get_koperasi($key)
	{
		$data = $this->db->get_where($this->table, ['noloan' => $key]);
		return $data;
	}

	public function get_anggota($key)
	{
		// $data = $this->db->select('*')->from('tbl_koperasi a')->join('tbl_anggota b', 'a.noloan = b.noloan_kop', 'left')
		// 	->where(['b.noloan_kop' => $key])->get();

		$data = array(
			'koperasi' => $this->db->get_where($this->table, ['noloan' => $key])->row_array(),
			'anggota' => $this->db->get_where('tbl_anggota', ['noloan_kop' => $key])->result_array()
		);
		return $data;
	}

	public function simpan($data)
	{
		$this->db->insert($this->table, $data);

		return true;
	}

	public function sunting($key, $data)
	{
		$this->db->update($this->table, $data, ['noloan' => $key]);

		return true;
	}

	public function hapus($key)
	{
		$this->db->delete($this->table, ['noloan' => $key]);
		$this->db->delete('tbl_anggota', ['noloan_kop' => $key]);
	}
}
