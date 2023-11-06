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
<!-- END DATA BARANG -->
<!-- END DATA KARYAWAN -->