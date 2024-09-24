<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('current_full_url')) {
    function current_full_url() {
        // Get the base URL using current_url()
        $base_url = current_url();
        
        // Get the query string if any
        $query_string = $_SERVER['QUERY_STRING'];
        
        // Return full URL including query string if present
        return $query_string ? $base_url . '/?' . $query_string : $base_url;
    }
}

// User engagement in footer
if (!function_exists('footer_url')) {
    function footer_url($link)
    {
        return site_url($link . '/?source=footer');
    }
}

// User engagement in navigation
if (!function_exists('nav_url')) {
    function nav_url($link)
    {
        return site_url($link . '/?source=nav');
    }
}

// User engagement in search form
if (!function_exists('search_url')) {
    function search_url($link)
    {
        return site_url($link . '/?source=search');
    }
}

// User engagement in confirm page
if (!function_exists('confirm_url')) {
    function confirm_url($link)
    {
        return site_url($link . '/?source=confirm');
    }
}
