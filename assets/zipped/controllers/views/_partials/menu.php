<ul class="navbar-nav ml-auto">
    <?php switch (userdata($tabel_c2_field6)) {
        case $tabel_c2_field6_value1:
            ?>
            <li class="nav-item pb-2">
                <a class="nav-link text-decoration-none text-light"
                    href="<?= site_url($language . '/') ?>"><?= lang('home') ?></a>
            </li>
            <?= nav_item(lang('tabel_e4_alias'), $tabel_e4, '/') ?>
            <!-- <= nav_item(lang('tabel_e2_alias'), $tabel_e2, '/') ?> -->
            <?= nav_item(lang('login'), 'login', '') ?>
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

                    <?= nav_item(lang('dashboard'), '', '') ?>

                    <li class="nav-item pb-2">
                        <div class="dropdown">
                            <?= menu_logo(lang('master_data')) ?>

                            <div class="dropdown-menu dropdown-menu-right">
                                <?php switch (userdata($tabel_c2_field6)) {
                                    case $tabel_c2_field6_value2:
                                        ?>
                                        <!-- <h6 class="dropdown-header"><?= lang('tabel_f3_alias') ?></h6> -->
                                        <!-- <= dropdown_menu('tabel_f3', '/admin') ?> -->
                                        <!-- <= dropdown_menu_unique(lang('tabel_f3_alias_past'), $tabel_f3, '/history') ?> -->
                                        <?php break;

                                    case $tabel_c2_field6_value3:
                                        ?>
                                        <h6 class="dropdown-header"><?= lang('data') ?></h6>
                                        <!-- <= dropdown_menu('tabel_e1', '/admin') ?> -->
                                        <!-- <= dropdown_menu('tabel_e2', '/admin') ?> -->
                                        <!-- <= dropdown_menu('tabel_e3', '/admin') ?> -->
                                        <?= dropdown_menu('tabel_e4', '/admin') ?>
                                        <!-- <= dropdown_menu('tabel_f2', '/admin') ?> -->
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header"><?= lang('operational') ?></h6>
                                        <?= dropdown_menu('tabel_c1', '/admin') ?>
                                        <?= dropdown_menu('tabel_c2', '/admin') ?>
                                        <div class="dropdown-divider"></div>
                                        <?= dropdown_menu('tabel_a1', '/profil') ?>
                                        <?php break;
                                    case $tabel_c2_field6_value4:
                                        ?>

                                        <h6 class="dropdown-header"><?= lang('manage') ?></h6>
                                        <?= dropdown_menu('tabel_e3', '/admin') ?>
                                        <?= dropdown_menu('tabel_f2', '/admin') ?>
                                        <!-- <= dropdown_menu('tabel_f1', '/admin') ?> -->
                                        <div class="dropdown-divider"></div>
                                        <h6 class="dropdown-header"><?= lang('operational') ?></h6>
                                        <!-- <= dropdown_menu('tabel_f4', '/admin') ?> -->

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

            <li class="nav-item pb-2 dropdown">
                <a type="button" class="nav-link text-decoration-none h4 mt-1 text-light font-weight-bold"
                    data-toggle="dropdown" href="#">
                    <i class="fas fa-bell"></i><?php if (!$notif_count) { ?><span>&nbsp;&nbsp;</span><?php
                    } else { ?>
                        <span><?= $notif_count ?></span><?php } ?>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <div class="dropdown-header d-flex justify-content-between align-items-center">
                        <span><?= $notif_count . ' ' . lang('new_notifications') ?></span>
                        <div>
                            <span class="px-3"></span> <!-- Adding space between buttons -->
                            <a href="<?= site_url($language . '/' . $tabel_b9 . '/update') ?>" class="btn btn-link">
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
                                    if ($nf->$tabel_b9_field6 == NULL) { ?>

                                        <a href="<?= site_url($language . '/' . $tabel_b9 . '/detail/' . $nf->$tabel_b9_field1) ?>"
                                            class="list-group-item bg-light">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <?= $nf->$tabel_b8_field4 ?>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark"><?= $nf->$tabel_b8_field3 ?></div>
                                                    <div class="text-muted small mt-1">
                                                        <?= $nf->$tabel_b9_field4 ?>
                                                    </div>
                                                    <div class="text-muted small mt-1"><?= datetime_elapsed_string($nf->$tabel_b9_field5) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    <?php } else { ?>
                                        <a href="<?= site_url($language . '/' . $tabel_b9 . '/detail/' . $nf->$tabel_b9_field1) ?>"
                                            class="list-group-item">
                                            <div class="row g-0 align-items-center">
                                                <div class="col-2">
                                                    <?= $nf->$tabel_b8_field4 ?>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark"><?= $nf->$tabel_b8_field3 ?></div>
                                                    <div class="text-muted small mt-1">
                                                        <?= $nf->$tabel_b9_field4 ?>
                                                    </div>
                                                    <div class="text-muted small mt-1"><?= datetime_elapsed_string($nf->$tabel_b9_field5) ?>
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
                                                <div class="text-dark"><?= lang('no_notifications_available') ?></div>
                                            </div>
                                        </div>
                                    </a>
                                <?php }
                            endforeach;
                        } ?>
                    </div>
                    <div class="dropdown-header">
                        <a href="<?= site_url($language . '/' . $tabel_b9 . '/daftar') ?>"
                            class="text-muted"><?= lang('show_all_notifications') ?></a>
                    </div>
                </div>
            </li>



            <li class="nav-item pb-2">
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
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php switch (userdata($tabel_c2_field6)) {
                            case $tabel_c2_field6_value5:
                                ?>
                                <h6 class="dropdown-header"><?= lang('explore') ?></h6>
                                <?= dropdown_menu('tabel_e4', '') ?>
                                <h6 class="dropdown-header"><?= lang('manage') ?></h6>
                                <?= dropdown_menu('tabel_e4', '/daftar') ?>
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

                        <?= dropdown_menu_unique(lang('tabel_c2_alias2'), $tabel_c2, '/profil') ?>
                        <?= dropdown_menu_unique(lang('logout'), $tabel_c2, '/logout') ?>


                    </div>
                </div>
            </li>
            <?php break;
        default:
            break;
    } ?>
<!-- 
    <li class="nav-item pb-2">
        <form action="<?= site_url($language . '/welcome/set_language'); ?>" method="post" class="form-inline">
            <select name="language" class="form-control" onchange="this.form.submit()">
                <option value="en" <?= (userdata('site_lang') == 'en') ? 'selected' : ''; ?>>EN</option>
                <option value="id" <?= (userdata('site_lang') == 'id') ? 'selected' : ''; ?>>ID</option>
                <option value="fr" <?= (userdata('site_lang') == 'fr') ? 'selected' : ''; ?>>FR</option>
                <option value="zh" <?= (userdata('site_lang') == 'zh') ? 'selected' : ''; ?>>中文</option>
            </select>
        </form>
    </li> -->
</ul>