<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	private $table = 'tbl_user';

	public function login($username, $password)
	{
		if (!empty($username) && !empty($password)) {
			$user = $this->db->get_where($this->table, ['username' => $username])->row_array();
			if ($user) {
				if ($user['is_active'] == 1) {
					if ($user['is_login'] == 0) {
						if ($user['password'] == $password) {
							$sess = array(
								'role' => $user['role'],
								'nama' => $user['full_name'],
								'email' => $user['email'],
								'login' => true
							);
							$this->session->set_userdata($sess);
							$this->db->update($this->table, ['is_login' => 1], ['email' => $user['email']]);

							if ($user['role'] == 'admin') {
								redirect('admin/beranda');
							} else {
								redirect('koperasi/beranda');
							}
						} else {
							$msg = "<div class='alert alert-danger' role='alert'><b>Password salah!<b/></div>";

							$this->session->set_flashdata('msg', $msg);
							redirect('auth');
						}
					} else {
						$msg = "<div class='alert alert-danger' role='alert'><b>Akun sedang digunakan!<b/></div>";

						$this->session->set_flashdata('msg', $msg);
						redirect('auth');
					}
				} else {
					$msg = "<div class='alert alert-danger' role='alert'><b>Akun sudah tidak aktif!<b/></div>";

					$this->session->set_flashdata('msg', $msg);
					redirect('auth');
				}
			} else {
				$msg = "<div class='alert alert-danger' role='alert'><b>Akun tidak ditemukan!<b/></div>";

				$this->session->set_flashdata('msg', $msg);
				redirect('auth');
			}
		} else {
			$msg = "<div class='alert alert-danger' role='alert'><b>Username atau Password belum terisi!<b/></div>";

			$this->session->set_flashdata('msg', $msg);
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->db->update($this->table, ['is_login' => 0, 'last_login' => date('Y-m-d H:i:s')], ['email' => $this->session->userdata('email')]);
		$this->session->sess_destroy();

		redirect('auth');
	}
}
