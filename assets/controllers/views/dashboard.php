<!-- mengarahkan ke no_level jika user tidak memiliki level -->
<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1>
  <?= $title ?>
  <?= $phase ?>
</h1>

<hr>
<div class="row">
  <!-- menampilkan data untuk administrator -->

  <?php switch ($this->session->userdata($tabel_c2_field6)) {
    case $tabel_c2_field6_value3: ?>
      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_c2_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_c2 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_c2 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_c1_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_c1 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_c1 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_d3_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_c1 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_d3 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    default: ?>


  <?php } ?>
</div>

<br>
<hr>


<div class="row">

  <!-- menampilkan data untuk administrator -->

  <?php switch ($this->session->userdata($tabel_c2_field6)) {
    case $tabel_c2_field6_value3: ?>
      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_e4_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_e4 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_e4 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_e3_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_e3 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_e3 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_e2_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_e2 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_e2 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_e1_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_e1 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_e1 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    case $tabel_c2_field6_value4: ?>
      <div class="col-md-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_e3_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_e3 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_e3 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-md-3 mt-2">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_f2_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_f2 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_f2 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    case $tabel_c2_field6_value2: ?>
      <div class="col-md-3 mt-2">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel_f3_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl_f3 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel_f3 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;


    default: ?>


  <?php } ?>
</div>

<!-- The charts shown will be different for each user level -->
<h2 class="mt-4">Statistik</h2>
<hr>
<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    ?>
    <div class="row mt-4">
      <div class="col-md-6 px-2 px-sm-3 dashboard-stat-box">
        <canvas id="myChart_tabel_f2_tabel_f1" width="200" height="125"></canvas>
      </div>
    </div>
    <?php break;

  default:
    break;
}
?>



<h2 class="mt-4">Detail Website</h2>
<hr>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <div class="col-md-6">

      <div class="table-responsive">
        <table class="table table-light" id="data">
          <thead></thead>
          <tbody>
            <tr>
              <td class="table-secondary table-active"><?= $tabel_a1_field2_alias ?></td>
              <td class="table-light"><?= $tl_a1->$tabel_a1_field2 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel_a1_field3_alias ?></td>
              <td class="table-light"><?= $tl_a1->$tabel_a1_field3 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel_a1_field4_alias ?></td>
              <td class="table-light"><?= $tl_a1->$tabel_a1_field4 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel_a1_field5_alias ?></td>
              <td class="table-light"><?= $tl_a1->$tabel_a1_field5 ?></td>
            </tr>

            <?php foreach ($sosmed as $sm):
              if ($sm->$tabel_b6_field2 == $tl_a1->$tabel_a1_field1) { ?>
                <tr>
                  <td class="table-secondary table-active"><?= $sm->$tabel_b6_field3 ?></td>
                  <td class="table-light"><a class="text-decoration-none text-primary" href="<?= $sm->$tabel_b6_field4 ?>"
                      target="_blank">
                      Visit</a>
                </tr>
              <?php } endforeach; ?>

          </tbody>
          <tfoot></tfoot>
        </table>
      </div>

    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  </div>
<?php endforeach; ?>




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