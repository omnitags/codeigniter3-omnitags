<!-- menampilkan data pesanan sebagai ps -->
<?php foreach ($tbl_f2->result() as $tl_f2): ?>
  <!-- menampilkan data pemesan -->
  <table class="table">
    <thead class="thead-">
      <tr>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
        <th><?= lang('tabel_f2_field2_alias') ?></th>
        <th><?= lang('tabel_f2_field3_alias') ?></th>
        <th><?= lang('tabel_f2_field4_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f2->$tabel_f2_field1 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field2 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field3 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field4 ?></td>
      </td>
    </tr>
    </tbody>
  </table>

  <!-- menampilkan data tamu -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f2_field5_alias') ?></th>
        <th><?= lang('tabel_f2_field8_alias') ?></th>
        <th><?= lang('tabel_f2_field10_alias') ?></th>
        <th><?= lang('tabel_f2_field11_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f2->$tabel_f2_field5 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field8 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field10 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field11 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>
<p class="text-center"><?= lang('tabel_c2_field6_value4_alias_v5_msg') ?></p>