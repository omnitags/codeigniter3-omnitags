<?php foreach ($tbl_e4->result() as $tl_e4): ?>
<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_e4_field1_alias') ?></th>
      <th><?= lang('tabel_e4_field2_alias') ?></th>
      <th><?= lang('tabel_e4_field3_alias') ?></th>
      <th><?= lang('tabel_e4_field4_alias') ?></th>
      <th><?= lang('tabel_e4_field5_alias') ?></th>
      <th><?= lang('tabel_e4_field6_alias') ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td width=""><?= $tl_e4->$tabel_e4_field1; ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field2 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field3 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field4 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field5 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field6 ?></td>
      </tr>
  </tbody>
</table>
<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_e4_field7_alias') ?></th>
      <th><?= lang('tabel_e4_field8_alias') ?></th>
      <th><?= lang('tabel_e4_field9_alias') ?></th>
      <th><?= lang('tabel_e4_field10_alias') ?></th>
      <th><?= lang('tabel_e4_field11_alias') ?></th>
      <th><?= lang('tabel_e4_field12_alias') ?></th>
      <th><?= lang('tabel_e4_field13_alias') ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td width=""><?= $tl_e4->$tabel_e4_field7 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field8 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field9 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field10 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field11 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field12 ?></td>
        <td width=""><?= $tl_e4->$tabel_e4_field13 ?></td>
      </tr>
  </tbody>
</table>
    <?php endforeach ?>