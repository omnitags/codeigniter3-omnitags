<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_f4_field1_alias') ?></th>
      <th><?= lang('tabel_f4_field2_alias') ?></th>
      <th><?= lang('tabel_f4_field3_alias') ?></th>
      <th><?= lang('tabel_f4_field4_alias') ?></th>
      <th><?= lang('tabel_f4_field5_alias') ?></th>
      <th><?= lang('tabel_f4_field6_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_f4->result() as $tl_f4): ?>
      <tr>
        <td width=""><?= $tl_f4->$tabel_f4_field1; ?></td>
        <td width=""><?= $tl_f4->$tabel_f4_field2 ?></td>
        <td width=""><?= $tl_f4->$tabel_f4_field3 ?></td>
        <td width=""><?= $tl_f4->$tabel_f4_field4 ?></td>
        <td width=""><?= $tl_f4->$tabel_f4_field5 ?></td>
        <td width=""><?= $tl_f4->$tabel_f4_field6 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>