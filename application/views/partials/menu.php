<ul class="navbar-nav ml-auto">
    <?php switch (userdata($tabel_c2_field6)) {
        case $tabel_c2_field6_value1:
            ?>
            <li class="nav-item pb-2">
                <a class="nav-link text-decoration-none text-light"
                    href="<?= nav_url('') ?>">Home</a>
            </li>
            <?= nav_item($tabel_e4_alias, $tabel_e4, '/') ?>
            <!-- ?= nav_item($tabel_b10_alias, $tabel_b10, '/') ?> -->
            <!-- ?= nav_item($tabel_e2_alias, $tabel_e2, '/') ?> -->
            <?= nav_item('Login', 'login', '') ?>
            <?php break;
        case $tabel_c2_field6_value5:
        case $tabel_c2_field6_value2:
        case $tabel_c2_field6_value4:
        case $tabel_c2_field6_value3:

            switch (userdata($tabel_c2_field6)) {
                case $tabel_c2_field6_value2:
                case $tabel_c2_field6_value3:
                case $tabel_c2_field6_value4:
                    ?>

                    <?= nav_item("Dashboard", '', '') ?>

                    <li class="nav-item d-flex align-items-center">
                        <div class="dropdown">
                            <?= menu_logo("Master Data") ?>

                            <div class="dropdown-menu dropdown-menu-right shadow" style="max-height: 450px; overflow-y: auto;">
                                <?php switch (userdata($tabel_c2_field6)) {
                                    case $tabel_c2_field6_value2:
                                        ?>
                                        <h6 class="dropdown-header"><?= $tabel_f3_alias ?></h6>
                                        <?= dropdown_nav('tabel_f3', '/admin') ?>
                                        <?= dropdown_nav_unique($tabel_f3_alias. ' History', $tabel_f3, '/history') ?>
                                        <?php break;

                                    case $tabel_c2_field6_value3:
                                        ?>
                                        <h6 class="dropdown-header">Data</h6>
                                        <?= dropdown_nav('tabel_e2', '/admin') ?>
                                        <?= dropdown_nav('tabel_e3', '/admin') ?>
                                        <?= dropdown_nav('tabel_e4', '/admin') ?>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header">Manage</h6>
                                        <?= dropdown_nav('tabel_e5', '/admin') ?>
                                        <?= dropdown_nav('tabel_e6', '/admin') ?>
                                        <?= dropdown_nav('tabel_e7', '/admin') ?>
                                        <?= dropdown_nav('tabel_e8', '/admin') ?>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header">Operations</h6>
                                        <?= dropdown_nav('tabel_e1', '/admin') ?>
                                        <?= dropdown_nav('tabel_c1', '/admin') ?>
                                        <?= dropdown_nav('tabel_c2', '/admin') ?>
                                        <div class="dropdown-divider"></div>
                                        <?= dropdown_nav('tabel_a1', '/profil') ?>
                                        <?php break;
                                    case $tabel_c2_field6_value4:
                                        ?>

                                        <h6 class="dropdown-header">Manage</h6>
                                        <?= dropdown_nav('tabel_e3', '/admin') ?>
                                        <?= dropdown_nav('tabel_f2', '/admin') ?>
                                        <?= dropdown_nav('tabel_f1', '/admin') ?>
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header">Operations</h6>
                                        <?= dropdown_nav('tabel_f4', '/admin') ?>

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

            <li class="nav-item d-flex align-items-center dropdown">
                <a type="button" class="nav-link text-decoration-none h4 mt-1 text-light font-weight-bold"
                    data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i><?php if (!$notif_count) { ?><span>&nbsp;&nbsp;</span><?php
                    } else { ?>
                        <span class="badge badge-light"><?= $notif_count ?></span><?php } ?>
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="alertsDropdown">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span><?= $notif_count . ' new notifications' ?></span>
                        <div>
                            <span class="px-3"></span> <!-- Adding space between buttons -->
                            <a href="<?= nav_url($tabel_b9 . '/update') ?>" class="btn btn-link">
                                <i class="far fa-check-circle"></i>
                            </a>
                            <!-- <a class="btn btn-link">
                                <i class="fas fa-cog"></i>
                            </a> -->
                        </div>
                    </div>

                    <div class="list-group" style="min-width: 350px; max-height: 300px; overflow-y: auto;">

                        <?php if (!$notif) { ?>         <?php } else {
                            foreach ($notif as $nf):

                                if ($nf->$tabel_b9_field2 == userdata($tabel_c2_field1)) {
                                    if ($nf->read_at == NULL) { ?>
                                        <?= list_group_nav(
                                            'tabel_b9',
                                            $nf->$tabel_b9_field1 . '/detail',
                                            $nf->$tabel_b8_field4,
                                            $nf->$tabel_b8_field3,
                                            $nf->$tabel_b9_field4,
                                            datetime_elapsed_string($nf->created_at),
                                            'bg-light'
                                        );
                                    } else { ?>
                                        <?= list_group_nav(
                                            'tabel_b9',
                                            $nf->$tabel_b9_field1 . '/detail',
                                            $nf->$tabel_b8_field4,
                                            $nf->$tabel_b8_field3,
                                            $nf->$tabel_b9_field4,
                                            datetime_elapsed_string($nf->created_at),
                                            ''
                                        );
                                    }
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
                        <a href="<?= nav_url($tabel_b9 . '/daftar') ?>"
                            class="text-muted">Show All Notifications</a>
                    </div>
                </div>
            </li>



            <li class="nav-item d-flex align-items-center">
                <div class="dropdown">
                    <!-- tombol ini akan memunculkan dropdown tanpa menggunakan button: https://stackoverflow.com/questions/38576503/how-to-remove-the-arrow-in-dropdown-in-bootstrap- terimakasih pada link di atas -->
                    <?php switch (userdata($tabel_c2_field6)) {
                        case $tabel_c2_field6_value2:
                        case $tabel_c2_field6_value3: ?>
                            <?= menu_logo('<i class="fas fa-user-tie"></i>') ?>
                            <?php break;
                        case $tabel_c2_field6_value4: ?>
                            <?= menu_logo('<i class="fas fa-user"></i>') ?>
                            <?php break;
                        case $tabel_c2_field6_value5: ?>
                            <?= menu_logo(userdata($tabel_c2_field2)) ?>
                            <?php break;
                        default: ?>
                            <!-- Show the dropdown for other cases -->
                            <?php break;
                    } ?>
                    <div class="dropdown-menu dropdown-menu-right shadow" style="max-height: 450px; overflow-y: auto;">
                        <?php switch (userdata($tabel_c2_field6)) {
                            case $tabel_c2_field6_value5:
                                ?>
                                <h6 class="dropdown-header">Explore</h6>
                                <?= dropdown_nav_unique("Order Now", '', '') ?>
                                <?= dropdown_nav('tabel_e4', '') ?>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Reservations</h6>
                                <?= dropdown_nav('tabel_f2', '/daftar') ?>
                                <?= dropdown_nav('tabel_f3', '/daftar') ?>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">History</h6>
                                <?= dropdown_nav('tabel_f1', '/daftar') ?>
                                <?= dropdown_nav_unique($tabel_f3_alias, $tabel_f3, '/daftar_history') ?>
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

                        <?= dropdown_nav_unique($tabel_c2_alias2, $tabel_c2, '/profil') ?>
                        <?= dropdown_nav_unique("Logout", $tabel_c2, '/logout') ?>


                    </div>
                </div>
            </li>
            <?php break;
        default:
            break;
    } ?>