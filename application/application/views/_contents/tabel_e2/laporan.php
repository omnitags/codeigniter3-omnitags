<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_e2_field1_alias') ?></th>
      <th><?= lang('tabel_e2_field2_alias') ?></th>
      <th><?= lang('tabel_e2_field3_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_e2->result() as $tl_e2): ?>
      <tr>
        <td width=""><?= $tl_e2->$tabel_e2_field1; ?></td>
        <td width=""><?= $tl_e2->$tabel_e2_field2 ?></td>
        <td width=""><?= $tl_e2->$tabel_e2_field3 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>