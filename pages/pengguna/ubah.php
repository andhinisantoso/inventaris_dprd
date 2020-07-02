<?php

$id = $_GET['id'];

$sql2 = $koneksi->query("select * from tb_pengguna where id = '$id'");
$tampil = $sql2->fetch_assoc();

$level = $tampil['level'];

?>



<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Ubah Pengguna
                </h2>

            </div>
            <div class="body">

                <form method="POST" enctype="multipart/form-data">

                    <label for="">Username</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="username" value="<?= $tampil['username']; ?>" class="form-control" />
                        </div>
                    </div>

                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="nama" value="<?= $tampil['nama']; ?>" class="form-control" />
                        </div>
                    </div>

                    <label for="">Email</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="email" name="email" value="<?= $tampil['email']; ?>" class="form-control" />
                        </div>
                    </div>

                    <label for="">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="password" value="<?= $tampil['password']; ?>" class="form-control" />
                        </div>
                    </div>

                    <label for="">Level</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="level" class="form-control show-tick">
                                <option value="admin" <?php if ($level == 'admin') {
                                                            echo "selected";
                                                        } ?>>admin</option>
                                <option value="staff" <?php if ($level == 'staff') {
                                                            echo "selected";
                                                        } ?>>staff</option>

                            </select>
                        </div>
                    </div>

                    <label for="">Foto</label>
                    <div class="form-group">
                        <div class="form-line">
                            <img src="images/<?= $tampil['foto']; ?>" width="200" height="200" alt="">
                        </div>
                    </div>

                    <label for="">Ganti Foto</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" name="foto" class="form-control">
                        </div>
                    </div>


                    <input type="submit" name="simpan" value="simpan" class="btn btn-primary">

                </form>

                <?php

                if (isset($_POST['simpan'])) {

                    $username = $_POST['username'];
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $level = $_POST['level'];
                    $foto = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];


                    if (!empty($lokasi)) {
                        $upload = move_uploaded_file($lokasi, "images/" . $foto);
                        $sql = $koneksi->query("update tb_pengguna set username='$username', nama='$nama', email='$email', password='$password', level='$level', foto='$foto' where id='$id'");

                        if ($sql) {
                ?>
                            <script>
                                alert("Data berhasil diubah");
                                window.location.href = "?page=pengguna";
                            </script>
                        <?php
                        }
                    } else {
                        $sql = $koneksi->query("update tb_pengguna set username='$username', nama='$nama', email='$email', password='$password', level='$level' where id='$id'");

                        if ($sql) {
                        ?>

                            <script>
                                alert("Data berhasil diubah");
                                window.location.href = "?page=pengguna";
                            </script>

                <?php
                        }
                    }
                }

                ?>
            </div>