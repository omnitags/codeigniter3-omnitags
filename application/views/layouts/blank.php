<!DOCTYPE html>
<html lang="en">

<?php load_view($head) ?>

<body>
    <?php foreach ($tbl_a1 as $tl_a1): ?>
        <div id="background-image">
            <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
        </div>
    <?php endforeach ?>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!-- membuat konten berada tepat di tengah2 halaman  -->
        <div class="row justify-content-center align-items-center w-100">
            <div class="col-lg-5 logpage">

                <!-- link kembali -->
                <?= back_to_home() ?>
                <?= load_view($konten) ?>
            </div>
        </div>
    </div>



    <style>
        /* Apply styles to the background image container */
        #background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            /* Ensure the background image is behind other content */
        }

        /* Apply blur effect to the background image */
        #background-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: blur(5px);
            /* Adjust blur intensity as needed */
            transform: scale(1.1);
        }

        /* Other styles for your form and other content */
        .container {
            position: relative;
            /* Ensure other content stays on top */
            z-index: 1;
            /* Ensure other content stays on top */
        }
    </style>

    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.js"></script>
</body>

</html>