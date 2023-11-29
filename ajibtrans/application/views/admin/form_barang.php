<div class="card">
    <h4 class="card-header">Data Barang</h4>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Judul Konten</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Tanggal</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            <tbody class="table-border-bottom-0">
                <?php $no = 1;
                foreach ($barang as $aa) { ?>
                    <tr>
                        <th scope="row">
                            <?= $no; ?>
                        </th>
                        <td>
                            <?= $aa['judul']; ?>
                        </td>
                        <td>
                            <?= $aa['nama_kategori']; ?>
                        </td>
                        <td>
                            <?= $aa['harga']; ?>
                        </td>
                
                        <td>
                            <?= $aa['tanggal']; ?>
                        </td>
                        <td>
                            <a href="<?= base_url('assets/upload/barang/' . $aa['foto']) ?>" target="_blank">
                                <span class="tf-icon bx bx-camera"></span>Lihat Foto</a>
                        </td>
                        <td>
                            <?= $aa['status']; ?>
                        </td>

                        <div class="mt-3">
                            <td>
                                <a class="btn btn-warning m-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal<?= $aa['id_barang'] ?>" data-bs-whatever="@fat"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pen" viewBox="0 0 16 16">
                                        <path
                                            d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                                    </svg></a>
                                <div class="modal fade" id="exampleModal<?= $aa['id_barang'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url('admin/barang/update') ?>" method="post"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="nama_foto" class="form-control"
                                                        value="<?= $aa['foto'] ?>">
                                                    <div class="mb-3">
                                                        <label class="form-label">Judul Konten</label>
                                                        <input type="text" name="judul" class="form-control"
                                                            value="<?= $aa['judul'] ?>">
                                                    </div>
                                                    <div>
                                                        <label for="defaultFormControlInput"
                                                            class="form-label">Kategori</label>
                                                        <select name="id_kategori" class="form-control">
                                                            <?php
                                                            foreach ($kategori as $uu) { ?>
                                                                <option 
                                                                <?php if($uu['id_kategori']==$aa['id_kategori']){ echo"selected";}?>
                                                                value="<?= $uu['id_kategori']; ?>"> <?= $uu['nama_kategori']; ?></option>
                                                            <?php
                                                            } ?>
                                                        </select>
                                                    </div>
                                               
                                                    <div class="mb-3">
                                                        <label class="form-label">Keterangan</label>
                                                        <textarea type="text" name="keterangan" class="form-control"
                                                            ><?= $aa['keterangan'] ?></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga Barang</label>
                                                        <input type="text" name="harga" class="form-control"
                                                            value="<?= $aa['harga'] ?>">
                                                    </div>

                                                    <div>
                                                        <label for="defaultFormControlInput"
                                                            class="form-label">Status Barang</label>
                                                            <select class="form-select" name="status" id="floatingSelect">
                                                                <option value="Ready" <?php if ($aa['status'] == 'Ready') {
                                                                    echo "selected";
                                                                } ?>>Ready
                                                                </option>
                                                                <option value="Sedang Digunakan" <?php if ($aa['status'] == 'Sedang Digunakan') {
                                                                    echo "selected";
                                                                } ?>>Sedang Digunakan
                                                                </option>
                                                            </select>
                                                    </div>

                                                    <div>
                                                        <label for="defaultFormControlInput" class="form-label">Foto</label>
                                                        <input type="file" name="foto" class="form-control"
                                                        accept="image/png, image/gif, image/jpeg">
                                                    </div> 
                                                    <br>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= base_url('admin/Barang/hapus/' . $aa['foto']) ?>"
                                    onclick="return confirm('Apakah anda yakin menghapus Konten ini??')"
                                    class="btn btn-danger m-2"><i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                            <path
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                        </svg>
                                    </i>
                                </a>
                            </td>


                        </div>

                    </tr>

                    <?php $no++;
                } ?>
                <div class="container-fluid pt-0 px-3">
                    <a type="button" href="<?= base_url('admin/Barang/input_konten') ?>"
                        class="btn btn-primary">Tambahkan Barang !</a>
                </div>
                <br>
            </tbody>
        </table>
    </div>
</div>