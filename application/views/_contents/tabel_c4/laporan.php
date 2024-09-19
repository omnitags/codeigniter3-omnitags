<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_c4_field1_alias') ?></th>
      <th><?= lang('tabel_c4_field2_alias') ?></th>
      <th><?= lang('tabel_c4_field3_alias') ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_c4->result() as $tl_c4): ?>
      <tr>
        <td width=""><?= $tl_c4->$tabel_c4_field1; ?></td>
        <td width=""><?= $tl_c4->$tabel_c4_field2 ?></td>
        <td width=""><img src="img/<?= htmlspecialchars($tabel_c4) ?>/<?= htmlspecialchars($tl_c4->$tabel_c4_field3) ?>"
        width="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>