<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_b10_field1_alias ?></th>
      <th><?= $tabel_b10_field2_alias ?></th>
      <th><?= $tabel_b10_field3_alias ?></th>
      <th><?= $tabel_b10_field4_alias ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b10->result() as $tl_b10): ?>
      <tr>
        <td width=""><?= $tl_b10->$tabel_b10_field1 ?></td>
        <td width=""><img src="img/<?= $tabel_b10 ?>/<?= $tl_b10->$tabel_b10_field2 ?>" width="100"></td>
        <td width=""><?= $tl_b10->$tabel_b10_field3 ?></td>
        <td width=""><?= $tl_b10->$tabel_b10_field4 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>