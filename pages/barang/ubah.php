<?php
$kode = $_GET['id'];

$sql = $koneksi->query("select * from tb_barang where kode_barcode = '$kode'");
$tampil = $sql->fetch_assoc();
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah Barang
                </h2>
            </div>

            <div class="body">
                <form method="POST">

                    <label for="">Kode Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode" value="<?php echo $tampil['kode_barcode'] ?>" />
                        </div>
                    </div>

                    <label for="">Nama Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama_barang'] ?>" />
                        </div>
                    </div>

                    <label for="">Satuan Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="satuan" class="form-control show-tick">
                                <option value="pcs" <?php if ($tampil['satuan'] == 'pcs') {
                                                        echo "selected";
                                                    } ?>>pcs</option>
                                <option value="pack" <?php if ($tampil['satuan'] == 'pack') {
                                                            echo "selected";
                                                        } ?>>pack</option>
                                <option value="lusin" <?php if ($tampil['satuan'] == 'lusin') {
                                                            echo "selected";
                                                        } ?>>lusin</option>
                                <option value="botol" <?php if ($tampil['satuan'] == 'botol') {
                                                            echo "selected";
                                                        } ?>>botol</option>
                                <option value="rim" <?php if ($tampil['satuan'] == 'rim') {
                                                        echo "selected";
                                                    } ?>>rim</option>
                                <option value="kodi" <?php if ($tampil['satuan'] == 'kodi') {
                                                            echo "selected";
                                                        } ?>>kodi</option>
                                <option value="liter" <?php if ($tampil['satuan'] == 'liter') {
                                                            echo "selected";
                                                        } ?>>liter</option>
                                <option value="kilogram" <?php if ($tampil['satuan'] == 'kilogram') {
                                                                echo "selected";
                                                            } ?>>kilogram</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Stok</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="stok" value="<?php echo $tampil['stok'] ?>" />
                        </div>
                    </div>

                    <label for="">Klien</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="klien" value="<?php echo $tampil['kepemilikan'] ?>" />
                        </div>
                    </div>

                    <label for="">Deskripsi</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $tampil['deskripsi'] ?>" />
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
                            alert("Data berhasil disimpan");
                            window.location.href = "?page=barang";
                        </script>
                <?php
                    }
                }

                ?>

            </div>