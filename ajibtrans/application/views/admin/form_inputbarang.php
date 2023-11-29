
<div class="card mb-4">
<form method="post" action="<?= base_url('admin/Barang/simpan'); ?>" enctype="multipart/form-data">
    <h5 class="card-header">Tambahkan Barang</h5>
    <div class="card-body">
        <div>
            <label for="defaultFormControlInput" class="form-label">Judul Barang</label>
            <input name="judul" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Judul Barang">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Kategori</label>
            <select class="form-select" name="id_kategori" id="exampleFormControlSelect1" aria-label="Default select example">
            <option selected="">Pilih Kategori :</option>
            <?php 
                foreach ($kategori as $aa) { ?>
            <option value="<?= $aa['id_kategori']; ?>"> <?= $aa['nama_kategori']; ?></option>
            <?php 
                } ?>
                </select>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Harga</label>
            <input name="harga" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Harga Barang">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Keterangan</label>
           <textarea name="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control"
            accept="image/png, image/gif, image/jpeg">
        </div> 
        <div>
        <label for="exampleFormControlSelect1" class="form-label">Status Barang</label>
            <select class="form-select" name="status" id="exampleFormControlSelect1" aria-label="Default select example">
                <option selected="">Pilih Status :</option>
                <option value="Ready">Ready</option>
                <option value="Sedang Digunakan">Sedang Digunakan</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="submit" href="<?= base_url('admin/Barang') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>