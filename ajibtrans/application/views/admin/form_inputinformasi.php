
<div class="card">
<form method="post" action="<?= base_url('admin/Informasi/simpan'); ?>" enctype="multipart/form-data">
    <h5 class="card-header">Inputkan Data Baru</h5>
    <div class="card-body">
        <div>
            <label for="defaultFormControlInput" class="form-label">Judul Informasi</label>
            <input name="judul" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Judul Barang">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Keterangan</label>
            <input name="keterangan" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Keterangan">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Tanggal</label>
            <input name="tanggal" type="date" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Tanggal">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Foto</label>
            <input class="form-control" type="file" name="foto" id="formFile"  accept="image/png, image/gif, image/jpeg">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="submit" href="<?= base_url('admin/Informasi/') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>