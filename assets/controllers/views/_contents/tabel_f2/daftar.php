<?php switch ($this->session->userdata($tabel_c2_field6)) {
  // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f2_field1_alias ?></th>
        <th><?= $tabel_f2_field3_alias ?></th>
        <th><?= $tabel_f2_field4_alias ?></th>
        <th><?= $tabel_f2_field7_alias ?></th>
        <th><?= $tabel_f2_field8_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2 as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field3 ?></td>
          <td><?= $tl_f2->$tabel_f2_field4 ?></td>
          <td><?= $tl_f2->$tabel_f2_field7 ?></td>
          <td><?= $tl_f2->$tabel_f2_field8 ?></td>

          <td>
            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <a class="btn btn-light text-info" href="<?= site_url($tabel_f2 . '/print/' . $tl_f2->$tabel_f2_field1) ?>"
              target="_blank">
              <i class="fas fa-print"></i>
            </a>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>