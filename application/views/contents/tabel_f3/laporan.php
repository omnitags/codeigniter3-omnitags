<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_f3_field1_alias ?></th>
      <th><?= $tabel_f3_field2_alias ?></th>
      <th><?= $tabel_f3_field3_alias ?></th>
      <th><?= $tabel_f3_field4_alias ?></th>
      <th><?= $tabel_f3_field5_alias ?></th>
    </tr>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_f3->result() as $tl_f3): ?>
      <tr>
        <td width=""><?= $tl_f3->$tabel_f3_field1; ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field2 ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field3 ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field4 ?></td>
        <td width=""><?= $tl_f3->$tabel_f3_field5 ?></td>
        width="100"></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>