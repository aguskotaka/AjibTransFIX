
<div class="card mb-4">
<form method="post" action="<?= base_url('admin/Kategori/simpan'); ?>">
    <h5 class="card-header">Inputkan Kategori</h5>
    <div class="card-body">
        <div>
            <label for="defaultFormControlInput" class="form-label">Nama Kategori</label>
            <input name="nama_kategori" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Nama Kategori">

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="submit" href="<?= base_url('admin/Kategori/') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>