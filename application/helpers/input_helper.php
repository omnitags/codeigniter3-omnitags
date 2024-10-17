<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('post')) {
    function post($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_POST;
        }

        if (isset($_POST[$key])) {
            $value = $_POST[$key];

            if ($xss_clean) {
                $value = $value;
            }

            return $value;
        }

        return null;
    }
}

if (!function_exists('get')) {
    function get($key = null, $xss_clean = false)
    {
        if ($key === null) {
            return $_GET;
        }

        if (isset($_GET[$key])) {
            $value = $_GET[$key];

            if ($xss_clean) {
                $value = $value;
            }

            return $value;
        }

        return null;
    }
}

if (!function_exists('xss_clean')) {
    function xss_clean($data)
    {
        // Here, a simple implementation using htmlspecialchars
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $value;
            }
        } else {
            $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        return $data;
    }
}

if (!function_exists('input_add')) {
    function input_add($type, $field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = $data[$field . '_alias'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_min_max')) {
    function add_min_max($type, $field, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = $data[$field . '_alias'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}"
            min="{$min}" max="{$max}">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('edit_min_max')) {
    function edit_min_max($type, $field, $value, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];
        $alias = $data[$field . '_alias'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}"
            min="{$min}" max="{$max}" value="{$value}">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_old')) {
    function add_old($type, $field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = 'Old '. $data[$field . '_alias'];
        $input = $data[$field . '_old'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_new_password')) {
    function add_new_password($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = 'New '. $data[$field . '_alias'];
        $input = $data[$field . '_new'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="password" {$required} name="{$input}" placeholder="" id="psw"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="new-password"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            <label for="psw" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}


if (!function_exists('add_confirm')) {
    function add_confirm($type, $field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = 'Confirm ' . $data[$field . '_alias'];
        $input = $data[$field . '_confirm'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('select_add')) {
    function select_add($field, $tbl, $target_id, $target_name, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        // Start building the select HTML
        $select_html = <<<HTML
        <div class="form-group shadow-sm">
            <select id="{$input}" class="form-control float" {$required} name="{$input}">
        HTML;

        // Loop through the results to generate options
        foreach ($tbl->result() as $obj) {
            $value = $obj->$target_id;
            $label = $obj->$target_id . ' - ' . $obj->$target_name;
            $select_html .= <<<HTML
                <option value="{$value}">{$label}</option>
        HTML;
        }

        // Close the select element and the div container
        $select_html .= <<<HTML
            </select>
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;

        return $select_html;
    }
}

if (!function_exists('select_edit')) {
    function select_edit($field, $value, $tbl, $target_id, $target_name, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        // Set alias and input field names
        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        // Start building the select HTML
        $select_html = <<<HTML
        <div class="form-group shadow-sm">
            <select id="{$input}" class="form-control float" {$required} name="{$input}">
        HTML;

        // Loop through the results to generate options
        foreach ($tbl->result() as $obj) {
            $option_value = $obj->$target_id;
            $label = $obj->$target_name;

            // Check if the current option is the selected one
            if ($value == $option_value) {
                $select_html .= <<<HTML
                    <option selected value="{$option_value}">{$label}</option>
                HTML;
            } else {
                $select_html .= <<<HTML
                    <option value="{$option_value}">{$label}</option>
                HTML;
            }
        }

        // Close the select element and the div container
        $select_html .= <<<HTML
            </select>
            <label for="{$input}" class="form-label">{$alias}</label>
        </div>
        HTML;

        return $select_html;
    }
}



if (!function_exists('input_hidden')) {
    function input_hidden($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];

        return <<<HTML
        <input type="hidden" name="{$input}" placeholder="" {$required} value="{$value}">
        HTML;
    }
}

if (!function_exists('input_edit')) {
    function input_edit($identifier, $type, $field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input id="{$input}{$identifier}" class="form-control float" type="{$type}" {$required} name="{$input}" placeholder=""
            value="{$value}">
            <label for="{$input}{$identifier}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('input_ckeditor')) {
    function input_ckeditor($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <label>{$alias} {$msg}</label>
        <div class="form-group shadow-sm">
            <textarea class="ckeditor form-control" name="{$input}" placeholder=""
            {$required} cols="30" rows="10">{$value}</textarea>
        </div>
        HTML;
    }
}


if (!function_exists('input_textarea')) {
    function input_textarea($field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <textarea class="form-control float" name="{$input}" placeholder=""
            {$required} rows="5">{$value}</textarea>
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('add_file')) {
    function add_file($field, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <input class="form-control float" {$required} type="file" id={$input} name="{$input}" placeholder="">
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('edit_file')) {
    function edit_file($tabel, $field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = $data[$field . '_alias'];
        $input = $data[$field . '_input'];
        $old = $data[$field . "_old"];
        $img = tampil_image('125px', $tabel, $value, $alias);

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="row pb-2">
            <div class="col-md-5">
                <div class="form-group shadow-sm">
                    {$img}                
                </div>
            </div>
            <div class="col-md-7">
                <div class="form-group shadow-sm">
                    <input class="form-control float" {$required} id="{$input}" type="file" name="{$input}">
                    <label class="form-label" for="{$input}">Ubah {$alias} {$msg}</label>
                    <input type="hidden" name="{$old}" value="{$value}" {$required}>
                </div>
            </div>
        </div>
        HTML;
    }
}

if (!function_exists('filter_min_max')) {
    function filter_min_max($type, $posisi, $field, $required, $min, $max)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field];
        $value = $data[$field . "_value"];

        return <<<HTML
        <td class="pr-2">
            <div class="form-group shadow-sm">
                <input class="form-control float" type="{$type}" {$required} name="{$input}" placeholder="" id="{$input}"
                min="{$min}" max="{$max}" value="{$value}">
                <label for="{$input}" class="form-label">{$posisi}</label>
            </div>
        </td>
        HTML;
    }
}


if (!function_exists('select_add')) {
    function select_add($field, $selected, $values, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = 'Select ' . $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <select id="{$input}" class="form-control float" {$required} name="{$input}" placeholder="">
                {$selected}
                {$values}
            </select>
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('select_ubah')) {
    function select_ubah($field, $selected, $values, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $alias = 'Select ' . $data[$field . '_alias'];
        $input = $data[$field . '_input'];

        if (strpos($required, 'required') !== false) {
            $msg = '';
        } else {
            $msg = '(Optional)';
        }

        return <<<HTML
        <div class="form-group shadow-sm">
            <select id="{$input}" class="form-control float" {$required} name="{$input}" placeholder="">
                {$selected}
                {$values}
            </select>
            <label for="{$input}" class="form-label">{$alias} {$msg}</label>
        </div>
        HTML;
    }
}

if (!function_exists('btn_checkbox')) {
    function btn_checkbox($id, $detail, $field, $value, $required)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $input = $data[$field . '_input'];

        return <<<HTML
        <div class="checkbox-group" id="checkbox{$id}">

        <div class="btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary w-100">

            <p class="card-text">{$detail}</p>
            <input type="checkbox" name="{$input}"
            class="checkbox-option form-control-lg" value="{$value}" {$required}>
        </label>
        </div>
        </div>
        HTML;
    }
}


if (!function_exists('option_selected')) {
    function option_selected($value, $alias)
    {
        return <<<HTML
        <option selected hidden value="{$value}">{$alias}</option>
        HTML;
    }
}

if (!function_exists('options_selected_multi')) {
    function options_selected_multi($tabel2, $id1, $id2, $value)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $tabel2 = $data[$tabel2];

        $output = '';

        if ($id1 != $id2) {
            // You might want to handle non-matching cases here if needed
        } else {
            $output .= '<option selected hidden value="' . $id2 . '">' . $value . '</option>';
        }

        return $output;
    }
}

if (!function_exists('options')) {
    function options($value, $alias)
    {
        return <<<HTML
        <option value="{$value}">{$alias}</option>
        HTML;
    }
}

if (!function_exists('option_b1')) {
    function option_b1()
    {
        return <<<HTML
        <option value="a">a</option>
        <option value="b">b</option>
        <option value="c">c</option>
        <option value="d">d</option>
        <option value="e">e</option>
        <option value="f">f</option>
        <option value="o">o</option>
        HTML;
    }
}
