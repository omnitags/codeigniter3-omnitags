<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('back_to_home')) {
    // Generates a link to navigate back to the home page
    function back_to_home()
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = '< Home';
        $url = xss_clean(site_url($data['language'] . '/home'));

        return <<<HTML
        <a class="text-decoration-none" href="{$url}">{$alias}</a>
        HTML;
    }
}


if (!function_exists('back_to_activity')) {
    // Generates a link to navigate back to a previous activity page
    function back_to_activity()
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Load session library
        $CI->load->library('session');

        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = xss_clean(lang('back_to_activity'));
        // Get the previous URL from session, fallback to home if not set
        $url = xss_clean(userdata('previous_url') ? userdata('previous_url') : site_url($data['language'] . '/home'));

        return <<<HTML
        <a class="text-decoration-none" href="{$url}">{$alias}</a>
        HTML;
    }
}


if (!function_exists('fontawesome_link')) {
    // Generates a link to Font Awesome for searching icons
    function fontawesome_link()
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = xss_clean("https://fontawesome.com/v5/search?o=r&m=free");

        return <<<HTML
        <a class="text-decoration-none" href="{$url}" target="_blank"><small>Find Fontawesome</small></a>
        HTML;
    }
}

if (!function_exists('btn_tambah')) {
    // Creates a button to add new content
    function btn_tambah()
    {
        $alias = xss_clean(lang('add'));

        return <<<HTML
        <button class="btn mr-1 btn-success mb-4" type="button" data-toggle="modal" data-target="#tambah">+ {$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_simpan')) {
    // Creates a button to save data
    function btn_simpan()
    {
        $alias = xss_clean(lang('save_data'));

        return <<<HTML
        <button class="btn mt-4 mb-4 mr-1 btn-success" type="submit">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_tutup')) {
    // Creates a button to close a dialog or modal
    function btn_tutup()
    {
        $alias = xss_clean(lang('close_dialog'));

        return <<<HTML
        <button class="btn btn-primary" data-dismiss="modal">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_book')) {
    // Creates a button to book an item
    function btn_book($value)
    {
        $alias = xss_clean(lang('input'));

        return <<<HTML
        <a class="btn btn-light border border-dark text-success mb-2" type="button" data-toggle="modal"
            data-target="#book{$value}">
            <i class="fas fa-concierge-bell"></i>
        </a>
        HTML;
    }
}

if (!function_exists('view_switcher')) {
    // Generates a view toggle button group
    function view_switcher()
    {
        return <<<HTML
        <div class="btn-group mb-4" role="group" aria-label="View Toggle">
        <button type="button" class="btn btn-primary view-toggle active" data-target="card-view"><i
            class="fas fa-th-large"></i></button>
        <button type="button" class="btn btn-primary view-toggle" data-target="table-view"><i
            class="fas fa-table"></i></button>
        </div>
        HTML;
    }
}

if (!function_exists('btn_field')) {
    // Creates a button for a specific field
    function btn_field($value, $logo)
    {

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light border border-dark text-info" type="button" data-toggle="modal"
            data-target="#{$value}">
            {$logo}
        </a>
        HTML;
    }
}

if (!function_exists('btn_update')) {
    // Creates a button to update data
    function btn_update()
    {
        $alias = xss_clean(lang('update_data'));

        return <<<HTML
        <button class="btn mt-4 mr-1 btn-success" type="submit">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_update_field')) {
    // Creates a button to update data with a confirmation prompt
    function btn_update_field($field)
    {
        $alias = xss_clean(lang('update_data'));

        $placeholder = xss_clean($alias . ' ' . lang($field));

        return <<<HTML
        <button class="btn mt-4 mr-1 btn-success" type="submit" 
        onclick="return confirm({$placeholder})">{$alias}</button>
        HTML;
    }
}

if (!function_exists('btn_cari')) {
    // Creates a search button
    function btn_cari()
    {
        return <<<HTML
        <button class="btn mr-1 mb-2 btn-success" name="search" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        HTML;
    }
}
if (!function_exists('btn_sync')) {
    // Generates a button to sync data with a specific value
    function btn_sync($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = xss_clean($data[$tabel]);
        $lang = xss_clean($data['language']);

        $url = xss_clean(site_url($lang . '/' . $controller . '/sync_theme/' . $value));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-primary" onclick="return confirm('Sync with {$value}?')" href="{$url}">
          <i class="fas fa-sync-alt"></i>
        </a>
        HTML;
    }
}

if (!function_exists('btn_read_more')) {
    // Generates a button to read more details
    function btn_read_more($table, $id)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = xss_clean(site_url($data['language'] . '/' . $data[$table] . '/detail/' . $id));

        return <<<HTML
        <a class="text-decoration-none" href="{$url}" target="_blank"> Read more</a>
        HTML;
    }
}

if (!function_exists('btn_value')) {
    // Creates a button with a specific value for a table
    function btn_value($table, $function, $id, $logo)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = xss_clean(site_url($data['language'] . '/' . $data[$table] . $function .'/' . $id));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light border border-dark text-warning"
                href="{$url}">
                {$logo}</a>
        HTML;
    }
}

if (!function_exists('btn_lihat')) {
    // Creates a button to view details
    function btn_lihat($value)
    {
        $alias = xss_clean(lang('input'));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light border border-dark text-primary" type="button" data-toggle="modal"
            data-target="#lihat{$value}">
            <i class="fas fa-eye"></i></a>
        HTML;
    }
}

if (!function_exists('btn_edit')) {
    // Creates a button to edit details
    function btn_edit($value)
    {
        $alias = xss_clean(lang('input'));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light border border-dark text-warning" type="button" data-toggle="modal"
              data-target="#ubah{$value}">
              <i class="fas fa-edit"></i></a>
        HTML;
    }
}


if (!function_exists('btn_laporan')) {
    // Generates a button to print a report for a specific table
    function btn_laporan($tabel)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = xss_clean($data[$tabel]);

        $lang = xss_clean($data['language']);

        $url = xss_clean(site_url($lang . '/' . $controller . '/laporan'));
        $alias = xss_clean(lang('print_report'));

        return <<<HTML
        <a class="btn mr-1 btn-info mb-4" href="{$url}" target="_blank">
            <i class="fas fa-print"></i> {$alias}</a>
        HTML;
    }
}

if (!function_exists('btn_print')) {
    // Generates a button to print specific data
    function btn_print($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = xss_clean($data[$tabel]);

        $lang = xss_clean($data['language']);

        $url = xss_clean(site_url($lang . '/' . $controller . '/print/' . $value));

        return <<<HTML
        <a class="btn btn-light border border-dark text-info mb-2" href="{$url}"
              target="_blank">
              <i class="fas fa-print"></i>
            </a>
        HTML;
    }
}

if (!function_exists('btn_kelola')) {
    // Creates a button to manage data for a specific table
    function btn_kelola($tabel, $function)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = xss_clean(lang($tabel . '_alias' . '_btn'));
        $controller = xss_clean($data[$tabel]);
        $lang = xss_clean($data['language']);
        $url = xss_clean(site_url($lang . '/' . $controller . $function));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-info text-light" href="{$url}">
        <i class="fas fa-edit"></i> {$alias}</a>
        HTML;
    }
}

if (!function_exists('btn_redo')) {
    // Generates a button to redo an action
    function btn_redo($tabel, $function)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = xss_clean($data[$tabel]);
        $lang = xss_clean($data['language']);

        $url = xss_clean(site_url($lang . '/' . $controller . $function));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-danger" type="button" href="{$url}">
          <i class="fas fa-redo"></i></a>
        HTML;
    }
}


if (!function_exists('btn_hapus')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_hapus($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = xss_clean($data[$tabel]);
        $alias = xss_clean(lang($tabel . '_alias'));
        $lang = xss_clean($data['language']);

        $url = xss_clean(site_url($lang . '/' . $controller . '/delete/' . $value));

        return <<<HTML
        <a class="btn mr-1 mb-2 btn-light border border-dark text-danger" onclick="return confirm('apakah data {$alias} ingin dihapus?')"
              href="{$url}">
              <i class="fas fa-trash"></i></a>
        HTML;
    }
}


if (!function_exists('btn_action')) {

    function btn_action($tabel, $function, $logo, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = xss_clean($data[$tabel]);
        $lang = xss_clean($data['language']);
        $url = xss_clean(site_url($lang . '/' . $controller . $function));

        return <<<HTML
        <a class="btn mr-2 mb-2 {$theme}" href="{$url}">
        {$logo}</a>
        HTML;
    }
}


