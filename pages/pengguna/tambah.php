<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tambah Pengguna
                </h2>
            </div>

            <div class="body">
                <form method="POST" enctype="multipart/form-data">

                    <label for="">Username</label>
                    <div class=" form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" />
                        </div>
                    </div>

                    <label for="">Nama</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" />
                        </div>
                    </div>

                    <label for="">Email</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" />
                        </div>
                    </div>

                    <label for="">Password</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" />
                        </div>
                    </div>

                    <label for="">Level</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="level" class="form-control show-tick">
                                <option value="">-- Pilih Level --</option>
                                <option value="admin">admin</option>
                                <option value="staff">staff</option>
                            </select>
                        </div>
                    </div>

                    <label for="">Foto</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="file" class="form-control" name="foto" />
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
                    $upload = move_uploaded_file($lokasi, "images/" . $foto);


                    if ($upload) {




                        $sql = $koneksi->query("insert into tb_pengguna (username, nama, email, password,level, foto) values ('$username', '$nama', '$email', '$password', '$level', '$foto')");

                        if ($sql) {
                ?>

                            <script type="text/javascript">
                                alert("Data Berhasil Ditambahkan");
                                window.location.href = "?page=pengguna";
                            </script>

                <?php
                        }
                    }
                }

                ?>

            </div>