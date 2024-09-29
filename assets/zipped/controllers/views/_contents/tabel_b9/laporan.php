<!-- menampilkan data pemesan -->
<table class="table">
    <thead class="thead">
        <tr>
            <th><?= lang('tabel_b9_field1_alias') ?></th>
            <th><?= lang('tabel_b9_field2_alias') ?></th>
            <th><?= lang('tabel_b9_field3_alias') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbl_b9->result() as $tl_b9): ?>
            <tr>
                <td width=""><?= $tl_b9->$tabel_b9_field1; ?></td>
                <td width=""><?= $tl_b9->$tabel_b9_field2 ?></td>
                <td width=""><?= $tl_b9->$tabel_b9_field3 ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>