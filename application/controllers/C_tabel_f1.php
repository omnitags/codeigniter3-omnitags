<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';


class C_tabel_f1 extends Omnitags
{
	// Pages
	// Public Pages

	// Account Only Pages
	public function daftar()
	{
		$this->declarew();
		$this->page_session_5();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_get['tabel_f1_field11_filter1'];
		$param2 = $this->v_get['tabel_f1_field11_filter2'];
		$param3 = $this->v_get['tabel_f1_field12_filter1'];
		$param4 = $this->v_get['tabel_f1_field12_filter2'];

		$param5 = userdata($this->aliases['tabel_c2_field1']);

		$filter = $this->tl_f1->filter_user_with_e4($param1, $param2, $param3, $param4, $param5);

		if (empty($param1)) {
			$result = $this->tl_f1->get_f1_with_e4_by_c2_field1($param5);
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_f1_alias_v2_title'),
			'konten' => $this->v2['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $result,

			// menggunakan nilai $cek_in_min, $cek_in_max, $cek_out_min dan $cek_out_max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$this->load_page('tabel_f1', '_layouts/template', $data1);
	}

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_4();

		// nilai min dan max di sini belum ada
		$param1 = $this->v_get['tabel_f1_field11_filter1'];
		$param2 = $this->v_get['tabel_f1_field11_filter2'];
		$param3 = $this->v_get['tabel_f1_field12_filter1'];
		$param4 = $this->v_get['tabel_f1_field12_filter2'];

		$filter = $this->tl_f1->get_f1_by_field($param1, $param2, $param3, $param4);

		if (empty($param1)) {
			$result = $this->tl_f1->get_f1_with_e4();
		} else {
			$result = $filter;
		}

		$data1 = array(
			'title' => lang('tabel_f1_alias_v3_title'),
			'konten' => $this->v3['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $result,

			// menggunakan nilai $min dan $max sebagai bagian dari $data
			'tabel_f1_field11_filter1_value' => $param1,
			'tabel_f1_field11_filter2_value' => $param2,
			'tabel_f1_field12_filter1_value' => $param3,
			'tabel_f1_field12_filter2_value' => $param4,
		);

		$this->load_page('tabel_f1', '_layouts/template', $data1);
	}

	// public function delete($tabel_f1_field1 = null)
	// {
	// 	$this->declarew();

	// 	$aksi = $this->tl_f1->delete_f1($tabel_f1_field1);
	// 	redirect($_SERVER['HTTP_REFERER']); 
	// redirect(site_url($this->language_code . '/' . $this->aliases['tabel_f1/admin'));
	// }

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_4();

		$data1 = array(
			'title' => lang('tabel_f1_alias_v4_title'),
			'konten' => $this->v4['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $this->tl_f1->get_f1_with_e4(),
		);

		$this->load_page('tabel_f1', '_layouts/printpage', $data1);
	}

	public function print($tabel_f1_field1 = null)
	{
		$this->declarew();
		$allowed_values = [
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);

		$tabel = $this->tl_f1->get_f1_by_f1_field1($tabel_f1_field1);
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_f1_alias_v5_title'),
			'konten' => $this->v5['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $this->tl_f1->get_f1_with_e4_by_f1_field1($tabel_f1_field1),
		);

		$this->load_page('tabel_f1', '_layouts/printpage', $data1);
	}

	// Archive Page
	public function archive()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_f1_alias_v9_title'),
			'konten' => $this->v9['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $this->tl_f1->get_all_f1_archive(),
		);

		$this->load_page('tabel_f1', '_layouts/template', $data1);
	}

	// Public Pages
	public function detail_archive($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f1->get_f1_by_field('tabel_f1_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_f1_alias_v10_title'),
			'konten' => $this->v10['tabel_f1'],
			'dekor' => $this->tl_f1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $this->tl_f1->get_f1_by_field_archive('tabel_f1_field1', $param1),
		);

		$this->load_page('tabel_f1', '_layouts/template', $data1);
	}
	
	public function history($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_f1->get_f1_by_field('tabel_f1_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'table_id' => $param1,
			'title' => lang('tabel_f1_alias_v11_title'),
			'konten' => $this->v11['tabel_f1'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_f1']),
			'tbl_f1' => $this->tl_ot->get_by_field_history('tabel_f1', 'tabel_f1_field1', $param1),
		);

		$this->load_page('tabel_f1', '_layouts/template', $data1);
	}

	//Push History Data into current data
	public function push($code = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel = $this->tl_ot->get_by_id_history('tabel_f1', $code)->result();
		$this->check_data($tabel);

		// menggunakan nama khusus sama dengan konfigurasi
		$data = array(
			$this->aliases['tabel_f1_field1'] => $tabel[0]->{$this->aliases['tabel_f1_field1']},
			$this->aliases['tabel_f1_field2'] => $tabel[0]->{$this->aliases['tabel_f1_field2']},

			'updated_at' => date("Y-m-d\TH:i:s"),
			'updated_by' => userdata($this->aliases['tabel_c2_field1']),
		);

		$aksi = $this->tl_f1->update_f1($data, $tabel[0]->{$this->aliases['tabel_f1_field1']});

		redirect($_SERVER['HTTP_REFERER']);
	}
}
