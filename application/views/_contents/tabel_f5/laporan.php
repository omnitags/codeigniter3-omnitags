<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_f5_field1_alias') ?></th>
      <th><?= lang('tabel_f5_field2_alias') ?></th>
      <th><?= lang('tabel_f5_field3_alias') ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_f5->result() as $tl_f5): ?>
      <tr>
        <td width=""><?= $tl_f5->$tabel_f5_field1; ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field2 ?></td>
        <td width=""><img src="img/<?= htmlspecialchars($tabel_f5) ?>/<?= htmlspecialchars($tl_f5->$tabel_f5_field3) ?>"
        width="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>