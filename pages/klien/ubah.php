<?php
$kode2 = $_GET['id'];

$sql = $koneksi->query("select * from tb_klien where kode_klien = '$kode2'");
$tampil = $sql->fetch_assoc();

$bagian = $tampil['bagian'];
?>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah Klien
                </h2>
            </div>

            <div class="body">
                <form method="POST">

                    <label for="">Kode Klien</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="kode_klien" value="<?php echo $tampil['kode_klien'] ?>" />
                        </div>
                    </div>

                    <label for="">Nama </label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama'] ?>" />
                        </div>
                    </div>

                    <label for="">Bagian</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="bagian" class="form-control show-tick">
                                <option value="umum" <?php if ($bagian == 'umum') {
                                                            echo "selected";
                                                        } ?>>umum</option>
                                <option value="art" <?php if ($bagian == 'art') {
                                                        echo "selected";
                                                    } ?>>art</option>
                                <option value="keuangan" <?php if ($bagian == 'keuangan') {
                                                                echo "selected";
                                                            } ?>>keuangan</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Telepon</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" name="telepon" value="<?php echo $tampil['telepon'] ?>" />
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

                    $kode = $_POST['kode_klien'];
                    $nama = $_POST['nama'];
                    $bagian = $_POST['bagian'];
                    $telepon = $_POST['telepon'];
                    $deskripsi = $_POST['deskripsi'];

                    $sql2 = $koneksi->query("update tb_klien set kode_klien='$kode', nama='$nama', bagian='$bagian', telepon='$telepon', deskripsi='$deskripsi' where kode_klien='$kode2'");

                    if ($sql2) {
                ?>
                        <script type="text/javascript">
                            alert("Data Berhasil Diubah");
                            window.location.href = "?page=klien";
                        </script>
                <?php
                    }
                }

                ?>

            </div>