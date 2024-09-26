<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_d3_field1_alias ?></th>
      <th><?= $tabel_d3_field2_alias ?></th>
      <th><?= $tabel_d3_field3_alias ?></th>
      <th>Created At</th>
      <th>Updated At</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_d3->result() as $tl_d3): ?>
      <tr>
        <td width=""><?= $tl_d3->$tabel_d3_field1 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field2 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field3 ?></td>
        <td width=""><?= $tl_d3->created_at ?></td>
        <td width=""><?= $tl_d3->updated_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>