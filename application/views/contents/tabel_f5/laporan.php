<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_f5_field1_alias ?></th>
      <th><?= $tabel_f5_field2_alias ?></th>
      <th><?= $tabel_f5_field3_alias ?></th>
      <th><?= $tabel_f5_field4_alias ?></th>
      <th><?= $tabel_f5_field5_alias ?></th>
      <th><?= $tabel_f5_field6_alias ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_f5->result() as $tl_f5): ?>
      <tr>
        <td width=""><?= $tl_f5->$tabel_f5_field1; ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field2 ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field3 ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field4 ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field5 ?></td>
        <td width=""><?= $tl_f5->$tabel_f5_field6 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>