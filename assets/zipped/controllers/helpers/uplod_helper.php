<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('upload_file')) {

    /**
     * Uploads a file based on the provided configuration
     *
     * @param string $field_name
     * @param array $config
     * @param string $flash_key
     * @param string $class
     * @return mixed
     */
    function upload_file($field_name, $config, $flash_key, $class)
    {
        $CI =& get_instance();
        $CI->load->library('upload', $config);
        $modal = '$("#' . $class . ' ").modal("show")';

        if (!$CI->upload->do_upload($field_name)) {
            // Set flashdata for the error message
            set_flashdata($flash_key, $CI->upload->display_errors());
            set_flashdata('modal', $modal);
            // Redirect back to the form
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            // Retrieve uploaded data
            return $CI->upload->data();
        }
    }
}

/**
 * Handles the file upload process
 *
 * @param string $name
 * @param string $old_name
 * @param string $field
 * @param string $path
 * @param array $config
 * @return string
 */
function handle_file_upload($name, $old_name, $field, $path, $config)
{
    $CI =& get_instance();
    // Fetch the view variables
    $data = $CI->load->get_vars();

    $img = post($field . '_old');
    $new_name = post($name . '_input');
    $input = $data[$field . '_input'];

    $CI->load->library('upload', $config);

    $upload = $CI->upload->do_upload($input);
    $extension = getExtension($img);

    if (!$upload) {
        if ($new_name != $old_name) {
            rename($path . $old_name, $new_name . $extension);
            $gambar = $new_name . $extension;
        } else {
            $gambar = $img;
        }
    } else {
        if ($new_name != $old_name) {
            // File upload is successful, delete the old file
            if (file_exists($path . $img)) {
                unlink($path . $img);
            }

            $upload_data = $CI->upload->data();
            $gambar = $upload_data['file_name'];
        } else {
            $gambar = $img;
        }
    }

    return $gambar;
}
?>