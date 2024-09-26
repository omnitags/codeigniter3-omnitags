<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('chart')) {
    // Generates JavaScript code for rendering a chart
    function chart($id, $tabel1, $tabel2)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $chart1 = $data['chart_' . $tabel1];
        $chart2 = $data['chart_' . $tabel2];
        $alias1 = $data[$tabel1 . '_alias'];
        $alias2 = $data[$tabel2 . '_alias'];

        return <<<HTML
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
            var ctx = document.getElementById({$id}).getContext('2d');
            var chartDatatabel_1 = {$chart1} // Data passed from controller
            var chartDatatabel_2 = {$chart2} // Data passed from controller

            var labelstabel_1 = chartDatatabel_1.map(function (item) {
                return item.label;
            });

            var valuestabel_1 = chartDatatabel_1.map(function (item) {
                return item.value;
            });

            var labelstabel_2 = chartDatatabel_2.map(function (item) {
                return item.label;
            });

            var valuestabel_2 = chartDatatabel_2.map(function (item) {
                return item.value;
            });

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelstabel_2,
                    datasets: [{
                        label: 'Jumlah {$alias2} Aktif',
                        data: valuestabel_2,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Jumlah {$alias1}',
                        data: valuestabel_1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        HTML;
    }
}
