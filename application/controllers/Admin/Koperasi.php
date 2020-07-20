<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koperasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_koperasi', 'm_kop');
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nm_koperasi', 'Nama Koperasi', 'trim|required');
		$this->form_validation->set_rules('noloan', 'No. LOAN', 'trim|required|is_unique[tbl_koperasi.noloan]');
		$this->form_validation->set_rules('nocif', 'No. CIF', 'trim|required|numeric');
		$this->form_validation->set_rules('jns_pembiayaan', 'Jenis Pembiayaan', 'trim|required|alpha');
		$this->form_validation->set_rules('tujuan_pembiayaan', 'Tujuan Pembiayaan', 'trim|required');
		$this->form_validation->set_rules('batch', 'Batch Pencairan', 'trim|required|numeric');
		$this->form_validation->set_rules('tgl_cair', 'Tgl. Pencairan', 'trim|required');
		$this->form_validation->set_rules('plafond_cair', 'Plafond Pencairan', 'trim|required');
		$this->form_validation->set_rules('ospokok', 'OS Pokok', 'trim|required');

		$this->form_validation->set_message('required', '{field} belum terisi!');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka!');
		$this->form_validation->set_message('alpha', '{field} harus berupa alphabet!');
		$this->form_validation->set_message('alpha_numeric', '{field} tidak valid!');
	}

	public function index()
	{
		$content = 'admin/koperasi/beranda';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">' . static::class . '</li>';
		$data['list'] = $this->m_kop->list_koperasi();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function anggota($id)
	{
		$content = 'admin/anggota/beranda';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item"><a href="' . site_url('admin/koperasi') . '">Koperasi</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">Daftar Anggota</li>';
		$data['list'] = $this->m_kop->get_anggota($id)->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function tambah()
	{
		$content = 'admin/koperasi/tambah';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item"><a href="' . site_url('admin/koperasi') . '">Koperasi</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">Tambah Koperasi</li>';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function save()
	{
		$this->_validation();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nm_koperasi' => input('nm_koperasi'),
				'noloan' => input('noloan'),
				'cif' => input('nocif'),
				'jns_pembiayaan' => input('jns_pembiayaan'),
				'tujuan_pembiayaan' => input('tujuan_pembiayaan'),
				'batch_cair' => input('batch'),
				'tgl_pencairan' => input('tgl_cair'),
				'plafond_cair' => str_replace(',', '', input('plafond_cair')),
				'ospokok' => str_replace(',', '', input('ospokok'))
			);

			$result = $this->m_kop->simpan($data);
			if ($result == true) {
				$msg = "Data koperasi " . $data['nm_koperasi'] . " berhasil disimpan";

				$this->session->set_flashdata('msg', $msg);
				$this->index();
			} else {
				$msg = "Data koperasi gagal disimpan!";

				$this->session->set_flashdata('msg', $msg);
				$this->tambah();
			}
		}
	}

	public function sunting($key)
	{
		$content = 'admin/koperasi/sunting';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item"><a href="' . site_url('admin/koperasi') . '">Koperasi</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">Sunting Koperasi</li>';
		$data['data'] = $this->m_kop->get_koperasi($key)->row_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content, $data);
	}

	public function update()
	{
		$key = input('noloan');

		$this->form_validation->set_rules('nm_koperasi', 'Nama Koperasi', 'trim|required');
		$this->form_validation->set_rules('noloan', 'No. LOAN', 'trim|required');
		$this->form_validation->set_rules('nocif', 'No. CIF', 'trim|required|numeric');
		$this->form_validation->set_rules('jns_pembiayaan', 'Jenis Pembiayaan', 'trim|required|alpha');
		$this->form_validation->set_rules('tujuan_pembiayaan', 'Tujuan Pembiayaan', 'trim|required');
		$this->form_validation->set_rules('batch', 'Batch Pencairan', 'trim|required|numeric');
		$this->form_validation->set_rules('tgl_cair', 'Tgl. Pencairan', 'trim|required');
		$this->form_validation->set_rules('plafond_cair', 'Plafond Pencairan', 'trim|required');
		$this->form_validation->set_rules('ospokok', 'OS Pokok', 'trim|required');

		$this->form_validation->set_message('required', '{field} belum terisi!');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka!');
		$this->form_validation->set_message('alpha', '{field} harus berupa alphabet!');
		$this->form_validation->set_message('alpha_numeric', '{field} tidak valid!');

		if ($this->form_validation->run() == FALSE) {
			$this->sunting($key);
		} else {
			$data = array(
				'nm_koperasi' => input('nm_koperasi'),
				'cif' => input('nocif'),
				'jns_pembiayaan' => input('jns_pembiayaan'),
				'tujuan_pembiayaan' => input('tujuan_pembiayaan'),
				'batch_cair' => input('batch'),
				'tgl_pencairan' => input('tgl_cair'),
				'plafond_cair' => str_replace(',', '', input('plafond_cair')),
				'ospokok' => str_replace(',', '', input('ospokok'))
			);

			$result = $this->m_kop->sunting($key, $data);
			if ($result == true) {
				$msg = "Data koperasi " . $data['nm_koperasi'] . " berhasil disimpan";

				$this->session->set_flashdata('msg', $msg);
				$this->index();
			} else {
				$msg = "Data koperasi gagal disimpan!";

				$this->session->set_flashdata('error', $msg);
				$this->sunting($key);
			}
		}
	}

	public function delete($key)
	{
		$this->m_kop->hapus($key);

		echo json_encode(['status' => true]);
		exit;
	}
}
