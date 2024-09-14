<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_f2_field1_alias') ?></th>
      <th><?= lang('tabel_f2_field2_alias') ?></th>
      <th><?= lang('tabel_f2_field3_alias') ?></th>
      <th><?= lang('tabel_f2_field4_alias') ?></th>
      <th><?= lang('tabel_f2_field5_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_f2->result() as $tl_f2): ?>
      <tr>
        <td width=""><?= $tl_f2->$tabel_f2_field1; ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field2 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field3 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field4 ?></td>
        <td width=""><?= 'Rp' . number_format($tl_f2->$tabel_f2_field5, '2', ',', '.') ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>