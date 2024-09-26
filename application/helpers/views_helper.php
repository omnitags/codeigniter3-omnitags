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
            "Permissions-Policy: geolocation=self http://localhost/project/omnitags, camera=self, microphone=none"
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