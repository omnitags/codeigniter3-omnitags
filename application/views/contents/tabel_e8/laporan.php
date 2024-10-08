<?php foreach ($tbl_e8->result() as $tl_e8): ?>
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= $tabel_e8_field1_alias ?></th>
        <th><?= $tabel_e8_field2_alias ?></th>
        <th><?= $tabel_e8_field3_alias ?></th>
      </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_e8->$tabel_e8_field1; ?></td>
        <td width=""><?= $tl_e8->$tabel_e8_field2 ?></td>
        <td width=""><?= $tl_e8->$tabel_e8_field3 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>