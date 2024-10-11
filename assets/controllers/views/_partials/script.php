<!-- javascript untuk semua halaman (sesuai kebutuhan) -->
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>
<script src="popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- javascript untuk datatables bertema bootstrap -->
<script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

<!-- TableExport.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin/tableExport.min.js"></script>

<!-- Add Intro.js JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/intro.min.js"></script>

<!-- fungsi datatables (wajib ada) -->
<script type="text/javascript">
    $(document).ready(function () {
        // yg ini yang menggunakan toast
        <?= $this->session->flashdata('toast') ?>

        // yg di bawah ini adalah semua yg berhubungan dgn modal
        <?= $this->session->flashdata('modal') ?>

        $('#data').DataTable({
            "createdRow": function (row, data, dataIndex) {
                $(row).find('td:first').html(dataIndex + 1);
            },


        });
    });

    var table = $('#daterange_table').DataTable({

    })
</script>


<!-- Berikut ini adalah list projek2 mendatang yang ingin kubuat jika sudah mempunyai tim frontend
    Bagiku cukup sulit dalam menentukan pilihan terbaik dalam membuat quick tour
    1. Membuat guided tour yang bisa pergi ke halaman lain -->


<!-- Fitur di bawah ini adalah fitur oboarding yang berfungsi mengarahkan tamu untuk mengetahui fitur-fitur yang berhubungan dengan pesanan -->

<!-- Intro user publik -->
<script>
    // Initialize Intro.js
    // Wait for the DOM to be ready
    $(document).ready(function () {
        // Bind a click event to the button
        $("#startTour").on("click", function () {
            var intro = introJs();
            intro.setOptions({
                steps: [{
                    element: document.getElementById('tour1'),
                    intro: 'Ini adalah logo aplikasimu!',
                    position: 'bottom'
                },
                {
                    element: document.getElementById('tour2'),
                    intro: 'Ini adalah navigasi.',
                    position: 'bottom'
                }
                ]
            });
            intro.start();
        });
    });
</script>



<!-- Intro user tamu -->
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

<!-- Script below is for radio button -->
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

<!-- Script below is for checkboxes -->
<script>
    // JavaScript to disable all primary buttons once one is chosen
    $(document).ready(function () {
        $('.checkbox-group input[type="checkbox"]').change(function () {
            var checkboxes = $('.checkbox-group input[type="checkbox"]');
            var cards = $('.card-body');
            var checkedCheckbox = $(this);

            if (checkedCheckbox.prop('checked')) {
                checkboxes.parent().removeClass('btn-primary').addClass('btn-secondary');
                cards.parent().removeClass('bg-light').addClass('bg-light');
                checkedCheckbox.parent().addClass('active').addClass('btn-success');
                checkboxes.not(checkedCheckbox).prop('disabled', true).prop('required', false);
            } else {
                checkboxes.parent().removeClass('btn-secondary').addClass('btn-primary');
                cards.parent().removeClass('bg-secondary').addClass('bg-light');
                checkboxes.prop('disabled', false).prop('required', true);
                checkedCheckbox.parent().removeClass('active').removeClass('btn-success');
            }
        });




    });



</script>

<script>
    var ctx = document.getElementById('myChart_tabel_f2_tabel_f1').getContext('2d');
    var chartDatatabel_f1 = <?= $chart_tabel_f1 ?> // Data passed from controller
    var chartDatatabel_f2 = <?= $chart_tabel_f2 ?> // Data passed from controller

    var labelstabel_f1 = chartDatatabel_f1.map(function (item) {
        return item.label;
    });

    var valuestabel_f1 = chartDatatabel_f1.map(function (item) {
        return item.value;
    });

    var labelstabel_f2 = chartDatatabel_f2.map(function (item) {
        return item.label;
    });

    var valuestabel_f2 = chartDatatabel_f2.map(function (item) {
        return item.value;
    });

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelstabel_f2,
            datasets: [{
                label: 'Jumlah <?= $tabel_f2_alias ?> Aktif',
                data: valuestabel_f2,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Jumlah <?= $tabel_f1_alias ?>',
                data: valuestabel_f1,
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

<script>
    CKEDITOR.replace('editor1');
</script>

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

<script>
      function calculateCost() {
        console.log("calculateCost function called");

        let x = document.getElementById("<?= $tabel_e3_field6_input ?>_date").value;
        let y = document.getElementById("<?= $tabel_e3_field7_input ?>_date").value;

        console.log("x:", x);
        console.log("y:", y);

        // Create a Date object with the value from cek_in_date
        let startDateX = new Date(x).getTime();
        let startDateY = new Date(y).getTime();

        console.log("startDateX:", startDateX);
        console.log("startDateY:", startDateY);

        let timeStamp = startDateY - startDateX;

        console.log("timeStamp:", timeStamp);

        let numberDays = timeStamp / (1000 * 3600 * 24);

        console.log("numberDays:", numberDays);

        let valueku = numberDays * <?= $tabel_f2_field8_value1 ?>;

        console.log("valueku:", valueku);

        document.getElementById("<?= $tabel_f2_field8_input ?>_cost").value = valueku.toFixed(2); // Adjust if needed
      }


      function calculateCost2() {
        console.log("calculateCost function called");

        let x = document.getElementById("<?= $tabel_e3_field6_input ?>2_date").value;
        let y = document.getElementById("<?= $tabel_e3_field7_input ?>2_date").value;

        console.log("x:", x);
        console.log("y:", y);

        // Create a Date object with the value from cek_in_date
        let startDateX = new Date(x).getTime();
        let startDateY = new Date(y).getTime();

        console.log("startDateX:", startDateX);
        console.log("startDateY:", startDateY);

        let timeStamp = startDateY - startDateX;

        console.log("timeStamp:", timeStamp);

        let numberDays = timeStamp / (1000 * 3600 * 24);

        console.log("numberDays:", numberDays);

        let valueku = numberDays * <?= $tabel_f2_field8_value1 ?>;

        console.log("valueku:", valueku);

        document.getElementById("<?= $tabel_f2_field8_input ?>2_cost").value = valueku.toFixed(2); // Adjust if needed
      }

      // Trigger the calculation function on change of input values
      document.getElementById("<?= $tabel_e3_field6_input ?>_date").addEventListener("change", calculateCost);
      document.getElementById("<?= $tabel_e3_field7_input ?>_date").addEventListener("change", calculateCost);

      document.getElementById("<?= $tabel_e3_field6_input ?>2_date").addEventListener("change", calculateCost2);
      document.getElementById("<?= $tabel_e3_field7_input ?>2_date").addEventListener("change", calculateCost2);
    </script>