<?php foreach ($tbl_a1 as $tl_a1): ?>
    <!-- footer -->
    <footer class="container-fluid bg-dark">
            <div class="container">

                <!-- Displaying footer specific to user level: guest, admin, etc. -->
                <?php switch (userdata($tabel_c2_field6)) {
                    case $tabel_c2_field6_value3:
                    case $tabel_c2_field6_value4:
                    case $tabel_c2_field6_value2:
                        ?>
                        <div class="row justify-content-center align-content-center">
                            <p class="pt-2 text-light">
                                <?= $year_code ?> |
                                <?= $tl_a1->$tabel_a1_field2 ?>
                            </p>
                        </div>
                        <?php break;

                    default: ?>
                        <!-- Displaying footer for general users -->
                        <div class="row justify-content-center">
                            <div class="col-lg-3 pt-3">
                                <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field4; ?>" height="50">
                                <div class="row pt-2 py-0">
                                    <?php foreach ($lisensi->result() as $ls): ?>
                                        <div class="col-md-4 mt-2">
                                            <a class="text-decoration-none text-light"
                                                href="<?= site_url($language . '/' . $tabel_b5 . '/detail/' . $ls->$tabel_b5_field1) ?>">
                                                <img src="img/<?= $tabel_b5 ?>/<?= $ls->$tabel_b5_field4 ?>" height="25">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                                <p class="small mt-2 text-light">
                                    <?= $year_code ?>
                                    <?= $tl_a1->$tabel_a1_field2 ?>.
                                    <?= $copyright_notices ?>
                                </p>
                            </div>
                            <div class="col-lg-1 pt3">

                            </div>

                            <div class="col-lg-3 pt-3">
                                <h3 class="text-light"><?= lang('explore') ?></h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <a type="button" id="nextPage" class="text-decoration-none text-light"
                                            href="<?= site_url($language . '/' . $tabel_e4) ?>">
                                            <?= lang('tabel_e4_alias') ?>
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a type="button" id="nextPage" class="text-decoration-none text-light"
                                            href="<= site_url($language . '/' . $tabel_e2) ?>">
                                            <= lang('tabel_e2_alias') ?>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>

                            <div class="col-lg-3 pt-3">
                                <h3 class="text-light"><?= lang('address') ?></h3>
                                <ul class="list-unstyled text-light">
                                    <li>
                                        <?= $tl_a1->$tabel_a1_field5 ?>
                                    </li>
                                    <li>
                                        <?= $tl_a1->$tabel_a1_field4 ?>
                                    </li>
                                    <li>
                                        <?= $tl_a1->$tabel_a1_field3 ?>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-2 pt-3">
                                <h3 class="text-light"><?= lang('follow') ?></h3>
                                <ul class="list-unstyled">
                                    <?php foreach ($sosmed->result() as $sm): ?>
                                        <li>
                                            <a class="text-decoration-none text-light" href="<?= $sm->$tabel_b6_field4 ?>"
                                                target="_blank">
                                                <?= $sm->$tabel_b6_field5 ?>                 <?= $sm->$tabel_b6_field3 ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                <?php } ?>
            </div>
    </footer>
<?php endforeach ?>