<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_e2_field1_alias ?></th>
      <th><?= $tabel_e2_field2_alias ?></th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_e2->result() as $tl_e2): ?>
      <tr>
        <td width=""><?= $tl_e2->$tabel_e2_field1 ?></td>
        <td width=""><?= $tl_e2->$tabel_e2_field2 ?></td>
        <td width=""><?= $tl_e2->created_at ?></td>
        <td width=""><?= $tl_e2->updated_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>