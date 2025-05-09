<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_e3_field1_alias ?></th>
      <th><?= $tabel_e3_field2_alias ?></th>
      <th><?= $tabel_e3_field3_alias ?></th>
      <th><?= $tabel_e3_field4_alias ?></th>
      <th><?= $tabel_e3_field5_alias ?></th>
      <th><?= $tabel_e3_field6_alias ?></th>
      <th><?= $tabel_e3_field7_alias ?></th>
      <th><?= $tabel_e3_field8_alias ?></th>
      <th><?= $tabel_e3_field9_alias ?></th>
      <th><?= $tabel_e3_field10_alias ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_e3->result() as $tl_e3): ?>
      <tr>
        <td width=""><?= $tl_e3->$tabel_e3_field1; ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field2 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field3 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field4 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field5 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field6 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field7 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field8 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field9 ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field10 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>