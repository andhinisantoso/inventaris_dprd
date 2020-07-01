<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DATA BARANG
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Bagian</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("select * from tb_barang");
                            while ($data = $sql->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_barcode']; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><?php echo $data['satuan']; ?></td>
                                    <td><?php echo $data['stok']; ?></td>
                                    <td><?php echo $data['bagian']; ?></td>
                                    <td><?php echo $data['deskripsi']; ?></td>
                                    <td>
                                        <a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-success">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda Yakin akan Menghapus Data ini...?')" href="?page=barang&aksi=hapus&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah</a>
            </div>
        </div>