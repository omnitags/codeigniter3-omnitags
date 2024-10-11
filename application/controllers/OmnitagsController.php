<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!class_exists('OmnitagsController')) {
    class OmnitagsController extends CI_Controller
    {
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
        public $aliases, $views, $title, $flashdatas, $tempdatas, $show, $package;
        public $v1, $v2, $v3, $v4, $v5, $v6, $v7, $v8, $v9, $v10;
        public $v11;
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

        public function __construct()
        {
            parent::__construct();

            //Menampilkan komponen html : teks, button, input, modal, dropdown
            $this->load->helper(['tampil', 'button', 'input', 'modal', 'list_group', 'card', 'dropdown', 'diagram']);
            // Kelola media dan javascript
            $this->load->helper(['media', 'js', 'graph_js']);
            // Kelola API dan firebase
            $this->load->helper(['load_api', 'firebase']);
            // Kelola URL
            $this->load->helper(['views', 'url', 'move_url']);
            // Kelola validation
            $this->load->helper(['session', 'validate', 'uplod']);
            // Load library
            $this->load->library(['session', 'user_agent']);

            // Set security headers
            set_security_headers();
        }

        // Loader for all MVC in this website
        public function declarew()
        {
            $jsonData1 = file_get_contents(site_url('assets/json/app.postman_environment.json'));
            $this->myData1 = json_decode($jsonData1, true)['values'];

            // Create variables dynamically
            foreach ($this->myData1 as $item) {
                $this->aliases[$item['key']] = $item['value']; // Variables to create dynamic variables
                $this->reverse[$item['value'] . '_realname'] = $item['key'];

                $this->v_input[$item['key'] . '_input'] = 'txt_' . $item['value'];
                $this->v_input[$item['key'] . '_filter1'] = 'min_' . $item['value'];
                $this->v_input[$item['key'] . '_filter2'] = 'max_' . $item['value'];
                $this->v_input[$item['key'] . '_old'] = 'old_' . $item['value'];
                $this->v_input[$item['key'] . '_new'] = 'new_' . $item['value'];
                $this->v_input[$item['key'] . '_confirm'] = 'confirm_' . $item['value'];

                $this->v_post[$item['key']] = post('txt_' . $item['value']);
                $this->v_post[$item['key'] . '_old'] = post('old_' . $item['value']);
                $this->v_post[$item['key'] . '_new'] = post('new_' . $item['value']);
                $this->v_post[$item['key'] . '_confirm'] = post('confirm_' . $item['value']);

                $this->v_get[$item['key']] = get('txt_' . $item['value']);
                $this->v_get[$item['key'] . '_filter1'] = get('min_' . $item['value']);
                $this->v_get[$item['key'] . '_filter2'] = get('max_' . $item['value']);

                $this->flash1_msg_1[$item['key']] = $item['value'] . ' successfully saved!';
                $this->flash1_msg_2[$item['key']] = $item['value'] . ' failed to save!';
                $this->flash1_msg_3[$item['key']] = $item['value'] . ' successfully updated!';
                $this->flash1_msg_4[$item['key']] = $item['value'] . ' failed to update!';
                $this->flash1_msg_5[$item['key']] = $item['value'] . ' successfully deleted!';
                $this->flash1_msg_6[$item['key']] = $item['value'] . ' failed to delete!';
                
                $this->flash[$item['key']] = 'pesan_' . $item['value'];
                $this->flash_func[$item['key']] = '$(".' . $item['value'] . '").modal("show")';

                $this->flash_msg1[$item['key']] = $item['value'] . ' tidak bisa diupload!';
                $this->flash_msg2[$item['key']] = $item['value'] . ' tidak bisa diupload!';
                $this->flash_msg3[$item['key']] = $item['value'] . ' salah!';
                $this->flash_msg3_alt1[$item['key']] = $item['value'] . ' lama salah!';
                $this->flash_msg3_alt2[$item['key']] = 'Konfirmasi' . $item['value'] . ' lama salah!';
                $this->flash_msg4[$item['key']] = $item['value'] . ' tidak tersedia!';
                $this->flash_msg5[$item['key']] = $item['value'] . ' telah digunakan!';

                $this->v_upload_path[$item['key']] = './assets/img/' . $item['key'] . '/';

                $this->v1[$item['key']] = 'contents/' . $item['key'] . '/index';
                $this->v2[$item['key']] = 'contents/' . $item['key'] . '/daftar';
                $this->v3[$item['key']] = 'contents/' . $item['key'] . '/admin';
                $this->v4[$item['key']] = 'contents/' . $item['key'] . '/laporan';
                $this->v5[$item['key']] = 'contents/' . $item['key'] . '/print';
                $this->v6[$item['key']] = 'contents/' . $item['key'] . '/profil';
                $this->v7[$item['key']] = 'contents/' . $item['key'] . '/konfirmasi';
                $this->v8[$item['key']] = 'contents/' . $item['key'] . '/detail';
                $this->v9[$item['key']] = 'contents/' . $item['key'] . '/archive';
                $this->v10[$item['key']] = 'contents/' . $item['key'] . '/archive_detail';
                $this->v11[$item['key']] = 'contents/' . $item['key'] . '/history';

                $this->title[$item['key'] . '_v1'] = $item['value'];
                $this->title[$item['key'] . '_v2'] = "List of " . $item['value'];
                $this->title[$item['key'] . '_v3'] = $item['value'] . " Data";
                $this->title[$item['key'] . '_v4'] = $item['value'] . " Report";
                $this->title[$item['key'] . '_v5'] = $item['value'] . " Data";
                $this->title[$item['key'] . '_v6'] = $item['value'] . " Profile";
                $this->title[$item['key'] . '_v7'] = $item['value'] . " Successful!";
                $this->title[$item['key'] . '_v8'] = "Details of " . $item['value'];
                $this->title[$item['key'] . '_v9'] = $item['value'] . ' Archive';
                $this->title[$item['key'] . '_v10'] = 'Details of ' . $item['value'] . ' Archive';
                $this->title[$item['key'] . '_v11'] = 'History of ' . $item['value'];

            }

            $this->overload();

            date_default_timezone_set($this->aliases['timezone']);
            $this->tabel_a1_field1 = 1;

            $this->theme = $this->tl_b7->theme($this->tabel_a1_field1)->result();
            $this->theme_id = $this->theme[0]->id_theme;

            $this->notif_limit = $this->tl_b9->get_b9_with_b8_limit(userdata('id'))->result();
            $this->notif_null = $this->tl_b9->get_b9_by_field(['tabel_b9_field2', 'tabel_b9_field6'], [userdata('id'), NULL]);

            $this->views = array(
                'head' => 'partials/head',
                'phase' => $this->phase_2,
                'lisensi' => $this->tl_b5->get_b5_by_field(['tabel_b5_field6', 'tabel_b5_field7'], [$this->aliases['tabel_b5_field6_value1'], $this->theme_id]),
                'sosmed' => $this->tl_b6->get_b6_by_field(['tabel_b6_field6', 'tabel_b6_field7'], [$this->aliases['tabel_b6_field6_value1'], $this->theme_id]),
                'tbl_a1' => $this->theme,
                'notif' => $this->notif_limit,
                'notif_count' => $this->notif_null->num_rows(),
                'users' => $this->tl_c2->get_all_c2(),
                'no_data' => $this->tl_b1->dekor($this->theme_id, 'no_data'),

                'flash1' => 'pesan',
                'flash1_func1' => '$("#element").toast("show")',

                // Pesan unik di bawah ini menggunakan flash1 dan ditandai dengan note
                'flash1_note1' => 'Selamat datang ' . userdata('role') . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!',
                'flash1_note2' => 'Ayo kita lanjutkan ke pemesanan, ' . userdata('role') . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!',

                // Data Manupulation Flashdatas
                'flash2' => 'pesan_tambah',
                'flash2_func1' => '$(".tambah").modal("show")',

                'flash3' => 'pesan_ubah',
                'flash3_func1' => '$(".ubah").modal("show")',

                'flash4' => 'pesan_lihat',
                'flash4_func1' => '$(".lihat").modal("show")',

                // Notification and alert Flashdatas
                'flash5' => 'pesan_quickTour',
                'flash5_func1' => '$("#quickTour").modal("show")',
            );

            $this->tempdatas = array(

            );

            $this->package = array_merge($this->views, $this->aliases, $this->v_input, $this->reverse);
        }

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

        public function load_page($tabel, $view_name, $data1)
        {
            if (!empty($tabel)) {
                $this->tl_ot->create_or_update_history_table($tabel);
            }
            $data = array_merge($data1, $this->package);
            set_userdata('previous_url', current_url());
            $this->track_page();
            load_view_data($view_name, $data);
        }
        
        public function load_page_error($tabel, $view_name, $data1)
        {
            if (!empty($tabel)) {
                $this->tl_ot->create_or_update_history_table($tabel);
            }
            $data = array_merge($data1, $this->package);
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
                $this->aliases['tabel_b9_field2'] => userdata('id'),
                $this->aliases['tabel_b9_field3'] => $type,
                $this->aliases['tabel_b9_field4'] => $msg . $extra,

                'created_at' => date("Y-m-d\TH:i:s"),
                'action_url' => current_full_url(),
            );

            $ambil = $this->tl_b9->insert_b9($notif);
        }

        public function add_code($tabel, $id_name, $digits, $kode)
        {
            // $id = get_next_code($this->aliases['tabel_e1'], 'id', 'FK');
            // 'id' => $id,

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

        public function insert_history($tabel_name, $data)
        {
            return $this->tl_ot->create_or_update_history_table($tabel_name);
        }

        // adding the actual notif to all user based on c2_field1
        public function add_notif_all($msg, $type, $extra)
        {
            $users = $this->tl_d3->get_d3_by_field('tabel_d3_field2', userdata('id'));

            if ($users->num_rows() < 2) {
                $notif = array(
                    $this->aliases['tabel_b9_field2'] => userdata('id'),
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
                    'id' => '',
                    'page_url' => current_full_url(),
                    'page_name' => uri_string(),

                    'created_at' => date("Y-m-d\TH:i:s"),
                );

                $aksi = $this->tl_b11->insert_b11($data);
            }

            $tabel = $this->tl_b11->get_b11_by_field('tabel_b11_field2', current_full_url())->result();

            $data1 = array(
                'id' => '',
                'user_id' => userdata('id'),
                'page_id' => $tabel[0]->id,

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










































        // Session userdata handling for loading pages
        public function page_session_all()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value1'],
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value3'],
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);
        }

        public function page_session_2()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value2']
            ];
            $this->page_session_check($allowed_values);
        }

        public function page_session_3()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value3']
            ];
            $this->page_session_check($allowed_values);
        }

        public function page_session_4()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value4']
            ];
            $this->page_session_check($allowed_values);
        }

        public function page_session_5()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->page_session_check($allowed_values);
        }


        public function page_session_check($allowed_values)
        {
            if (in_array(userdata('role'), $allowed_values)) {
                return; // Do nothing if the value is allowed
            } else {
                redirect(site_url('invalid'));
            }
        }

        public function session_check($allowed_values)
        {
            if (in_array(userdata('role'), $allowed_values)) {
                return; // Do nothing if the value is allowed
            } else {
                redirect(site_url('invalid'));
            }
        }

        // Session userdata handling for loading public functions
        public function session_all()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value1'],
                $this->aliases['tabel_c2_field6_value2'],
                $this->aliases['tabel_c2_field6_value3'],
                $this->aliases['tabel_c2_field6_value4'],
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->session_check($allowed_values);
        }

        public function session_2()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value2']
            ];
            $this->session_check($allowed_values);
        }

        public function session_3()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value3']
            ];
            $this->session_check($allowed_values);
        }

        public function session_4()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value4']
            ];
            $this->session_check($allowed_values);
        }

        public function session_5()
        {
            $allowed_values = [
                $this->aliases['tabel_c2_field6_value5']
            ];
            $this->session_check($allowed_values);
        }


        // Notification handlers
        // notification not shown, will be used
        public function handle_1a($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $object . ':' . $value;
                $type = $this->aliases['tabel_b8_field2_value1'];
                $extra = '';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification shown in toast, will be used
        // added to database for all value5 users
        public function handle_2a()
        {
            if (userdata('id') == '') {
                redirect(site_url('no_level'));
            } else {
                $msg = 'Selamat datang ' . userdata('role') . ' ' . userdata($this->aliases['tabel_c2_field2']) . '!';
                $type = $this->aliases['tabel_b8_field2_value2'];
                $extra = '';
                $flashtype = 'toast';

                $this->add_notif_all($msg, $type, $extra);
                set_flashdata($this->views['flash1'], $msg . $extra);
                set_flashdata($flashtype, $this->views['flash1_func1']);
                return [];
            }
        }

        // notification not shown, will be used
        // added to database
        public function handle_3a($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $object . ' is about ' . $value . '!';
                $type = $this->aliases['tabel_b8_field2_value3'];
                $extra = '';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using toast, will be used
        public function handle_4a($aksi, $object)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_1[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = '';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_2[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = '';
                $flashtype = 'toast';
            }

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using toast, will be used
        // added to database
        public function handle_4b($aksi, $object)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_1[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = '';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_2[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = '';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            json_encode($msg, JSON_UNESCAPED_UNICODE);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using toast, will be used
        // id specific, added to database
        public function handle_4c($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_3[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_4[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification using modal, will be used
        // id specific, modal specific, added to database
        public function handle_4d($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_3[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'modal';
            } else {
                $msg = $this->flash1_msg_4[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'modal';
            }
            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->flash[$object], $msg . $extra);
            set_flashdata($flashtype, '$("#' . $this->aliases[$object] . $value . '").modal("show")');
            return [];
        }

        // notification using toast, will be used
        // id specific, added to database
        public function handle_4e($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = $this->flash1_msg_5[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value4'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);

            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification not shown, will be used
        // added to database
        public function handle_5a($aksi, $sender, $object, $value)
        {
            if ($aksi) {
                $msg = $sender . ':' . $value;
                $type = $this->aliases['tabel_b8_field2_value5'];
                $extra = '';
                $flashtype = 'toast';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }
            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification not shown, will be used
        // added to database
        public function handle_7a($aksi, $sender, $object, $value)
        {
            if ($aksi) {
                $msg = $sender . $value . ' need your assistance!';
                $type = $this->aliases['tabel_b8_field2_value7'];
                $extra = ' (About ' . $object . ' with ID = ' . $value . ')';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification not shown, will be used
        // added to database
        public function handle_8a($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = 'Your ' . $object . ' about ' . $value . ' has been approved!';
                $type = $this->aliases['tabel_b8_field2_value8'];
                $extra = '';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification not shown, will be used
        // added to database
        public function handle_9a($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = 'Your ' . $object . ' about ' . $value . ' has been disapproved!';
                $type = $this->aliases['tabel_b8_field2_value9'];
                $extra = '';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }

        // notification shown in toast, will be used
        // added to database
        public function handle_10a($aksi, $object, $value)
        {
            if ($aksi) {
                $msg = 'The deadline of ' . $object . ' is ' . $value . '!';
                $type = $this->aliases['tabel_b8_field2_value10'];
                $extra = '';
                $flashtype = '';
            } else {
                $msg = $this->flash1_msg_6[$object . '_alias'];
                $type = $this->aliases['tabel_b8_field2_value6'];
                $extra = ' (ID = ' . $value . ')';
                $flashtype = 'toast';
            }

            $this->add_notif($msg, $type, $extra);
            set_flashdata($this->views['flash1'], $msg . $extra);
            set_flashdata($flashtype, $this->views['flash1_func1']);
            return [];
        }
    }
} else {

}