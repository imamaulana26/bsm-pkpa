<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function faker_kop()
	{
		require_once 'vendor/autoload.php';
		// use the factory to create a Faker\Generator instance
		$faker = Faker\Factory::create('id_ID');

		$arr_pemb = array('Eksekuting', 'Channeling');
		$arr_tjn = array('Modal Kerja', 'Investasi', 'Refinancing');

		for ($i = 0; $i < 50; $i++) {
			$data = array(
				'nm_koperasi' => $faker->company,
				'noloan' => 'LD' . $faker->regexify('[0-9]{9,10}'),
				'cif' => $faker->regexify('[0-9]{9}'),
				'jns_pembiayaan' => $arr_pemb[rand(0, 1)],
				'tujuan_pembiayaan' => $arr_tjn[rand(0, 2)],
				'batch_cair' => $faker->randomDigit,
				'tgl_pencairan' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'plafond_cair' => rand(),
				'ospokok' => rand()
			);

			$dt_anggota = array(
				'noloan_kop' => $data['noloan'],
				'nocif_anggota' => $faker->regexify('[0-9]{9}'),
				'noloan_anggota' => 'LD' . $faker->regexify('[0-9]{9,10}'),
				'nama_anggota' => $faker->name(),
				'pencairan_anggota' => rand(),
				'ospokok_anggota' => rand()
			);

			$this->db->insert('tbl_koperasi', $data);
			$this->db->insert('tbl_anggota', $dt_anggota);
		}

		redirect(base_url());
	}
}
