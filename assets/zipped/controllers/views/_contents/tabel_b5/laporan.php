<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b5_field1_alias') ?></th>
      <th><?= lang('tabel_b5_field2_alias') ?></th>
      <th><?= lang('tabel_b5_field3_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b5->result() as $tl_b5): ?>
      <tr>
        <td width=""><?= $tl_b5->$tabel_b5_field1; ?></td>
        <td width=""><?= $tl_b5->$tabel_b5_field2 ?></td>
        <td width=""><?= $tl_b5->$tabel_b5_field3 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>