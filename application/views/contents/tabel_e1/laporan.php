<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_e1_field1_alias ?></th>
      <th><?= $tabel_e1_field2_alias ?></th>
      <th><?= $tabel_e1_field3_alias ?></th>
      <th><?= $tabel_e1_field4_alias ?></th>
      <th><?= $tabel_e1_field5_alias ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_e1->result() as $tl_e1): ?>
      <tr>
        <td width=""><?= $tl_e1->$tabel_e1_field1; ?></td>
        <td width=""><?= $tl_e1->$tabel_e1_field2 ?></td>
        <td width=""><?= $tl_e1->$tabel_e1_field3 ?></td>
        <td width=""><?= $tl_e1->$tabel_e1_field4 ?></td>
        <td width=""><?= $tl_e1->$tabel_e1_field5 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>