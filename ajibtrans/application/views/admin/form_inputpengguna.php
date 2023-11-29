
<div class="card mb-4">
<form method="post" action="<?= base_url('admin/pengguna/simpan'); ?>">
    <h5 class="card-header">Inputkan Data Baru</h5>
    <div class="card-body">
        <div>
            <label for="defaultFormControlInput" class="form-label">Username</label>
            <input name="username" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Username">
            <div>
            </div>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Nama</label>
            <input name="nama" type="text" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Nama">
            <div>
            </div>
        </div>
        <div>
            <label for="defaultFormControlInput" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="defaultFormControlInput"
                placeholder="Masukkan Password">
            <div>
            </div>
        </div>
        <br>
        <div class="form-floating mb-3">
            <select class="form-select" name="level">
                <option value="Admin">Admin</option>
            </select>
            <label for="floatingSelect">Level</label>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="submit" href="<?= base_url('admin/Pengguna/') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>