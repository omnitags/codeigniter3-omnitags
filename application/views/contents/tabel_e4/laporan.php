<table class="table">
  <thead class="thead">
    <tr>
      <th><?= $tabel_e4_field1_alias ?></th>
      <th><?= $tabel_e4_field2_alias ?></th>
      <th><?= $tabel_e4_field3_alias ?></th>
    </tr>
    </tr>
  </thead>
  <?php if (empty($tbl_e4)) {
  } else {
    foreach ($tbl_e4 as $id_e4 => $tl_e4): ?>
      <tbody>
        <tr>
          <td width=""><?= $id_e4; ?></td>
          <td width=""><?= $tl_e4[$tabel_e4_field2] ?></td>
          <td width=""><?= $tl_e4[$tabel_e4_field3] ?></td>
        </tr>
      </tbody>
    <?php endforeach;
  } ?>
</table>