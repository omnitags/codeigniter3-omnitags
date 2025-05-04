<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('schema_js')) {
    // Generates JSON-LD schema markup for an organization
    function schema_js()
    {
        return <<<HTML
            <script type="application/ld+json">
            {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Your Organization",
            "url": "https://www.hotelkhenjy.com",
            "logo": "https://hotelkhenjy.com/assets/img/website_themes/christmas_logo.png",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+1-000-000-0000",
                "contactType": "Customer service"
            }
            }
            </script> 
        HTML;
    }
}

if (!function_exists('google_tag_iframe')) {
    // Generates Google Tag Manager iframe code
    function google_tag_iframe()
    {
        return <<<HTML
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX34Q9MK"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        HTML;
    }
}

if (!function_exists('google_tag_js')) {
    // Generates Google Tag Manager JavaScript code
    function google_tag_js()
    {
        return <<<HTML
        <!-- Google Tag Manager -->
        <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', 'GTM-MX34Q9MK');</script>
        <!-- End Google Tag Manager -->
        HTML;
    }
}

if (!function_exists('export_to_excel_js')) {
    // Generates JavaScript code for exporting data to Excel
    function export_to_excel_js()
    {
        return <<<HTML
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <!-- TableExport.js -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin/tableExport.min.js"></script>

        HTML;
    }
}

if (!function_exists('chart')) {
    // Generates JavaScript code for rendering a chart
    function chart($tabel1, $tabel2)
    {
        // Get CodeIgniter instance
        $CI =& get_instance();
        // Fetch the view variables
        $data = $CI->load->get_vars();

        $chart1 = $data['chart_' . $tabel1];
        $chart2 = $data['chart_' . $tabel2];
        $alias1 = lang($tabel1 . '_alias');
        $alias2 = lang($tabel2 . '_alias');

        return <<<HTML
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        
        <script>
            var ctx = document.getElementById('myChart_1_2').getContext('2d');
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


if (!function_exists('intro_js')) {
    // Generates JavaScript code for Intro.js library
    function intro_js()
    {
        return <<<HTML
        <!-- Add Intro.js JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/intro.min.js"></script>
        <script>
            // Initialize Intro.js
            // Wait for the DOM to be ready

            // Bind a click event to the button
            $("#introTamu").on("click", function () {
                var intro = introJs();
                intro.setOptions({
                    steps: [
                        // I want to have this one but I think it doesn't really recessary anymore since it doesn't even work yet
                        // {
                        //   title: 'Quick Tour',
                        //   intro: 'Ayo ikuti tour ini'
                        // }, 
                        {
                            element: document.getElementById('tour1'),
                            intro: 'Anda sekarang sudah bisa mencari serta mengelola pesanan Anda!',
                            position: 'bottom'
                        },
                        {
                            element: document.getElementById('tour2'),
                            intro: 'Anda bisa memesan kamar di sini.',
                            position: 'top'
                        }

                    ],
                    // dontShowAgain: true,
                })
                intro.start();
            });
        </script>
        HTML;

    }
}


if (!function_exists('radio_js')) {
    // Generates JavaScript code to make radio buttons required and stop validation once one option is picked
    function radio_js($value)
    {
        return <<<HTML
        <script>
            // JavaScript to make radio buttons required and stop validation once one option is picked
            document.addEventListener('DOMContentLoaded', function () {
                var radioGroup = document.querySelectorAll('input[type="radio"].custom-radio');

                radioGroup.forEach(function (radio) {
                    radio.addEventListener('change', function () {
                        // Set "required" attribute to false for all radio buttons
                        radioGroup.forEach(function (r) {
                            r.required = false;
                        });

                        // Find the checked radio button and set "required" attribute to true
                        var checkedRadio = document.querySelector('input[type="radio"].custom-radio:checked');
                        if (checkedRadio) {
                            checkedRadio.required = true;
                        }
                    });
                });
            });
        </script>
        HTML;

    }
}


if (!function_exists('checkbox_js')) {
    // Generates JavaScript code to handle checkbox group behavior
    function checkbox_js($value)
    {
        return <<<HTML
        <script>
            $(document).ready(function () {
                // Handle change event for checkboxes within the checkbox group
                $('#checkbox{$value} input[type="checkbox"]').change(function () {
                    var checkboxes = $('#checkbox{$value} input[type="checkbox"]');
                    var checkedCheckbox = $(this);

                    if (checkedCheckbox.prop('checked')) {
                        checkboxes.parent().removeClass('btn-primary btn-success').addClass('btn-secondary');
                        checkedCheckbox.parent().removeClass('btn-secondary').addClass('active btn-success');
                        checkboxes.not(checkedCheckbox).prop('disabled', true).prop('required', false);
                    } else {
                        checkboxes.parent().removeClass('btn-secondary').addClass('btn-primary');
                        checkboxes.prop('disabled', false).prop('required', true);
                        checkedCheckbox.parent().removeClass('active btn-success');
                    }
                });
            });
        </script>
        HTML;

    }
}

if (!function_exists('adjust_date1')) {
    // Generates JavaScript code to adjust the minimum date for a date input field
    function adjust_date1($input1, $input2)
    {
        return <<<HTML
        <script>
        function myFunction1() {
            let x = document.getElementById("{$input1}").value;

            // Create a Date object with the value from cek_in_date
            let startDate = new Date(x);

            // Add one day to the date
            startDate.setDate(startDate.getDate() + 1);

            // Format the date to YYYY-MM-DD (same as input type date)
            let formattedDate = startDate.toISOString().split('T')[0];


            document.getElementById("{$input2}").min = formattedDate;
            document.getElementById("{$input2}").value = formattedDate;

        }
        </script>
        HTML;

    }
}

if (!function_exists('adjust_date2')) {
    // Generates JavaScript code to adjust the minimum date for a date input field
    function adjust_date2($input1, $input2)
    {
        return <<<HTML
        <script>
        function myFunction2() {
            let x = document.getElementById("{$input1}").value;

            // Create a Date object with the value from cek_in_date
            let startDate = new Date(x);

            // Add one day to the date
            startDate.setDate(startDate.getDate() + 1);

            // Format the date to YYYY-MM-DD (same as input type date)
            let formattedDate = startDate.toISOString().split('T')[0];


            document.getElementById("{$input2}").min = formattedDate;
            document.getElementById("{$input2}").value = formattedDate;

        }
        </script>
        HTML;

    }
}

if (!function_exists('adjust_date3')) {
    // Generates JavaScript code to adjust the minimum date for multiple date input fields
    function adjust_date3($input1, $input2, $input3, $input4)
    {
        return <<<HTML
        <script>
        function myFunction3() {
            let x = document.getElementById("{$input1}").value;

            // Create a Date object with the value from cek_in_date
            let startDate = new Date(x);

            // Add one day to the date
            startDate.setDate(startDate.getDate() + 1);

            // Format the date to YYYY-MM-DD (same as input type date)
            let formattedDate = startDate.toISOString().split('T')[0];


            document.getElementById("{$input2}").min = formattedDate;
            document.getElementById("{$input3}").min = formattedDate;
            document.getElementById("{$input4}").min = formattedDate;
            
            document.getElementById("{$input2}").value = formattedDate;
            document.getElementById("{$input3}").value = formattedDate;
            document.getElementById("{$input4}").value = formattedDate;

        }
        </script>
        HTML;

    }
}

if (!function_exists('adjust_date4')) {
    // Generates JavaScript code to adjust the minimum date for a date input field
    function adjust_date4($input1, $input2, $input3, $input4)
    {
        return <<<HTML
        <script>
        function myFunction4() {
            let x = document.getElementById("{$input1}").value;

            // Create a Date object with the value from cek_in_date
            let startDate = new Date(x);

            // Add one day to the date
            startDate.setDate(startDate.getDate() + 1);

            // Format the date to YYYY-MM-DD (same as input type date)
            let formattedDate = startDate.toISOString().split('T')[0];


            document.getElementById("{$input2}").min = formattedDate;
            document.getElementById("{$input2}").value = formattedDate;

        }
        </script>
        HTML;

    }
}

if (!function_exists('adjust_col_js')) {
    // Generates JavaScript code to adjust column sizes based on screen width
    function adjust_col_js()
    {
        return <<<HTML
        <script>
        function adjustColumns() {
            // Get the current width of the viewport
            const screenWidth = window.innerWidth;

            // Define the breakpoint for switching column sizes
            const breakpoint = 1024; // You can adjust this value based on your needs

            // Select all elements with the class "col-md-3"
            const colMd3Elements = document.querySelectorAll(".col-md-3");

            // Loop through each element
            colMd3Elements.forEach(element => {
            if (screenWidth >= breakpoint) {
                // If screen size is greater than or equal to breakpoint, set class to col-md-4
                element.classList.add("col-md-3");
                element.classList.remove("col-md-4");
            } else {
                // If screen size is less than breakpoint, set class to col-md-3
                element.classList.remove("col-md-3");
                element.classList.add("col-md-4");
            }
            });
        }

        // Call the adjustColumns function on window resize
        window.addEventListener("resize", adjustColumns);

        // Call the adjustColumns function on page load to handle initial layout
        adjustColumns();
        </script>
        HTML;

    }
}


if (!function_exists('password_js')) {
    // Generates JavaScript code to validate password strength
    function password_js()
    {
        return <<<HTML
        <script>
            var myInput = document.getElementById("psw");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function () {
                document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function () {
                document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function () {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>
        HTML;

    }
}


