<?php
    $npm = $_GET['npm'];
    $koneksi->query("DELETE FROM tb_anggota WHERE npm = '$npm'");

?>

<script type="text/javascript">
    window.location.href="?page=anggota";
</script>