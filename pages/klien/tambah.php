<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah Klien
                </h2>
            </div>

            <div class="body">
                <form method="POST">

                    <label for="">Kode Klien</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="kode_klien" />
                        </div>
                    </div>

                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" />
                        </div>
                    </div>

                    <label for="">Bagian</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="bagian" class="form-control show-tick">
                                <option value="">-- Pilih Bagian --</option>
                                <option value="umum">umum</option>
                                <option value="art">art</option>
                                <option value="keuangan">keuangan</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Telepon</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="telepon" />
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
                    $kode = $_POST['kode_klien'];
                    $nama = $_POST['nama'];
                    $bagian = $_POST['bagian'];
                    $telepon = $_POST['telepon'];
                    $deskripsi = $_POST['deskripsi'];

                    $sql = $koneksi->query("insert into tb_klien value('$kode', '$nama', '$bagian', '$telepon', '$deskripsi')");

                    if ($sql) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Ditambahkan");
                            window.location.href = "?page=klien";
                        </script>
                <?php
                    }
                }

                ?>

            </div>