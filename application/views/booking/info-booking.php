<div class="container">
    <center>
        <table>
            <?php
                foreach ($useraktif as $u) {
            ?>
            <tr>
                <td nowrap>Terima Kasih <b><?= $u->nama; ?></b></td>
            </tr>
            <tr>
                <td>Buku yang ingin Anda pinjam adalah sebagai berikut : </td>
            </tr>
            <?php } ?>
            <tr>
                <td>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover" id="table-datatable">
                            <t>
                                <td>No.</td>
                                <td>Buku</td>
                                <td>Penulis</td>
                                <td>Penerbit</td>
                                <td>Tahun</td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($items as $i) {
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" alt="No Picture" class="rounded" width="10%">
                                </td>
                                <td nowrap><?= $i['pengarang']; ?></td>
                                <td nowrap><?= $i['penerbit']; ?></td>
                                <td nowrap><?= $i['tahun_terbit']; ?></td>
                            </tr>
                            <?php $no++; } ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td><hr></td>
            </tr>
            <tr>
                <td>
                    <a href="<?= base_url() . 'booking/exportToPdf/' . $this->session->userdata('id_user'); ?>" class="btn btn-sm btn-outline-danger" onclick="information('Waktu Pengembalian Buku 1x24 Jam dari booking!!!')"><span class="far fa-lg fa-fw fa-file-pdf"></span> Pdf</a>
                </td>
            </tr>
        </table>
    </center>
</div>