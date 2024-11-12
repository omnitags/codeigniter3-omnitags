<!-- halaman peringatan untuk pengguna yang masuk ke halaman tanpa akses yang sesuai -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Khenjy Johnelson">

  <base href="<?= base_url('assets/') ?>">
  <title><?= $title ?></title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <script src="ckeditor/ckeditor.js"></script>

  <!-- css untuk datatables bertema bootstrap -->
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">

  <!-- Add Intro.js CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/introjs.min.css">

  <!-- css pribadi -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/floating-labels.css">

  <?php load_view('partials/pre-script') ?>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-auto">
        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
        <div class="d-flex justify-content-center">
          <?= back_to_activity() ?>
        </div>
      </div>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>
</body>

</html>