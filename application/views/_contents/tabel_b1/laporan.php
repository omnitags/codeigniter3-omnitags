<table class="table">
    <thead>
        <tr>
            <th><?= lang('tabel_b1_field1_alias') ?></th>
            <th><?= lang('tabel_b1_field2_alias') ?></th>
            <th><?= lang('tabel_b1_field3_alias') ?></th>
            <th><?= lang('tabel_b1_field4_alias') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbl_b1->result() as $tl_b1): ?>
            <tr>
                <td><?= htmlspecialchars($tl_b1->$tabel_b1_field1) ?></td>
                <td><?= htmlspecialchars($tl_b1->$tabel_b1_field2) ?></td>
                <td><?= htmlspecialchars($tl_b1->$tabel_b1_field3) ?></td>
                <td><img src="img/<?= htmlspecialchars($tabel_b1) ?>/<?= htmlspecialchars($tl_b1->$tabel_b1_field4) ?>"
                        width="100"></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>