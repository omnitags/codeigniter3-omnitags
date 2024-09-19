<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_c3_field1_alias') ?></th>
      <th><?= lang('tabel_c3_field2_alias') ?></th>
      <th><?= lang('tabel_c3_field3_alias') ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_c3->result() as $tl_c3): ?>
      <tr>
        <td width=""><?= $tl_c3->$tabel_c3_field1; ?></td>
        <td width=""><?= $tl_c3->$tabel_c3_field2 ?></td>
        <td width=""><img src="img/<?= htmlspecialchars($tabel_c3) ?>/<?= htmlspecialchars($tl_c3->$tabel_c3_field3) ?>"
        width="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>