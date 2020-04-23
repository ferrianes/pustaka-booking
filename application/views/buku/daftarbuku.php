<?= $this->session->flashdata('pesan'); ?>
<?php if(validation_errors()) : ?>
    <div class="alert alert-danger alert-message" role="alert">
        <?= validation_errors(); ?>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col">
        <!--Tampilkan pagination-->
        <?php echo $pagination; ?>
    </div>
</div>

<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
                <!-- Looping products -->
                <?php foreach($data->result() as $b) : ?>
                    <div class="col-md-2 col-md-3">
                        <div class="thumbnail" style="height: 370px;">
                            <img src="<?= base_url() ?>assets/img/upload/<?= $b->image; ?>" style="max-width: 100%; max-height: 100%; height: 200px; width: 180px;">
                            <div class="caption">
                                <h5 style="min-height: 30px;"><?= $b->pengarang; ?></h5>
                                <h5><?= $b->penerbit; ?></h5>
                                <h5><?= substr($b->tahun_terbit, 0, 4); ?></h5>
                                <p>
                                    <?php
                                    if ($b->stok < 1) {
                                        echo "<i class='btn btn-outline-primary'><i class='fas fw fa-shopping-cart'></i> Booking&nbsp&nbsp 0</i>";
                                    } else {
                                        echo "<a class='btn btn-outline-primary' href ='" . base_url('booking/tambahBooking/' . $b->id) . "'><i class='fas fw fa-shopping-cart'></i> Booking</a>";
                                    }
                                    ?>

                                    <a href="<?= base_url('home/detailBuku/' . $b->id); ?>" class="btn btn-outline-warning"><i class="fas fw fa-search"></i> Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>