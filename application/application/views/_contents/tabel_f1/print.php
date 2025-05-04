<!-- menampilkan data pesanan sebagai ps -->
<?php foreach ($tbl_f1->result() as $tl_f1): ?>
  <!-- menampilkan data pemesan -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f1_field2_alias') ?></th>
        <th><?= lang('tabel_f1_field4_alias') ?></th>
        <th><?= lang('tabel_f1_field5_alias') ?></th>
        <th><?= lang('tabel_f1_field6_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f1->$tabel_f1_field2 ?></td>
        <td width=""><?= $tl_f1->$tabel_f1_field4 ?></a>
        <td width=""><?= $tl_f1->$tabel_f1_field5 ?></td>
        <td width=""><?= $tl_f1->$tabel_f1_field6 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- menampilkan data tamu -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f1_field7_alias') ?></th>
        <th><?= lang('tabel_e4_field2_alias') ?></th>
        <th><?= lang('tabel_f1_field11_alias') ?></th>
        <th><?= lang('tabel_f1_field12_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f1->$tabel_f1_field7 ?></td>
        <td width=""><?= $tl_f1->$tabel_e4_field2 ?></a>
        <td width=""><?= $tl_f1->$tabel_f1_field11 ?></td>
        <td width=""><?= $tl_f1->$tabel_f1_field12 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- menampilkan harga total dari tabel pesanan -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f1_field10_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width="">Rp <?= number_format($tl_f1->$tabel_f1_field10, '2', ',', '.') ?></td>
        </td>
      </tr>
    </tbody>
  </table>


  <?php
endforeach ?>

<p class="text-center">Kirimkan bukti ini ke <?= $tabel_c2_field6_value4_alias ?> untuk diproses</p>