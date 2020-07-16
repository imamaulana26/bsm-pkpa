<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Koperasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nm_koperasi', 'Nama Koperasi', 'trim|required|alpha');
		$this->form_validation->set_rules('noloan', 'No. LOAN', 'trim|required');
		$this->form_validation->set_rules('nocif', 'No. CIF', 'trim|required|numeric');
		$this->form_validation->set_rules('jns_pembiayaan', 'Jenis Pembiayaan', 'trim|required|alpha');
		$this->form_validation->set_rules('tujuan_pembiayaan', 'Tujuan Pembiayaan', 'trim|required|alpha');
		$this->form_validation->set_rules('batch', 'Batch Pencairan', 'trim|required|numeric');
		$this->form_validation->set_rules('tgl_cair', 'Tgl. Pencairan', 'trim|required');
		$this->form_validation->set_rules('plafond_cair', 'Plafond Pencairan', 'trim|required|numeric');
		$this->form_validation->set_rules('ospokok', 'OS Pokok', 'trim|required|numeric');

		$this->form_validation->set_message('required', '{field} belum terisi!');
		$this->form_validation->set_message('numeric', '{field} harus berupa angka!');
		$this->form_validation->set_message('alpha', '{field} harus berupa alphabet!');
	}

	public function index()
	{
		$content = 'admin/koperasi/beranda';
		$data['breadcrumb'] = '<li class="breadcrumb-item"><a href="' . site_url('admin/beranda') . '">Dashboard</a></li>';
		$data['breadcrumb'] .= '<li class="breadcrumb-item active" aria-current="page">' . static::class . '</li>';

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
			echo "sukses";
		}
	}
}
