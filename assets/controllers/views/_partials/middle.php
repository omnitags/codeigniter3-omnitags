<!-- modal cari data pesanan -->
<div id="cari" class="modal fade cari">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari daftar <?= $tabel_f2_alias ?> Anda</h5>

                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <!-- form mencari data pesanan, method get utk menampilkan apa yg diinput pengguna di halaman tujuan -->
            <form action="<?= site_url($tabel_f2 . '/cari') ?>" method="get">
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            <?= $tabel_f2_field1_alias ?>
                        </label>
                        <input class="form-control" type="text" required name="<?= $tabel_f2_field1_input ?>"
                            placeholder="Masukkan <?= $tabel_f2_field1_alias ?>">
                    </div>

                    <div class="form-group">
                        <label>
                            <?= $tabel_f2_field4_alias ?>
                        </label>
                        <input class="form-control" type="email" required name="<?= $tabel_f2_field4_input ?>"
                            placeholder="Masukkan <?= $tabel_f2_field4_alias ?> Anda">
                    </div>
                </div>

                <!-- memunculkan notifikasi modal -->
                <p class="small text-center text-danger">
                    <?= $this->session->flashdata('pesan_cari') ?>
                </p>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Cari</button>
                </div>
            </form>

        </div>
    </div>
</div>