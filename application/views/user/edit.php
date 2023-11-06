<div class="container py-5">
  <div class="card col-md-8 mx-auto">
    <div class="card-header">
      <h3>Form edit barang</h3>
    </div>
    <div class="card-body">
      <form action="<?= base_url('user/edit/' . $barang['id_barang']) ?>" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Kode Barang</label>
          <input type="text" name="kode_barang" class="form-control" id="exampleFormControlInput1" placeholder="Kode Barang" value="<?= $barang['kode_barang']; ?>">
          <?= form_error('kode_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" value="<?= $barang['nama_barang']; ?>">
          <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Lokasi Barang</label>
          <select class="form-select" name="lokasi_barang" aria-label="Default select example">
            <option disabled>Pilih Lokasi Barang</option>
            <option value="Rak 1" <?= ($barang['lokasi_barang'] == 'Rak 1') ? 'selected' : '' ?>>Rak 1</option>
            <option value="Rak 2" <?= ($barang['lokasi_barang'] == 'Rak 2') ? 'selected' : '' ?>>Rak 2</option>
            <option value="Rak 3" <?= ($barang['lokasi_barang'] == 'Rak 3') ? 'selected' : '' ?>>Rak 3</option>
          </select>
          <?= form_error('lokasi_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Stock Barang</label>
          <input type="number" name="stock" class="form-control" id="exampleFormControlInput1" placeholder="Stock Barang" value="<?= $barang['stock']; ?>">
          <?= form_error('stock', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
          <input type="text" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga Barang" value="<?= $barang['harga']; ?>">
          <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="button" href="<?= base_url('user') ?>" class="btn btn-warning">Back</a>
      </form>
    </div>
  </div>
</div>