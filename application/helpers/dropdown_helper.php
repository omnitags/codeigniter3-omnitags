<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Generates a dropdown menu item for a specific table and place
if (!function_exists('dropdown_nav')) {
    function dropdown_nav($tabel, $place)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$tabel . '_alias'];
        $url = nav_url($data[$tabel] . $place);

        return <<<HTML
        <a class="dropdown-item" href="{$url}">
            {$alias}
        </a>
        HTML;
    }
}

// Generates a dropdown menu item with a unique title, controller, and place
if (!function_exists('dropdown_nav_unique')) {
    function dropdown_nav_unique($title, $controller, $place)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = nav_url($controller . $place);

        return <<<HTML
        <a class="dropdown-item" href="{$url}">
            {$title}
        </a>
        HTML;
    }
}

// Generates the logo menu item with a dropdown toggle
if (!function_exists('menu_logo')) {
    function menu_logo($logo)
    {
        return <<<HTML
        <a type="button" class="nav-link text-light text-decoration-none" data-toggle="dropdown" href="#">
                <h4>{$logo} <i class="fas fa-caret-down"></i></h4>
            </a>
        HTML;
    }
}

// Generates a navigation item with a title, controller, and place
if (!function_exists('nav_item')) {
    function nav_item($title, $controller, $place)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = nav_url($controller . $place);

        return <<<HTML
            <li class="nav-item d-flex align-items-center pb-2">
                <a class="nav-link text-light text-decoration-none" href="{$url}">
                    {$title}
                </a>
            </li>
            HTML;
    }
}