
<div class="card">
<form method="post" action="<?= base_url('admin/Galeri/simpan'); ?>" enctype="multipart/form-data">
    <h5 class="card-header">Inputkan Data Baru</h5>
    <div class="card-body">
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" type="file" name="foto" id="formFile"  accept="image/png, image/gif, image/jpeg">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="submit" href="<?= base_url('admin/Galeri/') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>