<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b2_field1_alias') ?></th>
      <th><?= lang('tabel_b2_field2_alias') ?></th>
      <th><?= lang('tabel_b2_field3_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b2->result() as $tl_b2): ?>
      <tr>
        <td width=""><?= $tl_b2->$tabel_b2_field1 ?></td>
        <td width=""><?= $tl_b2->$tabel_b2_field2 ?></td>
        <td width=""><img src="img/<?= $tabel_b2 ?>/<?= $tl_b2->$tabel_b2_field3 ?>" width="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>