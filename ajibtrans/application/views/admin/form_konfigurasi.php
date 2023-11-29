
<div class="card mb-4">
<form method="post" action="<?= base_url('admin/Konfigurasi/update'); ?>">
    <h5 class="card-header">Inputkan Konfigurasi</h5>
    <div class="card-body">
        <div>
            <label for="defaultFormControlInput" class="form-label">Judul Website</label>
            <input name="judul_website" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Judul Website" value="<?= $konfig->judul_website; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Profil Website</label>
            <textarea name="profile_website" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Profil Website"><?= $konfig->profile_website; ?></textarea>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Waktu Buka</label>
            <textarea name="waktu_buka" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Waktu Buka"><?= $konfig->waktu_buka; ?></textarea>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Instagram</label>
            <input name="instagram" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Instagram" value="<?= $konfig->instagram; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Facebook</label>
            <input name="facebook" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Facebook" value="<?= $konfig->facebook; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Email" value="<?= $konfig->email; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Alamat</label>
            <input name="alamat" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Alamat" value="<?= $konfig->alamat; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">No Wa</label>
            <input name="no_wa" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Nomor WhatApp" value="<?= $konfig->no_wa; ?>">
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Tiktok</label>
            <input name="tiktok" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Tiktok" value="<?= $konfig->tiktok; ?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</div>