<?php foreach ($tbl_e6->result() as $tl_e6): ?>
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_e6_field1_alias') ?></th>
        <th><?= lang('tabel_e6_field2_alias') ?></th>
        <th><?= lang('tabel_e6_field3_alias') ?></th>
        <th><?= lang('tabel_e6_field4_alias') ?></th>
        <th><?= lang('tabel_e6_field5_alias') ?></th>
        <th><?= lang('tabel_e6_field6_alias') ?></th>
      </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_e6->$tabel_e6_field1; ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field2 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field3 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field4 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field5 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field6 ?></td>
      </tr>
    </tbody>
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_e6_field7_alias') ?></th>
        <th><?= lang('tabel_e6_field8_alias') ?></th>
        <th><?= lang('tabel_e6_field9_alias') ?></th>
        <th><?= lang('tabel_e6_field10_alias') ?></th>
        <th><?= lang('tabel_e6_field11_alias') ?></th>
        <th><?= lang('tabel_e6_field12_alias') ?></th>
        <th><?= lang('tabel_e6_field13_alias') ?></th>
      </tr>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_e6->$tabel_e6_field7 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field8 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field9 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field10 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field11 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field12 ?></td>
        <td width=""><?= $tl_e6->$tabel_e6_field13 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>