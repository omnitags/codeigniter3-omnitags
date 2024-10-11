<div class="modal fade quickTour">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selamat datang di Website <?= $p->nama ?></h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>Silahkan ikuti tour berikut ini</p>
                </div>
                <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_quickTour') ?></p>
                <div class="modal-footer">
                    <?php
                    $userType = $this->session->userdata($tabel_c2_field6);
                    switch ($userType) {
                        case $tabel_c2_field6_value5:
                            ?>
                            <a id="introTamu" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>
                            <?php
                            break;
                        case $tabel_c2_field6_value3:
                            ?>
                            <a id="introAdministrator" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>
                            <?php
                            break;
                        case $tabel_c2_field6_value2:
                            ?>
                            <a id="introAccounting" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>
                            <?php
                            break;
                        default:
                            ?>
                            <a id="introTamu" data-dismiss="modal" class="btn btn-success">Mulai Tour</a>
                            <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
