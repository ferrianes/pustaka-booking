<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <?= form_open_multipart('buku/ubahbuku/' . $buku->id); ?>
            <div class="form-group row">
                <input type="hidden" name="id" value="<?= $buku->id; ?>">
                <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?= $buku->judul_buku; ?>">
                    <?= form_error('judul_buku', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="id_kategori" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="id_kategori" class="form-control form-control-user">
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['r']; ?>" <?= $k['id_kategori'] == $buku->id_kategori ? 'selected' : '' ; ?>><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="pengarang" class="col-sm-2 col-form-label">Nama&nbsp;Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $buku->pengarang; ?>">
                    <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="penerbit" class="col-sm-2 col-form-label">Nama Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku->penerbit; ?>">
                    <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="tahun_terbit" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-10">
                    <select name="tahun" class="form-control form-control-user">
                        <option value="">Pilih Tahun</option>
                        <?php for ($i=date('Y'); $i > 1000; $i--) : ?>
                            <option value="<?= $i; ?>" <?= $i == $buku->tahun_terbit ? 'selected' : '' ; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                    <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $buku->isbn; ?>">
                    <?= form_error('isbn', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <label for="stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $buku->stok; ?>">
                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/upload/') . $buku->image; ?>" class="img-thumbnail" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label for="image" class="custom-file-label">Pilih file</label>
                                <input type="hidden" name="old_pict" value="<?= $buku->image; ?>">
                            </div>
                        </div>
                    </div>
                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button name="submit"pe="submit" class="btn btn-primary">Ubah</button>
                    <button class="btn btn-dark" onclick="window.history.go(-1)"> Kembali</button>
                </div>
            </div>

            </form>
        </div>
    </div>
</div>
</div>