<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($language . '/no_level'));
    break;
}
?>
<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_c1_field1_alias') ?></th>
      <th><?= lang('tabel_c1_field2_alias') ?></th>
      <th><?= lang('tabel_c1_field3_alias') ?></th>
      <th><?= lang('tabel_c1_field5_alias') ?></th>
      <th><?= lang('tabel_c1_field6_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_c1->result() as $tl_c1): ?>
      <tr>
        <td width=""><?= $tl_c1->$tabel_c1_field1; ?></td>
        <td width=""><?= $tl_c1->$tabel_c1_field2 ?></td>
        <td width=""><?= $tl_c1->$tabel_c1_field3 ?></td>
        <td width=""><?= $tl_c1->$tabel_c1_field5 ?></td>
        <td width=""><?= $tl_c1->$tabel_c1_field6 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>