<?php
defined('BASEPATH') or exit('No direct script access allowed');

include 'Omnitags.php';

class C_tabel_e4 extends Omnitags
{
	// Pages
	// Public Pages
	public function index()
	{
		$this->declarew();
		$this->session_all();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v1_title'),
			'konten' => $this->v1['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
			'tbl_e2' => $this->tl_e2->get_all_e2(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Public Pages
	public function detail($param1 = null)
	{
		$this->declarew();
		$this->page_session_all();

		$tabel = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $param1)->result();
		$this->check_data($tabel);

		$data1 = array(
			'title' => lang('tabel_e4_alias_v8_title'),
			'konten' => $this->v8['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_b2']),
			'tbl_e4' => $this->tl_e4->get_e4_by_field('tabel_e4_field1', $param1),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Account Only Pages

	// Admin Pages
	public function admin()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v3_title'),
			'konten' => $this->v3['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/template', $data);
	}

	// Print all data
	public function laporan()
	{
		$this->declarew();
		$this->page_session_3();

		$data1 = array(
			'title' => lang('tabel_e4_alias_v4_title'),
			'konten' => $this->v4['tabel_e4'],
			'dekor' => $this->tl_b1->dekor($this->theme_id, $this->aliases['tabel_e4']),
			'tbl_e4' => $this->tl_e4->get_all_e4(),
		);

		$data = array_merge($data1, $this->package);

		set_userdata('previous_url', current_url());
		load_view_data('_layouts/printpage', $data);
	}

	/**
	 * Handles the submission of the form for adding new data to the 'tabel_e4' table.
	 *
	 * This function validates the form input and if successful, inserts the data into the 'tabel_e4' table.
	 * It then redirects the user back to the previous page with a notification message.
	 *
	 * @return void
	 */
	// Functions
	// Add data
	public function tambah()
	{
		$this->declarew();
		$this->session_3();

		validate_all(
			array(
				$this->v_post['tabel_e4_field2'],
			),
			$this->views['flash2'],
			'tambah'
		);

		$new_name = $this->v_post['tabel_e4_field2'];
			$path = $this->v_upload_path['tabel_e4'];

			$config['upload_path'] = $path;
			$config['allowed_types'] = $this->file_type1;
			$config['file_name'] = $new_name;
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;

			$this->load->library('upload', $config);
			$upload = $this->upload->do_upload($this->v_input['tabel_e4_field3_input']);

			if (!$upload) {
				// Di sini seharusnya ada notifikasi modal kalau upload tidak berhasil
				// Tapi karena formnya sudah required saya rasa tidak perlu
				set_flashdata($this->views['flash2'], $this->flash_msg2['tabel_e4_field3_alias']);
				set_flashdata('modal', $this->views['flash2_func1']);
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				// Di bawah ini adalah method untuk mengambil informasi dari hasil upload data
				$upload = $this->upload->data();
				$gambar = $upload['file_name'];
			}

		$code = $this->add_code('tabel_e4', $this->aliases['tabel_e4_field1'], 5, '04');

		$data = array(
			$this->aliases['tabel_e4_field1'] => $code,
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $gambar,

			'created_at' => date("Y-m-d\TH:i:s"),
			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e4->insert_e4($data);

		$notif = $this->handle_4b($aksi, 'tabel_e4');

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Update data
	public function update()
	{
		// Di sini aku masih ada perdebatan apakah akan menggunakan gambar dengan nama file yang sama atau tidak
		// Atau menggunakan menggunakan data dari field lain sebagai nama gambar
		// Hal itu tentunya tergantung preferensi user
		// Fitur update gambar di bawah sudah selesai
		// Bisa mengupload gambar dengan tulisan yang dihapus, tentunya dengan minim data double

		$this->declarew();
		$this->session_3();

		$tabel_e4_field1 = $this->v_post['tabel_e4_field1'];

		$tabel_e4 = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		validate_all(
			array(
				$this->v_post['tabel_e4_field1'],
				$this->v_post['tabel_e4_field2'],
			),
			$this->views['flash3'],
			'ubah' . $tabel_e4_field1
		);

		$param = $this->v_post['tabel_e4_field2'] . "_";

		$config['upload_path'] = $this->v_upload_path['tabel_e4'];
		// nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
		$config['allowed_types'] = $this->file_type1;
		$config['file_name'] = $param . $this->aliases['tabel_e4_field3'];
		$config['overwrite'] = TRUE;
		$config['remove_spaces'] = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($this->v_input['tabel_e4_field3_input']);

		if (!$upload) {
			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		} else {
			$table = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $tabel_e4_field1)->result();
			$tabel_e4_field3 = $table[0]->img;
			unlink($this->v_upload_path['tabel_e4'] . $tabel_e4_field3);

			$upload = $this->upload->data();
			$gambar = $upload['file_name'];
		}

		$data = array(
			$this->aliases['tabel_e4_field2'] => $this->v_post['tabel_e4_field2'],
			$this->aliases['tabel_e4_field3'] => $gambar,

			'updated_at' => date("Y-m-d\TH:i:s"),
		);

		$aksi = $this->tl_e4->update_e4($data, $tabel_e4_field1);

		$notif = $this->handle_4c($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Delete data
	public function delete($tabel_e4_field1 = null)
	{
		$this->declarew();
		$this->session_3();

		$tabel_e4 = $this->tl_e4->get_e4_by_field('tabel_e4_field1', $tabel_e4_field1)->result();
		$this->check_data($tabel_e4);

		$aksi = $this->tl_e4->delete_e4_by_field('tabel_e4_field1', $tabel_e4_field1);

		$notif = $this->handle_4e($aksi, 'tabel_e4', $tabel_e4_field1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	// Print one data


}
