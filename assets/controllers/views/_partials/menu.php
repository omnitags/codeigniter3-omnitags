<ul class="navbar-nav ml-auto">
    <?php switch ($this->session->userdata($tabel_c2_field6)) {
        case $tabel_c2_field6_value1:
            ?>
            <li class="nav-item">
                <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('home') ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url($tabel_e4) ?>">
                    <?= $tabel_e4_alias ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url($tabel_e2) ?>">
                    <?= $tabel_e2_alias ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url($tabel_c2 . '/login') ?>">Login</a>
            </li>
            <?php break;
        case $tabel_c2_field6_value5:
        case $tabel_c2_field6_value2:
        case $tabel_c2_field6_value4:
        case $tabel_c2_field6_value3:

            switch ($this->session->userdata($tabel_c2_field6)) {
                case $tabel_c2_field6_value2:
                case $tabel_c2_field6_value3:
                case $tabel_c2_field6_value4:
                    ?>

                    <li class="nav-item">
                        <a class="nav-link text-decoration-none font-weight-bold" href="<?= site_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">Master Data <i
                                    class="fas fa-caret-down"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?php switch ($this->session->userdata($tabel_c2_field6)) {
                                    case $tabel_c2_field6_value2:
                                        ?>
                                        <h6 class="dropdown-header">
                                            <?= $tabel_f3_alias ?>
                                        </h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_f3 . '/admin') ?>">
                                            <?= $tabel_f3_alias ?> Aktif
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_f3 . '/history') ?>">
                                            <?= $tabel_f3_alias ?> History
                                        </a>
                                        <?php break;

                                    case $tabel_c2_field6_value3:
                                        ?>
                                        <h6 class="dropdown-header">Data</h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e4 . '/admin') ?>">
                                            <?= $tabel_e4_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e1 . '/admin') ?>">
                                            <?= $tabel_e1_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e2 . '/admin') ?>">
                                            <?= $tabel_e2_alias ?>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header">Operasional</h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_c1 . '/admin') ?>">
                                            <?= $tabel_c1_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e3 . '/admin') ?>">
                                            <?= $tabel_e3_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_c2 . '/admin') ?>">
                                            <?= $tabel_c2_alias ?>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?= site_url($tabel_a1 . '/profil') ?>">
                                            <?= $tabel_a1_alias ?>
                                        </a>
                                        <?php break;
                                    case $tabel_c2_field6_value4:
                                        ?>

                                        <h6 class="dropdown-header">Kelola</h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e3 . '/admin') ?>">
                                            <?= $tabel_e3_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_f2 . '/admin') ?>">
                                            <?= $tabel_f2_alias ?>
                                        </a>
                                        <a class="dropdown-item" href="<?= site_url($tabel_f1 . '/admin') ?>">
                                            <?= $tabel_f1_alias ?>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header">Operasional</h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_f4 . '/admin') ?>">
                                            <?= $tabel_f4_alias ?>
                                        </a>
                                        <h6 class="dropdown-header">Data</h6>
                                        <a class="dropdown-item" href="<?= site_url($tabel_e4 . '/admin') ?>">
                                            <?= $tabel_e4_alias ?>
                                        </a>

                                        <?php break;
                                    default:
                                        ?>
                                        <!-- Show the dropdown for other cases -->
                                        <?php break;
                                } ?>
                            </div>
                        </div>
                    </li>

                    <?php break;
                default:
                    break;
            } ?>

            <li class="nav-item dropdown">
                <a type="button" class="nav-link text-decoration-none h4 mt-1 font-weight-bold" data-toggle="dropdown" href="#">
                   <i class="fas fa-bell"></i><?php if (!$tbl_b9_count) { ?><span>&nbsp;&nbsp;</span><?php
                    } else { ?>
                            <span><?= $tbl_b9_count ?></span><?php } ?>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span><?= $tbl_b9_count ?> New Notifications</span>
                        <div>
                            <span class="px-3"></span> <!-- Adding space between buttons -->
                            <a href="<?= site_url($tabel_b9 . '/update') ?>" class="btn btn-link">
                                <i class="far fa-check-circle"></i>
                            </a>
                            <!-- <a class="btn btn-link">
                                <i class="fas fa-cog"></i>
                            </a> -->
                        </div>
                    </div>

                    <div class="list-group" style="min-width: 350px;">

                        <?php if (!$tbl_b9) { ?>         <?php } else {
                            foreach ($tbl_b9 as $tl_b9):

                                if ($tl_b9->$tabel_b9_field2 == $this->session->userdata($tabel_c2_field1)) {
                                    if ($tl_b9->$tabel_b9_field6 == NULL) { ?>

                                        <a href="<?= site_url($tabel_b9 . '/detail/' . $tl_b9->$tabel_b9_field1) ?>"
                                            class="list-group-item bg-light">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <?= $tl_b9->$tabel_b8_field4 ?>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark"><?= $tl_b9->$tabel_b8_field3 ?></div>
                                                    <div class="text-muted small mt-1">
                                                        <?= $tl_b9->$tabel_b9_field4 ?>
                                                    </div>
                                                    <div class="text-muted small mt-1"><?= $timeElapsed ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    <?php } else { ?>
                                        <a href="<?= site_url($tabel_b9 . '/detail/' . $tl_b9->$tabel_b9_field1) ?>" class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <?= $tl_b9->$tabel_b8_field4 ?>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark"><?= $tl_b9->$tabel_b8_field3 ?></div>
                                                    <div class="text-muted small mt-1">
                                                        <?= $tl_b9->$tabel_b9_field4 ?>
                                                    </div>
                                                    <div class="text-muted small mt-1"><?= $timeElapsed ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    <?php }
                                } else { ?>

                                    <a href="#" class="list-group-item bg-light">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger fas fa-bell-slash"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">No Notifications Available</div>
                                            </div>
                                        </div>
                                    </a>
                                <?php }
                            endforeach;
                        } ?>
                    </div>
                    <div class="dropdown-header">
                        <a href="<?= site_url($tabel_b9 . '/daftar') ?>" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>



            <li class="nav-item">
                <div class="dropdown">
                    <!-- tombol ini akan memunculkan dropdown tanpa menggunakan button: https://stackoverflow.com/questions/38576503/how-to-remove-the-arrow-in-dropdown-in-bootstrap- terimakasih pada link di atas -->
                    <?php switch ($this->session->userdata($tabel_c2_field6)) {
                        case $tabel_c2_field6_value2:
                        case $tabel_c2_field6_value3:
                            ?>
                            <a type="button" class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
                                <h4><i class="fas fa-user-tie"></i> <i class="fas fa-caret-down"></i></h4>
                            </a>

                            <?php break;
                        case $tabel_c2_field6_value4:
                            ?>
                            <a type="button" class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
                                <h4><i class="fas fa-user"></i> <i class="fas fa-caret-down"></i></h4>
                            </a>
                            <?php break;
                        case $tabel_c2_field6_value5:
                            ?>
                            <a type="button" class="nav-link text-decoration-none font-weight-bold" data-toggle="dropdown" href="#">
                                <h4>
                                    <?= $this->session->userdata($tabel_c2_field2) ?> <i class="fas fa-caret-down"></i>
                                </h4>
                            </a>
                            <?php break;
                        default:
                            ?>
                            <!-- Show the dropdown for other cases -->
                            <?php break;
                    } ?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php switch ($this->session->userdata($tabel_c2_field6)) {
                            case $tabel_c2_field6_value5:
                                ?>
                                <h6 class="dropdown-header">Kelola</h6>
                                <a class="dropdown-item" href="<?= site_url($tabel_e3 . '/daftar') ?>">
                                    <?= $tabel_e3_alias ?>
                                </a>
                                <a class="dropdown-item" href="<?= site_url($tabel_e4 . '/daftar') ?>">
                                    <?= $tabel_e4_alias ?>
                                </a>
                                <a class="dropdown-item" href="<?= site_url($tabel_f2 . '/daftar') ?>">Daftar
                                    <?= $tabel_f2_alias ?>
                                </a>
                                <a class="dropdown-item" href="<?= site_url($tabel_f3 . '/daftar') ?>">Daftar
                                    <?= $tabel_f3_alias ?>
                                </a>
                                <div class="dropdown-divider"></div>
                                <?php break;
                            case $tabel_c2_field6_value2:
                            case $tabel_c2_field6_value3:
                            case $tabel_c2_field6_value4:
                                ?>
                                <?php break;
                            default:
                                ?>
                                <!-- Show the dropdown for other cases -->
                                <?php break;
                        } ?>

                        <a class="dropdown-item" href="<?= site_url($tabel_c2 . '/profil') ?>">Profil</a>
                        <a class="dropdown-item" href="<?= site_url($tabel_c2 . '/logout') ?>">Logout</a>


                    </div>
                </div>
            </li>
            <?php break;
        default:
            break;
    } ?>
</ul>