<?php

    $kode = $_GET['kodepb'];
?>

<div class="row clearfix">

    <div class="body">
        <form method="POST">

            <div class="col-md-2">
                <input type="text" name="kode" value=<?= $kode; ?> class="form-control" randomly="" />
            </div>

            <div class="col-md-2">
                <input type="text" class="form-control" autofocus="" name="kode_barcode"/>
            </div>

            <div class="col-md-2">
                <input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">
            </div>
        </form>
    </div>