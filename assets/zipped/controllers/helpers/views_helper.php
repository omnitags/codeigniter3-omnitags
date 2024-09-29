<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Loads a view file
if (!function_exists('load_view')) {
    function load_view($view_name)
    {
        $CI =& get_instance();
        $CI->load->view($view_name);
    }
}

// Loads a view file with data
if (!function_exists('load_view_data')) {
    function load_view_data($view_name, $data)
    {
        $CI =& get_instance();
        $CI->load->view($view_name, $data);
    }
}

// Loads and sets the language based on user preference or default
if (!function_exists('load_and_set_language')) {
    function load_and_set_language()
    {
        $CI =& get_instance();

        // Detect the preferred language
        $preferred_lang = detect_preferred_language();

        // Define language folder and file mapping
        $language_mapping = [
            'zh' => 'chinese',
            'id' => 'indonesian',
            'en' => 'english',
            'fr' => 'french'
        ];

        // Load the appropriate language file
        if (array_key_exists($preferred_lang, $language_mapping)) {
            $folder = $language_mapping[$preferred_lang];
            $CI->lang->load($preferred_lang . '_lang', $folder);
        } else {
            // Default to Indonesian if no preference or invalid preference is found
            $CI->lang->load('id_lang', 'indonesian');
        }
    }
}

// Detects the preferred language based on session, URL parameter, or URL segment
if (!function_exists('detect_preferred_language')) {
    function detect_preferred_language()
    {
        $CI =& get_instance();

        // Check if a language is set in the session
        if ($CI->session->userdata('site_lang')) {
            return $CI->session->userdata('site_lang');
        }

        // Check if a language parameter is present in the URL
        if ($CI->input->get('language')) {
            $CI->session->set_userdata('site_lang', $CI->input->get('language'));
            return $CI->input->get('language');
        }

        // Check if language is provided in the URL segment
        $segment = $CI->uri->segment(1);
        if (!empty($segment) && in_array($segment, ['zh', 'id', 'en', 'fr'])) {
            $CI->session->set_userdata('site_lang', $segment);
            return $segment;
        }

        // Default to Indonesian if no preference is found
        return 'id';
    }
}
// Sets security headers for the application
if (!function_exists('set_security_headers')) {
    function set_security_headers()
    {
        $CI =& get_instance();

        $headers = [
            "Content-Security-Policy: default-src 'self' data:; " . 
                "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; " . 
                "style-src 'self' https://cdnjs.cloudflare.com 'unsafe-inline'; " . 
                "connect-src 'self' https://newsapi.org;",
            "Strict-Transport-Security: max-age=31536000; includeSubDomains",
            "X-Frame-Options: SAMEORIGIN",
            "X-Content-Type-Options: nosniff",
            "Referrer-Policy: strict-origin-when-cross-origin",
            "Permissions-Policy: geolocation=(self 'http://localhost/internship/recycleaware')"
        ];

        foreach ($headers as $header) {
            $CI->output->set_header($header);
        }
    }
}


// Determines the device type and operating system based on the user agent
if (!function_exists('getDeviceTypeAndOS')) {
    function getDeviceTypeAndOS($userAgent)
    {
        // List of common mobile device strings
        $mobileDevices = array(
            'iPhone',
            'iPad',
            'iPod',
            'Android',
            'Windows Phone',
            'BlackBerry',
        );

        // List of common desktop operating system strings
        $desktopOS = array(
            'Windows',
            'Linux',
            'Macintosh',
            'Mac OS X',
            'Mac OS'
        );

        // Check if the user agent contains any of the mobile device strings
        foreach ($mobileDevices as $device) {
            if (stripos($userAgent, $device) !== false) {
                return $device . ' (Mobile)';
            }
        }

        // Check if the user agent contains any of the desktop operating system strings
        foreach ($desktopOS as $os) {
            if (stripos($userAgent, $os) !== false) {
                return 'Desktop on ' . $os;
            }
        }

        // If no specific device category is found, consider it as a desktop with unknown OS
        return 'Desktop (Unknown OS)';
    }
}