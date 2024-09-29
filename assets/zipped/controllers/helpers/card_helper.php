<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Generates a card header with a title, subtitle, and a close button
if (!function_exists('card_header')) {
    function card_header($title, $subtitle)
    {
        $truncated = truncateText($title, 18);
        $subtitle = xss_clean($subtitle);
        
        return <<<HTML
        <div class="card-header">
            <h5 class="card-title">{$truncated} {$subtitle}</h5>

            <button class="close" data-dismiss="card">
            <span>&times;</span>
            </button>
        </div>
        HTML;
    }
}

// Generates a card title with a tooltip
if (!function_exists('card_title')) {
    function card_title($title)
    {
        $truncated = truncateText($title, 30);
        
        return <<<HTML
        <p class="card-text" style="font-size: 18px;"
        data-toggle="tooltip" data-placement="left" title="{$title}">
            {$truncated}
        </p>
        HTML;
    }
}

// Generates a card text with a tooltip
if (!function_exists('card_text')) {
    function card_text($title)
    {
        $truncated = truncateText($title, 23);
        
        return <<<HTML
        <span class="card-text" style="font-size: 16px;"
        data-toggle="tooltip" data-placement="left" title="{$title}">
            {$truncated}
        </span>
        HTML;
    }
}

// Generates a card content with a field alias and value
if (!function_exists('card_content')) {
    function card_content($size, $field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        $alias  = card_text($data[$field . '_alias']);

        return <<<HTML
        <div style="width: {$size}; display: inline-block;">{$alias}</div>
        <div style="display: inline-block;">: {$value}</div><br>
        HTML;
    }
}

// Generates a regular card with a title, detail, actions, theme, size, and table
if (!function_exists('card_regular')) {
    function card_regular($id, $title, $detail, $actions, $theme, $size, $table)
    {
        $title = card_title($title);
        
        return <<<HTML
        <div class="{$size} mt-2">
            <div class="card {$theme}">
            <div class="card-body">
                {$title}
                <p class="card-text">{$detail}</p>

                {$actions}
            </div>
            </div>
        </div>
        HTML;
    }
}

// Generates a card with a file/image and a title, detail, actions, theme, size, table, and picture
if (!function_exists('card_file')) {
    function card_file($id, $title, $detail, $actions, $theme, $size, $table, $picture)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        $truncated = truncateText($title, 18);
        
        return <<<HTML
        <div class="{$size} mt-2">
            <div class="card {$theme}">
            <img src="img/{$table}/{$picture}" class="card-img-top img-fluid" style="max-height: 150px" alt="...">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px;"
                data-toggle="tooltip" data-placement="left" title="{$title}">
                    {$title}
                </p>
                <p class="card-text">{$detail}</p>

                {$actions}
            </div>
            </div>
        </div>
        HTML;
    }
}

// Generates a card for an event with a title, detail, actions, table, picture, and theme
if (!function_exists('card_event')) {
    function card_event($id, $title, $detail, $actions, $table, $picture, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        return <<<HTML
        <div class="col-md-4 mt-2">
            <div class="card text-white {$theme}">
            <img src="img/{$table}/{$picture}" class="card-img-top img-fluid" style="max-height: 150px" alt="...">
            <div class="card-body">
                <p class="card-text" style="font-size: 18px;"
                data-toggle="tooltip" data-placement="left" title="{$title}">
                    {$title}
                </p>
                <p class="card-text">{$detail}</p>

                {$actions}
            </div>
            </div>
        </div>
        HTML;
    }
}

// Generates a card to display a count with a title, controller, theme, and count
if (!function_exists('card_count')) {
    function card_count($title, $controller, $theme, $count)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = site_url($data['language'] . '/' . $data[$controller] . '/admin');
        $detail = lang('detail') . ' >>';
        
        return <<<HTML
        <div class="col-md-3 mt-2">
            <div class="card {$theme}">
            <div class="card-body">
                <h5 class="card-title">
                    {$title}
                </h5>
                <p class="card-text" style="font-size: 32px;">
                    {$count}
                </p>
                <a class="text-white" href="{$url}">{$detail}</a>
            </div>
            </div>
        </div>
        HTML;
    }
}