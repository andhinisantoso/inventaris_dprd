<?php

    $kode = $_GET['kodepb'];
?>

<div class="row clearfix">

    <div class="body">
        <form method="POST">

            <div class="col-md-2">
                <input type="text" name="kode_pengambilan" value=<?= $kode; ?> class="form-control" readonly="" />
            </div>

            <div class="col-md-2">
                <input type="text" class="form-control" autofocus="" name="kode_barcode"/>
            </div>

            <div class="col-md-2">
                <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>

<?php

    if (isset($_POST['simpan'])) {

        $date = date("Y-m-d");
        $kd_pb = $_POST['kode_pengambilan'];
        $barcode = $_POST['kode_barcode'];

        $barang = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");

        $data_barang = $barang->fetch_assoc();

        $jumlah = 1;

        $total = $jumlah;
        
        $barang2 = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");

        while ($data_barang2 = $barang2->fetch_assoc()) {
            $sisa = $data_barang2['stok'];

            if ($sisa == 0) {
                ?>

                <script type="text/javascript">
                    alert("stok barang HABIS ... Tidak dapat mengambil barang");
                    window.location.href="?page=pengambilan&kodepb=<?= $kode;?>"
                </script>

                <?php
            } else {

                $koneksi->query("insert into tb_pengambilan (kode_pengambilan, kode_barcode, jumlah, total, tgl_pengambilan) VALUES ('$kd_pb', '$barcode', '$jumlah', '$total', '$date')");

            }
        }

    }
?>

<br><br>

<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR PENGAMBILAN
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                
                                    <tbody>

                                    <?php

                                        $no = 1;
                                        $sql = $koneksi->query("select * FROM tb_pengambilan, tb_barang WHERE
                                                                tb_pengambilan.kode_barcode=tb_barang.kode_barcode AND kode_pengambilan='$kode'");
                                        while ($data = $sql->fetch_assoc()) : ?>
                                            
                                        
                                    
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            
                                            <td><?= $data ['kode_barcode']; ?></td>
                                            <td><?= $data ['nama_barang']; ?></td>
                                            <td><?= $data ['jumlah']; ?></td>
                                            <td><?= $data ['total']; ?></td>
                                            <td>
                                                <a href="?pages=pelanggan&aksi=ubah&id=<?= $data['kode_pelanggan']; ?>" class="btn btn-success">Tambah</a>
                                                <a href="?pages=pelanggan&aksi=ubah&id=<?= $data['kode_pelanggan']; ?>" class="btn btn-success">Kurang</a>
                                                <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus?')" href="?pages=pelanggan&aksi=hapus&id=<?= $data['kode_pelanggan']; ?>"  class="btn btn-warning">Hapus</a>
                                            </td>
                                        </tr>

                                        <?php 
                                        
                                            $total_semua = $total_semua+$data['total'];
                                    
                                            endwhile;
                                                            
                                        ?>
                                    
                                    </tbody>

                                    <tr>
                                        <th colspan="5" style="text-align: right;">Total</th>
                                        <td><input type="number" style="text-align: right;" name="total_semua" id="total_semua" onkeyup="hitung();" readonly="" value="<?= $total_semua; ?>"></td>
                                    
                                    </tr>
                        
                    </table>
                </div>
                
            </div>
        </div>
    </div>