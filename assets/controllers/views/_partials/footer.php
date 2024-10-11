<?php foreach ($tbl_a1 as $tl_a1): ?>
    <!-- footer -->
    <div class="container-fluid bg-light border">
        <div class="container">

            <!-- menampilkan footer khusus jika level adalah tamu, admin, dan sebagainya  -->
            <?php switch ($this->session->userdata($tabel_c2_field6)) {
                case $tabel_c2_field6_value3:
                case $tabel_c2_field6_value4:
                case $tabel_c2_field6_value2:
                    ?>
                    <div class="row justify-content-center align-content-center">
                        <p class="pt-2">
                            <?= $year_code ?> |
                            <?= $tl_a1->$tabel_a1_field2 ?>
                        </p>
                    </div>
                    <?php break;

                default: ?>

                    <!-- menampilkan footer untuk umum  -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 pt-3">
                            <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field4; ?>" height="50">
                            <p class="small pt-2">
                                <?php foreach ($tbl_b5 as $tl_b5):
                                    if ($tl_a1->$tabel_a1_field7 == $tl_b5->$tabel_b5_field1) { ?>


                                        <a class="text-decoration-none text-dark" href="<?= site_url($tabel_b5) ?>">
                                            <img src="img/<?= $tabel_b5 ?>/<?= $tl_b5->$tabel_b5_field4 ?>" height="25"></a><br>


                                    <?php }endforeach; ?>
                                <?= $year_code ?>
                                <?= $tl_a1->$tabel_a1_field2 ?>.
                                <?= $copyright_notices ?>
                            </p>
                        </div>

                        <div class="col-lg-3 pt-3">
                            <h3>Jelajahi</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <a type="button" id="nextPage" class="text-decoration-none text-dark"
                                        href="<?= site_url($tabel_e4) ?>">
                                        <?= $tabel_e4_alias ?>
                                    </a>
                                </li>
                                <li>
                                    <a type="button" id="nextPage" class="text-decoration-none text-dark"
                                        href="<?= site_url($tabel_e2) ?>">
                                        <?= $tabel_e2_alias ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 pt-3">
                            <h3>Alamat</h3>
                            <ul class="list-unstyled">
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
                            <h3>Ikuti</h3>
                            <ul class="list-unstyled">
                                <?php foreach ($sosmed as $sm):
                                    if ($sm->$tabel_b6_field2 == $tl_a1->$tabel_a1_field1) { ?>
                                        <li>
                                            <a class="text-decoration-none text-primary" href="<?= $sm->$tabel_b6_field4 ?>"
                                                target="_blank">
                                                <?= $sm->$tabel_b6_field3 ?></a>
                                        </li>
                                    <?php }endforeach; ?>
                            </ul>
                        </div>
                    </div>
            <?php }
            ?>

        </div>
    </div>
<?php endforeach ?>