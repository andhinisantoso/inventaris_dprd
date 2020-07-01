<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA KLIEN
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Klien</th>
                                <th>Nama</th>
                                <th>Bagian</th>
                                <th>Telepon</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_klien");
                            while ($data = $sql->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_klien']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['bagian']; ?></td>
                                    <td><?php echo $data['telepon']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td>
                                        <a href="?page=klien&aksi=ubah&id=<?php echo $data['kode_klien'] ?>" class="btn btn-success">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin akan Menghapus Data ini...?')" href="?page=klien&aksi=hapus&id=<?php echo $data['kode_klien'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=klien&aksi=tambah" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    </div>