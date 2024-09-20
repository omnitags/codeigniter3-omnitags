<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><br><span class="h6"> Unread: <?= $notif_count ?></span><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk):
      echo tampil_dekor('175px', $tabel_b1, $dk->$tabel_b1_field4);
    endforeach ?>
  </div>
</div>
<hr>


<div class="row">
  <div class="col-md-10">
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>


<div id="card-view" class="row data-view active">
  <?php if (empty($tbl_b9->result())) {
    load_view('_partials/no_data');
  } else {
    $counter = 1;
    foreach ($tbl_b9->result() as $tl_b9):
      if ($tl_b9->read_at == NULL) {
        echo card_regular(
          $counter,
          $tl_b9->$tabel_b8_field3,
          $tl_b9->$tabel_b9_field4 . '<br>' .
          $tl_b9->created_at,
          btn_value('tabel_b9', $tl_b9->$tabel_b9_field1, 'lihat', '<i class="fas fa-envelope-open"></i>') .
          btn_lihat($tl_b9->$tabel_b9_field1) . btn_hapus_cepat('tabel_b9', $tl_b9->$tabel_b9_field1),
          'text-dark bg-white',
          'col-md-3',
          $tabel_b9,
        );
      } else {
        echo card_regular(
          $counter,
          $tl_b9->$tabel_b8_field3,
          $tl_b9->$tabel_b9_field4 . '<br>' .
          $tl_b9->created_at,
          btn_lihat($tl_b9->$tabel_b9_field1) . btn_hapus_cepat('tabel_b9', $tl_b9->$tabel_b9_field1),
          'text-dark bg-light',
          'col-md-3',
          $tabel_b9,
        );
      }
      $counter++;
    endforeach;
  } ?>

  <nav aria-label="Page navigation" class="my-4">
    <ul class="pagination justify-content-center" id="pagination-numbers">
      <li class="page-item">
        <button class="page-link" id="prev-btn" onclick="prevPage()">Previous</button>
      </li>
      <li class="page-item">
        <span id="page-info" style="display: inline-block; padding: 0.5rem 1rem; color: #000;">Page Info</span>
      </li>
      <li class="page-item">
        <button class="page-link" id="next-btn" onclick="nextPage()">Next</button>
      </li>
    </ul>
  </nav>
</div>



<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b8_field3_alias') ?></th>
        <th><?= lang('tabel_b9_field4_alias') ?></th>
        <th><?= lang('created_at') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b9->result() as $tl_b9):
        if ($tl_b9->read_at == NULL) { ?>
          <tr class="bg-white">
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->created_at ?></td>
            <td>
              <?= btn_value('tabel_b9', $tl_b9->$tabel_b9_field1, 'lihat', '<i class="fas fa-envelope-open"></i>') ?>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          </tr>
        <?php } else { ?>
          <tr class="bg-light">
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->created_at ?></td>
            <td>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          </tr>
        <?php }endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_b9->result() as $tl_b9): ?>
  <div id="lihat<?= $tl_b9->$tabel_b9_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <?= modal_header_id(lang('tabel_b9_alias'), $tl_b9->$tabel_b9_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b8_field3', $tl_b9->$tabel_b8_field3) .
              row_data('tabel_b9_field4', html_entity_decode($tl_b9->$tabel_b9_field4)) .
              row_data_crud('created_at', $tl_b9->created_at) .
              row_data_crud('read_at', $tl_b9->read_at),
              'table-light',
            ) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>

<script>
  const totalCards = <?= $tbl_b9->num_rows() ?>;
  const cardsPerPage = 30;
  let currentPage = 1;
  const uniqueIds = <?= json_encode($unique_ids) ?>; // Pass the IDs from PHP

  function displayCards() {
    // Hide all cards first
    uniqueIds.forEach(id => {
      const card = document.getElementById("card-" + id);
      if (card) {
        card.style.display = "none";
      }
    });

    // Calculate the range of cards to display
    const start = (currentPage - 1) * cardsPerPage;
    const end = Math.min(start + cardsPerPage, uniqueIds.length);

    // Show the cards for the current page
    for (let i = start; i < end; i++) {
      const card = document.getElementById("card-" + uniqueIds[i]);
      if (card) {
        card.style.display = "block";
      }
    }

    // Update page info
    document.getElementById("page-info").textContent = `Page ${currentPage} of ${Math.ceil(uniqueIds.length / cardsPerPage)}`;
  }

  window.onload = displayCards;

</script>

<?= load_card_pagination_js($tbl_b9->num_rows(), 28) ?>