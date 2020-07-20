<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	private $tabel = 'tbl_user';

	function __construct()
	{
		parent::__construct();
		// is_login();

		$this->load->model('M_auth', 'm_auth');
	}

	public function index()
	{
		$page = 'login';
		$data['title'] = 'BSM - Rekonsel PKPA';

		$this->load->view($page, $data);
	}

	public function login()
	{
		$username = input('username');
		$password = md5(input('password'));

		$data['reset'] = $this->m_auth->reset($username)->row_array();
		if ($data['reset']['logout'] == 1) {
			$this->db->update('tbl_user', ['is_login' => 0, 'last_login' => date('Y-m-d H:i:s')], ['email' => $data['reset']['email']]);
		}
		$this->m_auth->login($username, $password);
	}

	public function logout()
	{
		$this->m_auth->logout();
	}
}
