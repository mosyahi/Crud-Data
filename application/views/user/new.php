<div class="container py-5">
  <div class="card col-md-8 mx-auto">
    <div class="card-header">
      <h3>Form tambah barang</h3>
    </div>
    <div class="card-body">
      <form action="<?= base_url('user/add') ?>" method="post">
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Kode Barang</label>
          <input type="text" name="kode_barang" class="form-control" id="exampleFormControlInput1" placeholder="Kode Barang" value="<?= set_value('kode_barang') ?>">
          <?= form_error('kode_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" id="exampleFormControlInput1" placeholder="Nama Barang" value="<?= set_value('nama_barang') ?>">
          <?= form_error('nama_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Lokasi Barang</label>
          <select class="form-select" name="lokasi_barang" aria-label="Default select example">
            <option selected disabled>Pilih Lokasi Barang</option>
            <option>Rak 1</option>
            <option>Rak 2</option>
            <option>Rak 3</option>
          </select>
          <?= form_error('lokasi_barang', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Stock Barang</label>
          <input type="number" name="stock" class="form-control" id="exampleFormControlInput1" placeholder="Stock Barang" value="<?= set_value('stock') ?>">
          <?= form_error('stock', '<small class="text-danger">', '</small>') ?>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
          <input type="text" name="harga" class="form-control" id="exampleFormControlInput1" placeholder="Harga Barang" value="<?= set_value('harga') ?>">
          <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a type="button" href="<?= base_url('user') ?>" class="btn btn-warning">Back</a>
      </form>
    </div>
  </div>
</div>