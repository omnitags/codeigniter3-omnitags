<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_c2_field1_alias') ?></th>
      <th><?= lang('tabel_c2_field2_alias') ?></th>
      <th><?= lang('tabel_c2_field3_alias') ?></th>
      <th><?= lang('tabel_c2_field5_alias') ?></th>
      <th><?= lang('tabel_c2_field6_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_c2->result() as $tl_c2): ?>
      <tr>
        <td width=""><?= $tl_c2->$tabel_c2_field1 ?></td>
        <td width=""><?= $tl_c2->$tabel_c2_field2 ?></a></td>
        <td width=""><?= $tl_c2->$tabel_c2_field3 ?></td>
        <td width=""><?= $tl_c2->$tabel_c2_field5 ?></td>
        <td width=""><?= $tl_c2->$tabel_c2_field6 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>