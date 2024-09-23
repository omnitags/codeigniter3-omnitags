<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b11_field1_alias') ?></th>
      <th><?= lang('tabel_b11_field2_alias') ?></th>
      <th><?= lang('tabel_b11_field3_alias') ?></th>
      <th><?= lang('created_at') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b11->result() as $tl_b11): ?>
      <tr>
        <td width=""><?= $tl_b11->$tabel_b11_field1 ?></td>
        <td width=""><?= $tl_b11->$tabel_b11_field2 ?></td>
        <td width=""><?= $tl_b11->$tabel_b11_field3 ?></td>
        <td width=""><?= $tl_b11->created_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>