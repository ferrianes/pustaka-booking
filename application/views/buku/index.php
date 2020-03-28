<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#bukuBaruModal">
                <i class="fas fa-file-alt"></i> Buku Baru
            </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Dipinjam</th>
                        <th scope="col">Dibooking</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                        foreach ($buku as $b) : ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><?= $b['judul_buku']; ?></td>
                                <td><?= $b['pengarang']; ?></td>
                                <td><?= $b['penerbit']; ?></td>
                                <td><?= $b['tahun_terbit']; ?></td>
                                <td><?= $b['isbn']; ?></td>
                                <td><?= $b['stok']; ?></td>
                                <td><?= $b['dipinjam']; ?></td>
                                <td><?= $b['dibooking']; ?></td>
                                <td>
                                    <picture>
                                        <source srcset="" type="image/svg+xml">
                                        <img src="<?= base_url('assets/img/upload/') . $b['image'] ?>" class="img-fluid img-thumbnail" alt="...">
                                    </picture>
                                </td>
                                <td>
                                    <a href="<?= base_url('buku/ubahBuku/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                    <a href="<?= base_url('buku/hapusBuku/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul.' '.$b['judul_buku']; ?> ?')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Container fluid -->

</div>
<!-- End Of Main Content -->

<!-- Modal Tambah Buku Baru -->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModal">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('buku') ?>" method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                         <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku">
                     </div>
                     <div class="form-group">
                         <select name="id_kategori" class="form-control form-control-user">
                             <option value="">Pilih Kategori</option>
                             <?php foreach ($kategori as $k) : ?>
                                 <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>       
                     <div class="form-group">
                         <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan Nama Pengarang">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan Nama Penerbit">
                     </div>
                     <div class="form-group">
                        <select name="tahun" class="form-control form-control-user">
                             <option value="">Pilih Tahun</option>
                             <?php for ($i=date('Y'); $i > 1000; $i--) : ?>
                                 <option value="<?= $i; ?>"><?= $i; ?></option>
                             <?php endfor; ?>
                         </select>
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan Nominal Stok">
                     </div>
                     <div class="form-group">
                         <input type="file" class="form-control form-control-user" id="image" name="image">
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>