<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b7_field1_alias') ?></th>
      <th><?= lang('tabel_b7_field2_alias') ?></th>
      <th><?= lang('tabel_b7_field3_alias') ?></th>
      <th><?= lang('tabel_b7_field4_alias') ?></th>
      <th><?= lang('tabel_b7_field5_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b7->result() as $tl_b7): ?>
      <tr>
        <td width=""><?= $tl_b7->$tabel_b7_field1; ?></td>
        <td width=""><?= $tl_b7->$tabel_b7_field2 ?></td>
        <td width=""><img src="img/<?= $tabel_b7 ?>/<?= $tl_b7->$tabel_b7_field3 ?>" height="100"></td>
        <td width=""><img src="img/<?= $tabel_b7 ?>/<?= $tl_b7->$tabel_b7_field4 ?>" height="100"></td>
        <td width=""><img src="img/<?= $tabel_b7 ?>/<?= $tl_b7->$tabel_b7_field5 ?>" height="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>