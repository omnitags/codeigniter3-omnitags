<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Counts the number of rows in a given table
if (!function_exists('count_data')) {
    function count_data($table)
    {
        $table = $table->num_rows();

        return <<<HTML
        <br><span class="h6"> Data: {$table}
        HTML;
    }
}

// Generates an HTML table with a given theme and data
if (!function_exists('table_data')) {
    function table_data($data, $theme)
    {
        return <<<HTML
        <div class="table-responsive">
            <table class="table shadow-sm {$theme}" id="data">
                <thead>
                <tbody>
                    {$data}

                </tbody>
                <tfoot></tfoot>
            </table>
            </div>
        HTML;
    }
}

// Generates a table row with a field alias and value
if (!function_exists('row_data')) {
    function row_data($field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];

        return <<<HTML
        <tr>
              <td width="40%" class="table-active">{$alias}</td>
              <td width="">{$value}</td>
            </tr>
        HTML;
    }
}

// Generates a table row with a field alias and value
if (!function_exists('row_data_text')) {
    function row_data_text($field, $value)
    {
        return <<<HTML
        <tr>
            <td width="40%" class="table-active">{$field}</td>
            <td width="">{$value}</td>
            </tr>
        HTML;
    }
}

// Generates a table row with a field alias and an image
if (!function_exists('row_file')) {
    function row_file($tabel_class, $field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $img = tampil_image('125px', $tabel_class, $value, $alias);

        return <<<HTML
        <tr>
              <td width="40%" class="table-active">{$alias}</td>
              <td width="">
                {$img}
            </tr>
        HTML;
    }
}

// Generates a text field with a label and value
if (!function_exists('tampil_text')) {
    function tampil_text($field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        $alias = $data[$field . '_alias'];

        return <<<HTML
        <div class="form-group">
            <label>{$alias} : </label>
            <p>{$value}</p>
        </div>
        <hr>
        HTML;
    }
}

// Generates a password requirements message
if (!function_exists('password_req')) {
    function password_req()
    {
        return <<<HTML
        <div id="message" class="mb-3">
              <label class="checkpass">Password must contain the following:</label><br>
              <div class="row">
                <div class="col-md-6">
                  <label id="letter" class="checkpass invalid">A <b>lowercase</b> letter</label><br>
                  <label id="capital" class="checkpass invalid">A <b>capital (uppercase)</b> letter</label><br>
                  
                </div>
                <div class="col-md-6">
                  <label id="number" class="checkpass invalid">A <b>number</b></label><br>
                  <label id="length" class="checkpass invalid">Minimum <b>8 characters</b></label>
                  
                </div>
              </div>
            </div>
        HTML;
    }
}

// Generates an image with a tooltip
if (!function_exists('tampil_image')) {
    function tampil_image($size, $tabel_class, $value, $konten)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        return <<<HTML
        <img style="max-height: {$size}" role="button" data-toggle="tooltip" data-placement="right" 
            class="img-thumbnail img-fluid" src="img/{$tabel_class}/{$value}" 
            title="<img class='img-thumbnail' src='img/{$tabel_class}/{$value}' />
            <br>{$konten}">
        HTML;
    }
}

// Generates an image with a tooltip
if (!function_exists('tampil_dekor')) {
    function tampil_dekor($size, $tabel_class, $value)
    {
        return <<<HTML
        <div class="dekor rounded">
            <img style="max-height: {$size}; transform: scale(1.0);" alt="image"
                class="img-fluid rounded" src="img/{$tabel_class}/{$value}">
        </div>
        HTML;
    }
}

// Generates an image with a tooltip
if (!function_exists('tampil_dekor_history')) {
    function tampil_dekor_history($size, $tabel_class, $value)
    {
        return <<<HTML
        <div class="dekor rounded shadow-sm">
            <img style="max-height: {$size}; transform: scale(1.0);" alt="image"
                class="img-fluid rounded archived" src="img/{$tabel_class}/{$value}">
            <div class="overlay"><i class="fas fa-history"></i></div>
        </div>
        HTML;
    }
}

// Generates an image with a tooltip
if (!function_exists('tampil_dekor_archive')) {
    function tampil_dekor_archive($size, $tabel_class, $value)
    {
        return <<<HTML
        <div class="dekor rounded shadow-sm">
            <img style="max-height: {$size}; transform: scale(1.0);" alt="image"
                class="img-fluid rounded archived" src="img/{$tabel_class}/{$value}">
            <div class="overlay"><i class="fas fa-trash"></i></div>
        </div>
        HTML;
    }
}

// Generates a file field with a label and image
if (!function_exists('tampil_file')) {
    function tampil_file($tabel_class, $field, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();
        
        $alias = $data[$field . '_alias'];

        return <<<HTML
        <div class="form-group">
            <label>{$alias}</label>
        </div>
        <div class="form-group">
            <img src="img/{$tabel_class}/{$value}" width="300">
        </div>
        HTML;
    }
}