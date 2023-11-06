<!-- DATA BARANG -->
<div class="container py-5">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="card mx-auto">
    <div class="card-header">
      <a href="<?= base_url('user/add') ?>" class="btn btn-primary  my-2" style="float: right;">Tambah Barang</a>
      <h3>Data Barang</h3>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Barang</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Stock</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php if (empty($tb_barang)): ?>
            <tr>
              <td colspan="7" class="text-center">Belum Ada Data</td>
            </tr>
          <?php else : ?>
            <?php foreach($tb_barang as $item) : ?>
              <tr>
                <th><?= $i++; ?></th>
                <td><?= $item['kode_barang'] ?></td>
                <td><?= $item['nama_barang'] ?></td>
                <td><?= $item['lokasi_barang'] ?></td>
                <td><?= $item['stock'] ?> Pcs</td>
                <td>Rp. <?= $item['harga'] ?></td>
                <td>
                  <a class="btn btn-primary btn-sm" href="<?= base_url('user/edit/' . $item['id_barang']) ?>">Edit</a>
                  <a class="btn btn-danger btn-sm" href="<?= base_url('user/delete/' . $item['id_barang']) ?>">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- END DATA BARANG -->


<!-- DATA KARYAWAN -->
<div class="container py-1">
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
                  <a class="btn btn-primary btn-sm" href="<?= base_url('user/edit/' . $item['id_barang']) ?>">Edit</a>
                  <a class="btn btn-danger btn-sm" href="<?= base_url('user/delete/' . $item['id_barang']) ?>">Delete</a>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endif ?>
        </tbody>
      </table>
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
<!-- END DATA KARYAWAN -->