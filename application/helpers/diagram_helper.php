<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Generates a card header with a title, subtitle, and a close button
if (!function_exists('bar_graph')) {
    function bar_graph($id)
    {        
        return <<<HTML
        <div class="col-md-6 px-2 px-sm-3 dashboard-stat-box">
            <canvas id="{$id}" width="200" height="125"></canvas>
        </div>
        HTML;
    }
}