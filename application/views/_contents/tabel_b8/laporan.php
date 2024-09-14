<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b8_field1_alias') ?></th>
      <th><?= lang('tabel_b8_field2_alias') ?></th>
      <th><?= lang('tabel_b8_field3_alias') ?></th>
      <th><?= lang('tabel_b8_field4_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b8->result() as $tl_b8): ?>
      <tr>
        <td width=""><?= $tl_b8->$tabel_b8_field1; ?></td>
        <td width=""><?= $tl_b8->$tabel_b8_field2 ?></td>
        <td width=""><?= $tl_b8->$tabel_b8_field3 ?></td>
        <td width=""><?= $tl_b8->$tabel_b8_field4 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>