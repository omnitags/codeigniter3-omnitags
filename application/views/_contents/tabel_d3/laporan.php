<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_d3_field1_alias') ?></th>
      <th><?= lang('tabel_d3_field2_alias') ?></th>
      <th><?= lang('tabel_d3_field3_alias') ?></th>
      <th><?= lang('created_at_alias') ?></th>
      <th><?= lang('updated_at_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_d3->result() as $tl_d3): ?>
      <tr>
        <td width=""><?= $tl_d3->$tabel_d3_field1 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field2 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field3 ?></td>
        <td width=""><?= $tl_d3->$created_at ?></td>
        <td width=""><?= $tl_d3->$updated_at ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>