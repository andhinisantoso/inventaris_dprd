<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah Barang
                </h2>
            </div>

            <div class="body">
                <form method="POST">

                    <label for="">Kode Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode" />
                        </div>
                    </div>

                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" />
                        </div>
                    </div>

                    <label for="">Satuan Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="">-- Pilih Satuan --</option>
                                <option value="pcs">pcs</option>
                                <option value="pack">pack</option>
                                <option value="lusin">lusin</option>
                                <option value="botol">botol</option>
                                <option value="rim">rim</option>
                                <option value="kodi">kodi</option>
                                <option value="liter">liter</option>
                                <option value="kilogram">kilogram</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="stok" />
                        </div>
                    </div>

                    <label for="">Klien</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="klien" />
                        </div>
                    </div>

                    <label for="">Deskripsi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="deskripsi" />
                        </div>
                    </div>

                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                </form>

                <?php

                if (isset($_POST['simpan'])) {
                    $kode = $_POST['kode'];
                    $nama = $_POST['nama'];
                    $satuan = $_POST['satuan'];
                    $stok = $_POST['stok'];
                    $klien = $_POST['klien'];
                    $deskripsi = $_POST['deskripsi'];

                    $sql = $koneksi->query("insert into tb_barang value('$kode', '$nama', '$satuan', '$stok', '$klien', '$deskripsi')");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Ditambahkan");
                            window.location.href = "?page=barang";
                        </script>
                <?php
                    }
                }

                ?>

            </div>