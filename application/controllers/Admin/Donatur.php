<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$content = 'admin/donatur';

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content);
	}
}
