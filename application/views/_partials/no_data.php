<div class="col-md-12">
    <div class="text-center">
        <?php foreach ($no_data->result() as $nd): ?>
            <img src="img/<?= $tabel_b1 ?>/<?= $nd->$tabel_b1_field4 ?>" width="200" alt="Image">
        <?php endforeach ?>
        <h3>NO DATA</h3>
    </div>
</div>