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
        $url = xss_clean(site_url('home'));

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

        // Get the previous URL from session, fallback to home if not set
        $url = xss_clean(userdata('previous_url') ? userdata('previous_url') : site_url('home'));

        return <<<HTML
        <a class="text-decoration-none" href="{$url}">Back to Activity</a>
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
        return <<<HTML
        <button class="btn shadow-sm mr-1 btn-success mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Add</button>
        HTML;
    }
}

if (!function_exists('btn_simpan')) {
    // Creates a button to save data
    function btn_simpan()
    {
        return <<<HTML
        <button class="btn shadow-sm mt-4 mb-4 mr-1 btn-success" type="submit">Save Data</button>
        HTML;
    }
}

if (!function_exists('btn_tutup')) {
    // Creates a button to close a dialog or modal
    function btn_tutup()
    {
        return <<<HTML
        <button class="btn shadow-sm mb-2 btn-primary" data-dismiss="modal">Close</button>
        HTML;
    }
}

if (!function_exists('btn_book')) {
    // Creates a button to book an item
    function btn_book($value)
    {
        return <<<HTML
        <a class="btn shadow-sm btn-light border border-dark text-success mb-2" type="button" data-toggle="modal"
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
        <button type="button" class="btn shadow-sm btn-primary view-toggle active" data-target="card-view"><i
            class="fas fa-th-large"></i></button>
        <button type="button" class="btn shadow-sm btn-primary view-toggle" data-target="table-view"><i
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
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-info" type="button" data-toggle="modal"
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
        return <<<HTML
        <button class="btn shadow-sm mt-4 mr-1 btn-success" onclick="return confirm('Save Changes?')" type="submit">Save Changes</button>
        HTML;
    }
}

if (!function_exists('btn_update_field')) {
    // Creates a button to update data with a confirmation prompt
    function btn_update_field($field)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $placeholder = xss_clean('Save changes to ' . $data[$field . '_alias']);

        return <<<HTML
        <button class="btn shadow-sm mt-4 mr-1 btn-success" type="submit" 
        onclick="return confirm({$placeholder})">Save Changes</button>
        HTML;
    }
}

if (!function_exists('btn_cari')) {
    // Creates a search button
    function btn_cari()
    {
        return <<<HTML
        <button class="btn shadow-sm mr-1 mb-2 btn-success" name="search" type="submit">
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


        $controller = $data[$tabel];

        $url = xss_clean(site_url($controller . '/' . $value . '/sync_theme'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-primary" onclick="return confirm('Sync with {$value}?')" href="{$url}">
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

        $url = xss_clean(site_url($data[$table] . '/' . $id));

        return <<<HTML
        <a class="text-decoration-none" href="{$url}" target="_blank"> Read more</a>
        HTML;
    }
}

if (!function_exists('btn_value')) {
    // Creates a button with a specific value for a table
    function btn_value($table, $id, $function, $logo)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $url = xss_clean(site_url($data[$table] . '/' . $id . '/' . $function));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-warning"
                href="{$url}">
                {$logo}</a>
        HTML;
    }
}

if (!function_exists('btn_lihat')) {
    // Creates a button to view details
    function btn_lihat($value)
    {
        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-primary" type="button" data-toggle="modal"
            data-target="#lihat{$value}">
            <i class="fas fa-eye"></i></a>
        HTML;
    }
}

if (!function_exists('btn_edit')) {
    // Creates a button to edit details
    function btn_edit($value)
    {
        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-warning" type="button" data-toggle="modal"
              data-target="#ubah{$value}">
              <i class="fas fa-edit"></i></a>
        HTML;
    }
}

if (!function_exists('btn_filter')) {
    // Generates a button to print a report for a specific table
    function btn_filter()
    {
        return <<<HTML
        <button class="btn shadow-sm mr-1 btn-primary mb-4" type="button" data-toggle="modal" data-target="#filter">
            <i class="fas fa-filter"></i> Filter
        </button>
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

        $controller = $data[$tabel];


        $url = xss_clean(site_url($controller . '/laporan'));

        return <<<HTML
        <button class="btn shadow-sm mr-1 btn-info dropdown-toggle mb-4" type="button" data-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-print"></i> Export
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" target="_blank" href="{$url}"><i class="fas fa-file-pdf"></i> PDF</a>
        </div>
        HTML;
    }
}

if (!function_exists('btn_archive')) {
    // Generates a button to print a report for a specific table
    function btn_archive($tabel)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];


        $url = xss_clean(site_url($controller . '/archive'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 btn-outline-secondary mb-4" href="{$url}" target="_blank">
            <i class="fas fa-trash"></i> Trash</a>
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


        $controller = $data[$tabel];


        $url = xss_clean(site_url($controller . '/' . $value . '/print'));

        return <<<HTML
        <a class="btn shadow-sm btn-light border border-dark text-info mb-2" href="{$url}"
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

        $alias = $data[$tabel . '_alias'];
        $controller = $data[$tabel];
        $url = site_url($controller . $function);

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-info text-light" href="{$url}">
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

        $controller = $data[$tabel];

        $url = site_url($controller . $function);

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-danger" type="button" href="{$url}">
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


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/soft_delete'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-danger" onclick="return confirm('apakah data {$alias} ingin dihapus?')"
              href="{$url}">
              <i class="fas fa-trash"></i></a>
        HTML;
    }
}

if (!function_exists('btn_hapus_cepat')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_hapus_cepat($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/soft_delete'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-danger"
              href="{$url}">
              <i class="fas fa-trash"></i></a>
        HTML;
    }
}

if (!function_exists('btn_restore')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_restore($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/restore'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-primary" onclick="return confirm('apakah data {$alias} ingin dikembalikan?')"
              href="{$url}">
              <i class="fas fa-trash-restore"></i></a>
        HTML;
    }
}

if (!function_exists('btn_push')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_push($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/push'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-primary" onclick="return confirm('apakah data {$alias} ingin dikembalikan?')"
              href="{$url}">
              <i class="fas fa-arrow-up"></i></a>
        HTML;
    }
}

if (!function_exists('btn_history')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_history($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];

        $url = xss_clean(site_url($controller . '/' . $value . '/history'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-primary"
              href="{$url}" target="_blank">
              <i class="fas fa-history"></i></a>
        HTML;
    }
}

if (!function_exists('btn_hapus_full')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_hapus_full($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/delete'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-danger" onclick="return confirm('apakah data {$alias} ingin dihapus (tindakan ini tidak dapat dikembalikan)?')"
              href="{$url}">
              <i class="fas fa-times"></i></a>
        HTML;
    }
}

if (!function_exists('btn_truncate')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_truncate($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/soft_truncate'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-danger" onclick="return confirm('apakah semua data {$alias} ingin dihapus (tindakan ini tidak dapat dikembalikan)?')"
              href="{$url}">
              <i class="fas fa-dumpster"></i></a>
        HTML;
    }
}

if (!function_exists('btn_truncate_full')) {
    // Creates a button to delete specific data with a confirmation prompt
    function btn_truncate_full($tabel, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();


        $controller = $data[$tabel];
        $alias = $data[$tabel . '_alias'];

        $url = xss_clean(site_url($controller . '/' . $value . '/truncate'));

        return <<<HTML
        <a class="btn shadow-sm mr-1 mb-2 btn-light border border-dark text-danger" onclick="return confirm('apakah semua data {$alias} ingin dihapus (tindakan ini tidak dapat dikembalikan)?')"
              href="{$url}">
              <i class="fas fa-dumpster-fire"></i></a>
        HTML;
    }
}

if (!function_exists('btn_action')) {

    function btn_action($tabel, $function, $id, $logo, $theme)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $controller = $data[$tabel];
        $url = xss_clean(site_url($controller . '/' . $id . '/' . $function));

        return <<<HTML
        <a class="btn shadow-sm mr-2 mb-2 {$theme}" href="{$url}">
        {$logo}</a>
        HTML;
    }
}

if (!function_exists('card_pagination')) {

    function card_pagination()
    {
        return <<<HTML
        <nav aria-label="Page navigation" class="my-4">
            <ul class="pagination justify-content-center" id="pagination-numbers">
            <li class="page-item">
                <button class="shadow-sm page-link" id="prev-btn" onclick="prevPage()">Previous</button>
            </li>
            <li class="page-item">
                <span id="page-info" style="display: inline-block; padding: 0.5rem 1rem; color: #000;">Page Info</span>
            </li>
            <li class="page-item">
                <button class="shadow-sm page-link" id="next-btn" onclick="nextPage()">Next</button>
            </li>
            </ul>
        </nav>
        HTML;
    }
}
