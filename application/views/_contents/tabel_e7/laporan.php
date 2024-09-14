<?php foreach ($tbl_e7->result() as $tl_e7): ?>
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_e7_field1_alias') ?></th>
        <th><?= lang('tabel_e7_field2_alias') ?></th>
        <th><?= lang('tabel_e7_field3_alias') ?></th>
      </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_e7->$tabel_e7_field1; ?></td>
        <td width=""><?= $tl_e7->$tabel_e7_field2 ?></td>
        <td width=""><?= $tl_e7->$tabel_e7_field3 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>