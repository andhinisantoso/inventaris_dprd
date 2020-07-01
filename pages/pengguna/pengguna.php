<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA PENGGUNA
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Foto</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_pengguna");
                            while ($data = $sql->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><?php echo $data['level']; ?></td>
                                    <td><img src="images/<?php echo $data['foto']; ?>" width="50" height="50" alt=""></td>
                                    <td>
                                        <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn btn-success">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin akan Menghapus Data ini...?')" href="?page=pengguna&aksi=hapus&id=<?php echo $data['id'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=pengguna&aksi=tambah" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </div>