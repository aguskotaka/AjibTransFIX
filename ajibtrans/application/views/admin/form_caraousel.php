
<div class="card mb-4">
    <form method="post" action="<?= base_url('admin/Caraousel/simpan'); ?>" enctype="multipart/form-data">
        <h5 class="card-header">Tambahkan Caraousel</h5>
        <div class="card-body">
            <div>
                <label for="defaultFormControlInput" class="form-label">Judul </label>
                <input name="judul" type="text" class="form-control" id="defaultFormControlInput"
                    placeholder="Masukkan Judul">
            </div>
            <div>
                <label for="defaultFormControlInput" class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/png, image/gif, image/jpeg">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <?php foreach ($cara as $aa) { ?>
                <div class="col-md-6  col-lg-4 mb-3 ">
                    <div class="card h-100">
                        <img class="card-img-top" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $aa['judul'] ?>
                            </h5>
                            <a href="<?= base_url('admin/Caraousel/hapus/' . $aa['foto']) ?>"
                                onclick="return confirm('Apakah anda yakin menghapus Caraousel ini??')" class="btn btn-danger m-2"><i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>