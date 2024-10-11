<?php foreach ($tbl_e5->result() as $tl_e5): ?>
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= $tabel_e5_field1_alias ?></th>
        <th><?= $tabel_e5_field2_alias ?></th>
        <th><?= $tabel_e5_field3_alias ?></th>
        <th><?= $tabel_e5_field4_alias ?></th>
        <th><?= $tabel_e5_field5_alias ?></th>
        <th><?= $tabel_e5_field8_alias ?></th>
      </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_e5->$tabel_e5_field1; ?></td>
        <td width=""><?= $tl_e5->$tabel_e5_field2 ?></td>
        <td width=""><?= $tl_e5->$tabel_e5_field3 ?></td>
        <td width=""><?= $tl_e5->$tabel_e5_field4 ?></td>
        <td width=""><?= $tl_e5->$tabel_e5_field5 ?></td>
        <td width=""><?= $tl_e5->$tabel_e5_field8 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>