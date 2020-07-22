<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_anggota', 'm_anggota');
	}

	public function index()
	{
		$content = 'admin/anggota';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('noloan', 'No. LOAN', 'trim|required|is_unique[tbl_anggota.noloan_anggota]');
		$this->form_validation->set_rules('nocif', 'No. CIF', 'trim|required|numeric');
		$this->form_validation->set_rules('nm_anggota', 'Nama Anggota', 'trim|required');
		$this->form_validation->set_rules('pencairan_anggota', 'Plafond Pencairan', 'trim|required');
		$this->form_validation->set_rules('ospokok_anggota', 'OS Pokok', 'trim|required');

		$this->form_validation->set_message('required', '{field} belum terisi!');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka!');
	}

	public function tambah($id)
	{
		$content = 'admin/anggota/tambah';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item"><a href="' . site_url('admin/koperasi') . '">Koperasi</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>';
		$data['koperasi'] = $this->db->get_where('tbl_koperasi', ['noloan' => $id])->row_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function save()
	{
		$id = input('noloan_kop');
		$this->_validation();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah($id);
		} else {
			$data = array(
				'noloan_kop' => $id,
				'noloan_anggota' => input('noloan'),
				'nocif_anggota' => input('nocif'),
				'nama_anggota' => input('nm_anggota'),
				'pencairan_anggota' => str_replace(',', '', input('pencairan_anggota')),
				'ospokok_anggota' => str_replace(',', '', input('ospokok_anggota'))
			);

			$result = $this->m_anggota->simpan($data);
			if ($result == true) {
				$msg = "Data anggota koperasi berhasil disimpan";

				$this->session->set_flashdata('msg', $msg);
				redirect(site_url('admin/koperasi/anggota/' . $id));
			} else {
				$msg = "Data koperasi gagal disimpan!";

				$this->session->set_flashdata('msg', $msg);
				$this->tambah($id);
			}
		}
	}

	public function sunting($id)
	{
		$content = 'admin/anggota/sunting';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item"><a href="' . site_url('admin/koperasi') . '">Koperasi</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">Sunting Anggota</li>';
		$data['data'] = $this->m_anggota->get_anggota($id)->row_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function update()
	{
		$id = input('noloan_kop');
		$key = input('id');

		$data = array(
			'noloan_anggota' => input('noloan'),
			'nocif_anggota' => input('nocif'),
			'nama_anggota' => input('nm_anggota'),
			'pencairan_anggota' => str_replace(',', '', input('pencairan_anggota')),
			'ospokok_anggota' => str_replace(',', '', input('ospokok_anggota')),
			'updateDate' => date('Y-m-d H:i:s')
		);

		$result = $this->m_anggota->sunting($key, $data);
		if ($result == true) {
			$msg = "Data anggota " . $data['nama_anggota'] . " berhasil disimpan";

			$this->session->set_flashdata('msg', $msg);
			redirect(site_url('admin/koperasi/anggota/' . $id));
		} else {
			$msg = "Data anggota gagal disimpan!";

			$this->session->set_flashdata('error', $msg);
			$this->sunting($key);
		}
	}

	public function delete($key)
	{
		$this->m_anggota->hapus($key);

		echo json_encode(['status' => true]);
		exit;
	}
}
