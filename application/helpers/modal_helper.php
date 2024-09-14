<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('modal_header')) {
    /**
     * Generates a modal header with title and subtitle
     *
     * @param string $title
     * @param string $subtitle
     * @return string
     */
    function modal_header($title, $subtitle)
    {
        $title = xss_clean($title);
        $subtitle = xss_clean($subtitle);
        
        return <<<HTML
        <div class="modal-header">
            <h5 class="modal-title">{$title} {$subtitle}</h5>

            <button class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        HTML;
    }
}

if (!function_exists('modal_header_id')) {
    /**
     * Generates a modal header with title and subtitle including ID
     *
     * @param string $title
     * @param string $subtitle
     * @return string
     */
    function modal_header_id($title, $subtitle)
    {
        $title = xss_clean($title);
        $subtitle = xss_clean($subtitle);
        
        return <<<HTML
        <div class="modal-header">
            <h5 class="modal-title">{$title} <span style="white-space: nowrap;">(ID = {$subtitle})</span></h5>

            <button class="close" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        HTML;
    }
}

if (!function_exists('modal_file')) {
    /**
     * Generates a modal file input field
     *
     * @param string $tabel_class
     * @param string $field
     * @param string $value
     * @return string
     */
    function modal_file($tabel_class, $field, $value)
    {
        $tabel_class = xss_clean($tabel_class);
        $alias = xss_clean(lang($field . '_alias'));
        
        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
        </div>
        <div class="form-group">
            <img src="img/{$tabel_class}/{$value}" width="450">
        </div>
        HTML;
    }
}