<?php

$kode2 = $_GET['id'];

$sql = $koneksi->query("delete from tb_klien where kode_klien = '$kode2'");

if ($sql) {
?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "?page=klien";
    </script>

<?php
}
?>