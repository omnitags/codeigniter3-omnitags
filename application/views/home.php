<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <?php switch (userdata($tabel_c2_field6)) {
      case $tabel_c2_field6_value5: ?>
        <div class="col-md-12">
          <?php break;

      default: ?>
          <div class="col-md-6 d-flex align-items-center">
            <div>
              <h1>Find a place that meets your needs</h1>
              <br>
              <a href="<?= site_url($tabel_f2) ?>" class="btn btn-primary shadow-sm mb-4">Book Now</a>
            </div>
          </div>

          <div class="col-md-6">
            <?php break;
    } ?>
        <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid shadow-sm rounded">
      </div>
    </div>
  </div>
<?php endforeach; ?>

<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value5: ?>

    <!-- method get supaya nilai dari form bisa tampil nanti (tidak langsung masuk ke database) -->
    <!-- <form action="<?= site_url($tabel_f2) ?>" method="get">
      <div id="tour2" class="row justify-content-center align-items-end mt-2">
        <div class="col-md-2">
          <?= add_min_max('date', 'tabel_f2_field10', 'required oninput="myFunction1()"', date('Y-m-d'), '') ?>
        </div>

        <div class="col-md-2">
          <?= add_min_max('date', 'tabel_f2_field11', 'required', date('Y-m-d', strtotime("+1 day")), '') ?>
        </div>

        <div class="col-md-2">
          <?= edit_min_max('number', 'tabel_f2_field8', '1', 'required readonly', '1', '10') ?>
        </div>

        <div class="col-md-1">
          <div class="form-group">
            <button class="btn btn-primary" type="submit">Pesan</button>
          </div>
        </div>
      </div>
    </form> -->
    <?php break;

  default: ?>
<?php } ?>

<h1 class="text-center">Recent Events</h1>
<hr>
<div id="card-view" class="row">
  <?php foreach ($tbl_b2->result() as $tl_b2): ?>
    <?php
    echo card_event(
      $tl_b2->$tabel_b2_field1,
      $tl_b2->$tabel_b2_field3,
      truncateText(html_entity_decode($tl_b2->$tabel_b2_field5), 110) . btn_read_more('tabel_b2', $tl_b2->$tabel_b2_field1),
      '',
      $tabel_b2,
      $tl_b2->$tabel_b2_field4,
      'text-white bg-dark'
    );
    ?>
  <?php endforeach; ?>
</div>

<br>
<br>
<br>

<!-- <h1>News about Apple</h1>
<div id="news-container"></div>
<br>
<br>
<br> -->

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <h1 class="text-center">About Us</h1>
  <hr>
  <div class="row">
    <div class="col-md-6">
      <p><?= html_entity_decode($tl_a1->$tabel_b7_field6) ?></p>
    </div>

    <div class="col-md-6">
      <?php foreach ($dekor->result() as $dk): ?>
        <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid rounded">
      <?php endforeach ?>
    </div>
  </div>
<?php endforeach ?>

<?= newsapi_apple('news-container') ?>

<!-- ?= adjust_date1($tabel_f2_field10_input, $tabel_f2_field11_input) ?> -->
<?= adjust_col_js('col-md-3', 'col-md-4') ?>