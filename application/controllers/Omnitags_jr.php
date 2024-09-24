<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('Omnitags_jr')) {
    class Omnitags_jr extends CI_Controller
    {
        protected $language_code;

        // Remember if you failed to load the link in this app, then you have to go to views helper where I put restrictions on 
        // which websites that I need to load

        // Di bawah ini aku berencana untuk membuat sebuah array yang menampung semua jenis alias dari field dan nama tabel
        // Dan aku akan membuat array itu merge dengan array yang akan diload ke halaman view pada setiap
        // Controller yang ada di aplikasi ini, dengan begitu, aku tidak perlu khawatir jika ingin memulai projek baru
        // Dan ingin mengubah konten di dalamnya dalam waktu yang singkat

        // Aku ada rencana untuk menggunakan Toastr untuk menampilkan notifikasi toast
        // Ini adalah link : https://codeseven.github.io/toastr/demo.html

        // Declaring relevant variables
        // Hard coded variable values
        public $file_type1 = 'png|jpg|jpeg|webp';
        public $file_type2 = 'pdf';
        public $phase_0 = '<br><span class="h6"> (pre-alpha phase)</span>';
        public $phase_1 = '<br><span class="h6"> (alpha phase)</span>';
        public $phase_2 = '<br><span class="h6"> (beta phase)</span>';
        public $phase_3 = '<br><span class="h6"> (release candidate phase)</span>';
        public $phase_4 = '';  // feature released

        // Variables that functions as soft code later on
        public $spreadsheet_lib, $uri, $db;
        public $aliases, $views, $flashdatas, $tempdatas, $show, $package;
        public $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10;
        public $v11;
        public $v1_title, $v2_title, $v3_title, $v4_title, $v5_title, $v6_title, $v7_title, $v8_title, $v9_title, $v10_title;
        public $v11_title;
        public $v_input, $v_post, $v_get;
        public $v_upload_path, $upload;
        public $flash, $flash_func;
        public $notif_limit, $notif_null, $notifications, $elapsedTime, $elapsed, $elapsed2;
        public $recommendation, $theme, $theme_id;
        public $fb_api1;
        public $fb_bucket1;
        public $flash1_msg_1;
        public $flash1_msg_2;
        public $flash1_msg_3;
        public $flash1_msg_4;
        public $flash1_msg_5;
        public $flash1_msg_6;
        public $flash_msg1;
        public $flash_msg2;
        public $flash_msg3, $flash_msg3_alt1, $flash_msg3_alt2;
        public $flash_msg4;
        public $flash_msg5;
        public $tabel_a1, $tabel_a1_field1;
        public $myData1, $myData2, $reverse;

        // Below are the keys that you need to remember
        public $tl_ot;
        public $tl_a1;
        public $tl_b1, $tl_b2, $tl_b3, $tl_b4, $tl_b5, $tl_b6, $tl_b7, $tl_b8, $tl_b9, $tl_b10, $tl_b11;
        public $tl_c1, $tl_c2;
        public $tl_d1, $tl_d2, $tl_d3, $tl_d4;
        public $tl_e4;

        public function overload()
        {
            // Try to connect to the database
            $this->load->database();

            if ($this->db->conn_id === false) {
                // Check if the error code is 1203 (max_user_connections)
                $db_error = $this->db->error();
                if ($db_error['code'] == 1203) {
                    // Load the overload error view
                    redirect(site_url('en/overloaded'));
                    return;
                } else {
                    // Handle other database connection errors
                    show_error('Database connection error: ' . $db_error['message'], 500);
                    return;
                }
            }
        }

        public function load_page($tabel, $view_name, $data1) {
            if(!empty($tabel)) {
                $this->tl_ot->create_or_update_history_table($tabel);
            }
            $data = array_merge($data1, $this->package);
            set_userdata('previous_url', current_url());
            $this->track_page();
            load_view_data($view_name, $data);
        }

        // Function to simplify upload new image
        public function upload_new_image($new_name, $path, $field, $allowed_types, $tabel)
        {
            $config['upload_path'] = $path;
            // nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
            $config['file_name'] = $new_name;
            $config['allowed_types'] = $allowed_types;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload($this->v_input[$field . '_input']);

            if (!$upload) {
                set_flashdata($this->views['flash2'], $this->flash_msg2[$field . '_alias']);
                set_flashdata('modal', $this->views['flash2_func1']);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $upload = $this->upload->data();
                return $upload['file_name'];
            }
        }

        // Function to simplify change image
        public function change_image($new_name, $old_name, $path, $field, $allowed_types, $tabel)
        {            
            $config['upload_path'] = $path;
            // nama file dan ekstensi telah ditetapkan dan dapat diganti dengan file bernama sama
            $config['allowed_types'] = $allowed_types;
            $config['file_name'] = $new_name;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload($this->v_input[$field . '_input']);

            if (!$upload) {
                $upload = $this->upload->data();
                return $upload['file_name'];
            } else {
                unlink($path . $old_name);

                $upload = $this->upload->data();
                return $upload['file_name'];
            }
        }

        // Function to simplify change image but has advanced features
        public function change_image_advanced($name_field, $path, $field, $allowed_types, $tabel)
        {
            $img = $this->v_post[$field . '_old'];
            $extension = '.' . getExtension($path . $img);
            $new_name = $this->v_post[$name_field];
            $old_name = $tabel[0]->{$this->aliases[$name_field]};

            $config['upload_path'] = $path;
            // nama file telah ditetapkan dan hanya berekstensi jpg dan dapat diganti dengan file bernama sama
            $config['file_name'] = $new_name;
            $config['allowed_types'] = $allowed_types;
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $upload = $this->upload->do_upload($this->v_input[$field . '_input']);

            if (!$upload) {
                if ($new_name != $old_name) {
                    rename($path . $img, $path . str_replace(' ', '_', $new_name) . $extension);
                    return str_replace(' ', '_', $new_name) . $extension;
                } else {
                    return $img;
                }
            } else {
                if ($new_name != $old_name) {
                    // File upload is successful, delete the old file
                    if (file_exists($path . $img)) {
                        unlink($path . $img);
                    }
                    $upload = $this->upload->data();
                    return $upload['file_name'];
                } else {
                    return $img;
                }
            }
        }

        public function serve_image($directory, $filename)
        {
            // Set the correct content type
            header('Content-Type: image/jpeg'); // Adjust content type based on your image type

            // Serve the image file
            $file_path = FCPATH . ('assets/img/' . $directory . '/' . $filename);
            if (file_exists($file_path)) {
                readfile($file_path);
            } else {
                // Handle file not found error
                show_404();
            }
        }

        public function check_null($method)
        {
            if ($method != NULL) {
                // error handling
                set_flashdata($this->views['flash1'], "This data already exist, pick something else!");
                set_flashdata('toast', $this->views['flash1_func1']);
                redirect(userdata('previous_url'));
            }
        }

        public function check_data($method)
        {
            if (!$method) {
                // error handling
                set_flashdata($this->views['flash1'], "Error occurred while processing data!");
                set_flashdata('toast', $this->views['flash1_func1']);
                redirect(userdata('previous_url'));
            }
        }

        // adding the actual notif
        public function add_notif($msg, $type, $extra)
        {
            $notif = array(
                $this->aliases['tabel_b9_field2'] => userdata($this->aliases['tabel_c2_field1']),
                $this->aliases['tabel_b9_field3'] => $type,
                $this->aliases['tabel_b9_field4'] => $msg . $extra,

                'created_at' => date("Y-m-d\TH:i:s"),
                'action_url' => current_full_url(),
            );

            $ambil = $this->tl_b9->insert_b9($notif);
        }

        public function add_code($tabel, $id_name, $digits, $kode)
        {
            // $id = get_next_code($this->aliases['tabel_e1'], $this->aliases['tabel_e1_field1'], 'FK');
            // $this->aliases['tabel_e1_field1'] => $id,

            // Get the next incrementing number (this is a simplified example)
            $last_record = $this->db->query("SELECT {$id_name} 
		FROM {$this->aliases[$tabel]} ORDER BY {$id_name} DESC LIMIT 1")->row();

            if ($last_record) {
                $last_code = substr($last_record->$id_name, -$digits); // Assuming last 6 digits are the incrementing number
                $next_number = intval($last_code) + 1;
            } else {
                $next_number = 1; // Start with 1 if there are no records
            }

            return sprintf($kode . "%0" . $digits . "d", $next_number); // Generates a code like MED00001, MED00002, etc.
        }

        public function insert_history($tabel_name, $data) {
            return $this->tl_ot->create_or_update_history_table($tabel_name);
        }

        // adding the actual notif to all user based on c2_field1
        public function add_notif_all($msg, $type, $extra)
        {
            $users = $this->tl_d3->get_d3_by_field('tabel_c2_field1', userdata($this->aliases['tabel_c2_field1']));

            if ($users->num_rows() < 2) {
                $notif = array(
                    $this->aliases['tabel_b9_field2'] => userdata($this->aliases['tabel_c2_field1']),
                    $this->aliases['tabel_b9_field3'] => $type,
                    $this->aliases['tabel_b9_field4'] => $msg . $extra,

                    'created_at' => date("Y-m-d\TH:i:s"),
                );

                $ambil = $this->tl_b9->insert_b9($notif);
            } else {

            }
        }

        // Function to track page
        public function track_page()
        {
            $tabel = $this->tl_b11->get_b11_by_field('tabel_b11_field2', current_full_url());

            if (!empty($tabel->result())) {
            } else {
                $data = array(
                    'page_id' => '',
                    'page_url' => current_full_url(),
                    'page_name' => uri_string(),

                    'created_at' => date("Y-m-d\TH:i:s"),
                );

                $aksi = $this->tl_b11->insert_b11($data);
            }

            $tabel = $this->tl_b11->get_b11_by_field('tabel_b11_field2', current_full_url())->result();

            $data1 = array(
                'click_id' => '',
                'user_id' => userdata($this->aliases['tabel_c2_field1']),
                'page_id' => $tabel[0]->page_id,

                'created_at' => date("Y-m-d\TH:i:s"),
            );

            return $aksi = $this->tl_d4->insert_d4($data1);
        }

        public function track_action()
        {
            $data = array(
                'id_activity' => '',
                'page_url' => current_full_url(),
                'page_name' => uri_string(),

                'created_at' => date("Y-m-d\TH:i:s"),
            );

            return $aksi = $this->tl_b11->insert_b11($data);
        }
    }
} else {

}