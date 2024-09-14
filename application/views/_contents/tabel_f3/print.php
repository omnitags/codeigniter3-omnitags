<!-- menampilkan data pesanan sebagai ps -->
<?php foreach ($tbl_f3->result() as $tl_f3): ?>
  <!-- menampilkan data pemesan -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f2_field2_alias') ?></th>
        <th><?= lang('tabel_f2_field3_alias') ?></th>
        <th><?= lang('tabel_f2_field4_alias') ?></th>
        <th><?= lang('tabel_f2_field5_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f3->$tabel_f2_field2 ?></td>
        <td width=""><?= $tl_f3->$tabel_f2_field3 ?></a>
        <td width=""><?= $tl_f3->$tabel_f2_field4 ?></td>
        <td width=""><?= $tl_f3->$tabel_f2_field5 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- menampilkan data tamu -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f2_field6_alias') ?></th>
        <th><?= lang('tabel_e4_field2_alias') ?></th>
        <th><?= lang('tabel_f2_field10_alias') ?></th>
        <th><?= lang('tabel_f2_field11_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f3->$tabel_f2_field6 ?></td>
        <td width=""><?= $tl_f3->$tabel_e4_field2 ?></a>
        <td width=""><?= $tl_f3->$tabel_f2_field10 ?></td>
        <td width=""><?= $tl_f3->$tabel_f2_field11 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- menampilkan harga total dari tabel pesanan -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f2_field9_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width="">Rp <?= number_format($tl_f3->$tabel_f2_field9, '2', ',', '.') ?></td>
        </td>
      </tr>
    </tbody>
  </table>



  <!-- menampilkan data transaksi -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f3_field1_alias') ?></th>
        <th><?= lang('tabel_f3_field5_alias') ?></th>
        <th><?= lang('tabel_f3_field6_alias') ?></th>
        <th><?= lang('tabel_f3_field7_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f3->$tabel_f3_field1 ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field5 ?></a>
        <td width="">Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field7 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <?php
endforeach ?>
<p class="text-center">Kirimkan bukti ini ke <?= $tabel_c2_field6_value4_alias ?> untuk diproses</p>