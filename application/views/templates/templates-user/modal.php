<!-- Login Modal -->
<div class="modal fade" tabindex="-1" id="loginModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login Member</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" placeholder="Alamat Email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary" type="submit">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Login Modal -->

<!-- Daftar Modal -->
<div class="modal fade" tabindex="-1" id="daftarModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Anggota</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('member/daftar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="email" placeholder="Alamat Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password1" id="password1" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password2" id="password2" placeholder="Ulangi Password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-outline-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Daftar Modal -->

<!-- Modal Info -->
<div class="modal fade" tabindex="-1" id="modalInfo" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Informaso</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="alert alert-message alert-success">Waktu Pengembalian Buku 1x24 Jam dari booking!!!</span>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url() ?>" type="button" class="btn btn-outline-info" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>
<!-- /Modal Info -->