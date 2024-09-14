<!-- modal cari data pesanan -->
<div id="cari" class="modal fade cari">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= modal_header('Cari daftar ' . $tabel_f2_alias . ' Anda' , '') ?>
            
            <!-- form mencari data pesanan, method get utk menampilkan apa yg diinput pengguna di halaman tujuan -->
            <form action="<?= site_url($language . '/' . $tabel_f2 . '/cari') ?>" method="get">
                <div class="modal-body">
                    <?= input_add('text', 'tabel_f2_field1', 'required') ?>
                    <?= input_add('text', 'tabel_f2_field4', 'required') ?>
                </div>

                <!-- memunculkan notifikasi modal -->
                <p class="small text-center text-danger">
                    <?= get_flashdata('pesan_cari') ?>
                </p>

                <div class="modal-footer">
                    <?= btn_cari() ?>
                </div>
            </form>

        </div>
    </div>
</div>