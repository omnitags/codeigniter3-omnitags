<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_b11_field1_alias ?></th>
      <th><?= $tabel_b11_field3_alias ?></th>
      <th>Created At</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b11->result() as $tl_b11): ?>
      <tr>
        <td width=""><?= $tl_b11->$tabel_b11_field1 ?></td>
        <td width=""><?= $tl_b11->$tabel_b11_field3 ?></td>
        <td width=""><?= $tl_b11->created_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>