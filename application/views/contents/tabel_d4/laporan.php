<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_d4_field1_alias ?></th>
      <th><?= $tabel_d4_field2_alias ?></th>
      <th><?= $tabel_d4_field3_alias ?></th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_d4->result() as $tl_d4): ?>
      <tr>
        <td width=""><?= $tl_d4->$tabel_d4_field1 ?></td>
        <td width=""><?= $tl_d4->$tabel_d4_field2 ?></td>
        <td width=""><?= $tl_d4->$tabel_d4_field3 ?></td>
        <td width=""><?= $tl_d4->created_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>