<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Generates a list grup menu item for a specific table and place
if (!function_exists('list_group_nav')) {
    function list_group_nav($tabel, $place, $logo, $title, $subtitle, $desc, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = nav_url($data[$tabel] . '/'. $place);

        return <<<HTML
        <a href="{$url}" class="list-group-item {$theme}">
            <div class="row g-0 align-items-center">
                <div class="col-2">
                    {$logo}
                </div>
                <div class="col-10">
                    <div class="text-dark">{$title}</div>
                    <div class="text-muted small mt-1">
                        {$subtitle}
                    </div>
                    <div class="text-muted small mt-1">{$desc}
                    </div>
                </div>
            </div>
        </a>
        HTML;
    }
}
