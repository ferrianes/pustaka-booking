<div class="container">
    <center>
        <table>
            <tr>
                <td>
                    <div class="table-tesponsive full-width">
                        <table class="table table-bordered table-striped tabel-hover" id="table-datatable">
                            <tr>
                                <th>No.</th>
                                <th>Buku</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Pilihan</th>
                            </tr>
                            <?php
                                $no = 1;
                                foreach ($temp as $t) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded" alt="No Picture" width="10%">
                                        </td>
                                        <td nowrap><?= $t['penulis']; ?></td>
                                        <td nowrap><?= $t['penerbit']; ?></td>
                                        <td nowrap><?= substr($t['tahun_terbit'], 0, 4); ?></td>
                                        <td nowrap>
                                            <a href="<?= base_url('booking/hapusbooking/' . $t['id_buku']); ?>" onclick="return confirm('Yakin tidak jadi Booking <?= $t['judul_buku']; ?>')" class="btn btn-sm btn-outline-danger"><i class="fas fw fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                    $no++;
                                }
                            ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <a href="<?= base_url(); ?>" class="btn btn-sm btn-outline-primary"><span class="fas fw fa-play"></span> Lanjutkan Booking Buku</a>
                    <a href="<?= base_url() . 'booking/bookingSelesai/' . $this->session->userdata('id_user'); ?>" class="btn btn-sm btn-outline-success"><span class="fas fw fa-stop"></span> Selesaikan Booking</a>
                </td>
            </tr>
        </table>
    </center>
</div>