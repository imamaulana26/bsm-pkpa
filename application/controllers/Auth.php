<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	private $tabel = 'tbl_user';

	function __construct()
	{
		parent::__construct();

		$this->load->model('M_auth', 'm_auth');
	}

	public function index()
	{
		$page = 'login';
		$data['title'] = 'BSM - Rekonsel PKPA';

		$isLogin = $this->session->userdata('login');

		if (empty($isLogin)) {
			$this->load->view($page, $data);
		} else {
			redirect('block');
		}
	}

	public function login()
	{
		$username = input('username');
		$password = md5(input('password'));

		$this->m_auth->login($username, $password);
	}

	public function logout()
	{
		$this->m_auth->logout();
	}
}
