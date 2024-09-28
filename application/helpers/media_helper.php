<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('truncateText')) {
    /**
     * Truncate text to a specified length.
     *
     * @param string $text The text to truncate.
     * @param int $maxLength The maximum length of the truncated text.
     * @param string $suffix (optional) The suffix to append if the text is truncated.
     * @return string The truncated text.
     */
    function truncateText($text, $maxLength, $suffix = '...') {
        if (strlen($text) <= $maxLength) {
            return $text;
        }

        $truncatedText = substr($text, 0, $maxLength);
        $lastSpacePos = strrpos($truncatedText, ' ');

        if ($lastSpacePos !== false) {
            $truncatedText = substr($truncatedText, 0, $lastSpacePos);
        }

        return $truncatedText . $suffix;
    }
}

if ( ! function_exists('datetime_elapsed_string'))
{
    function datetime_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime();
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );

        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) {
            $string = array_slice($string, 0, 1);
        }

        return $string ? implode(', ', $string) . ' yang lalu' : 'Baru saja';
    }
}

if (!function_exists('getExtension')) {
    function getExtension($filePath) {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }
}

if (!function_exists('get_next_code')) {
    function get_next_code($table, $field, $prefix)
    {
        $CI =& get_instance();
        $CI->load->database();

        // Query to get the last record
        $CI->db->select($field);
        $CI->db->from($table);
        $CI->db->order_by($field, 'DESC');
        $CI->db->limit(1);
        $last_record = $CI->db->get()->row();

        if ($last_record) {
            // Assuming last 5 digits are the incrementing number
            $last_code = substr($last_record->$field, -5);
            $next_number = intval($last_code) + 1;
        } else {
            $next_number = 1; // Start with 1 if there are no records
        }

        // Generate the new code with the specified prefix
        $new_code = sprintf("%s%05d", $prefix, $next_number);

        return $new_code;
    }
}

// Generate an information to avoid using JOINs
if (!function_exists('show_info_user')) {
    function show_info_user($param1, $param2)
    {
        foreach ($param2->result() as $obj) {
            if ($param1 == $obj->id) {
                return $obj->nama;  // Assuming 'user_name' exists in tbl2
            }
        }
        return 'No user found';
    }
}

// Generate an information to avoid using JOINs
if (!function_exists('show_info')) {
    function show_info($id, $target_tbl, $target_id, $target_value)
    {
        foreach ($target_tbl->result() as $obj) {
            if ($id == $target_id) {
                return $obj->$target_value;  // Assuming 'user_name' exists in tbl2
            }
        }
        return 'No user found';
    }
}