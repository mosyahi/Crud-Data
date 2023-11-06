<!-- DATA KARYAWAN -->
<div class="container py-5">
  <div class="card mx-auto">
    <div class="card-header">
      <a href="<?= base_url('karyawan/add') ?>" class="btn btn-primary my-2" data-bs-toggle="modal" data-bs-target="#add" style="float: right;">Tambah Data Karyawan</a>
      <h3>Data Karyawan</h3>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">No Hp</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($tb_karyawan)): ?>
            <tr>
              <td colspan="8" class="text-center">Belum Ada Data.</td>
            </tr>
          <?php else : ?>
            <?php $i = 1; ?>
            <?php foreach($tb_karyawan as $karyawan) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <?php foreach ($tb_users as $user): ?>
                  <?php if ($user['id_user'] == $karyawan['user_id']): ?>
                    <td><?= $user['nama_lengkap'] ?></td>
                  <?php endif ?>
                <?php endforeach ?>
                <td><?= $karyawan['jabatan'] ?></td>
                <td><?= date('d M Y', strtotime($karyawan['tgl_lahir'])) ?></td>
                <td><?= $karyawan['no_hp'] ?></td>
                <?php foreach ($tb_users as $user): ?>
                  <?php if ($user['id_user'] == $karyawan['user_id']): ?>
                    <td><?= $user['email'] ?></td>
                  <?php endif ?>
                <?php endforeach ?>
                <td><?= $karyawan['alamat'] ?></td>
                <td>  
                  <a class="btn btn-primary btn-sm" href="<?= base_url('user/edit/' . $karyawan['id_karyawan']) ?>">Edit</a>
                  <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-<?= $karyawan['id_karyawan'] ?>">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
      <div class="container text-center">
        <div class="row align-items-end">
          <div class="col">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <!-- JS -->
              </ul>
            </nav>
          </div>
          <div class="col-md-2 mb-3">
            <select class="form-select" id="items-per-page">
              <option value="1">Set</option>
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ADD -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data Karyawan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('karyawan/add') ?>" method="post">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="col-form-label">Jabatan</label>
              <input type="text" name="jabatan" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
              <label class="col-form-label">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label class="col-form-label">No Hp</label>
              <input type="text" name="no_hp" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
              <label class="col-form-label">User Login</label>
              <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected disabled>Pilih User Login</option>
                <?php foreach($tb_users as $user) : ?>
                  <option value="<?= $user['id_user'] ?>"><?= $user['nama_lengkap'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="message-text"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL ADD -->

<!-- MODAL DELETE -->
<?php foreach ($tb_karyawan as $karyawan): ?>
  <div class="modal fade" id="delete-<?= $karyawan['id_karyawan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin ingin menghapus data ini? data akan terapus permanen!.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a type="button" href="<?= base_url('karyawan/delete/' . $karyawan['id_karyawan']) ?>" class="btn btn-danger">Hapus</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
<!-- END MODAL DELETE -->