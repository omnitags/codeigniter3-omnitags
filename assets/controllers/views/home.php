<?php foreach ($tbl_a1 as $tl_a1): ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <?php foreach ($tbl_b2 as $tl_b2): ?>
    <?php if ($tl_a1->$tabel_a1_field6 == $tl_b2->$tabel_a1_field6) { ?>

      <h1 class="text-center"><?= $tl_b2->$tabel_b2_field3 ?></h1>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <img src="img/<?= $tabel_b2 ?>/<?= $tl_b2->$tabel_b2_field4 ?>" class="img-fluid rounded">
        </div>
        
        <div class="col-md-6">
          <p><?= html_entity_decode($tl_b2->$tabel_b2_field5) ?></p>
        </div>
      </div>


    <?php } ?>
  <?php endforeach ?>
<?php endforeach ?>

<br>
<br>
<br>




<?php foreach ($tbl_a1 as $tl_a1): ?>
  <h1 class="text-center">Tentang Kami</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= html_entity_decode($tl_a1->$tabel_b7_field6) ?></p>
    </div>

    <div class="col-md-6">
      <?php foreach ($dekor as $dk): ?>
        <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid rounded">
      <?php endforeach ?>
    </div>
  </div>
<?php endforeach ?>


<!-- Ide baru : menambahkan fitur tabel_f2
Tapi ketika user sudah login saja, jika tidak, maka menampilkan tombol login -->

<script>
  function myFunction() {
    let x = document.getElementById("<?= $tabel_f2_field10 ?>_date").value;

    // Create a Date object with the value from cek_in_date
    let startDate = new Date(x);

    // Add one day to the date
    startDate.setDate(startDate.getDate() + 1);

    // Format the date to YYYY-MM-DD (same as input type date)
    let formattedDate = startDate.toISOString().split('T')[0];


    document.getElementById("<?= $tabel_f2_field11 ?>_date").min = formattedDate;
    document.getElementById("<?= $tabel_f2_field11 ?>_date").value = formattedDate;

  }
</script>