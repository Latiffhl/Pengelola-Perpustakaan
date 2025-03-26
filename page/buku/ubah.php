<!-- deklarasi -->
<?php

    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_buku WHERE id = '$id'");
    $tampil = $sql->fetch_assoc();
    $tahun2 = $tampil['tahun_terbit'];
    $rakbuku = $tampil['rakbuku'];

?>
<!-- form ubah data buku -->
<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">               
                    <form method="POST">
                        <!-- Ubah Input Judul -->
                        <div class="form-group">
                            <label>Judul</label>
                            <input class="form-control" name="judul" value="<?php echo $tampil['judul'];?>"/>
                        </div>
                        <!-- Ubah Input Pengarang -->
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input class="form-control" name="pengarang" value="<?php echo $tampil['pengarang'];?>"/>
                        </div>
                        <!-- Ubah Input Penerbit -->
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit'];?>"/>
                        </div>
                        <!-- Ubah Input Tahun Terbit -->
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <select class="form-control" name="tahun_terbit" value="<?php echo $tampil['tahun_terbit'];?>">
                               <?php                              
                                    $tahun=date("Y");
                                    for ($i=$tahun-30; $i <= $tahun ; $i++) { 
                                       
                                        if($i == $tahun2) {
                                        echo'<option value="'.$i.'" selected>'.$i.'</option>';
                                    }else{
                                        echo'<option value="'.$i.'">'.$i.'</option>';
                                        } 
                                    }                                                                                                                                                                                                               
                               ?>
                            </select>
                        </div>
                        <!-- Ubah Input ISBN -->
                        <div class="form-group">
                            <label>ISBN</label>
                            <input class="form-control" name="isbn" value="<?php echo $tampil['isbn'];?>"/>
                        </div>
                        <!-- Ubah Input Jumlah Buku -->
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" type="number" name="jumlah_buku" value="<?php echo $tampil['jumlah_buku'];?>" />
                        </div>
                         <!-- Ubah Input Lokasi Buku -->
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" name="rakbuku" value="<?php echo $tampil['rakbuku'];?>">
                                <option value="rak1" <?php if ($rakbuku == 'rak1') { echo "selected"; } ?>>Rak 1</option>
                                <option value="rak2" <?php if ($rakbuku == 'rak2') { echo "selected"; } ?>>Rak 2</option>
                                <option value="rak3" <?php if ($rakbuku == 'rak3') { echo "selected"; } ?>>Rak 3</option>
                            </select>
                        </div>
                        <!-- Ubah Tanggal Input Buku -->
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input class="form-control" type="date" name="tgl_input" value="<?php echo $tampil['tgl_input'];?>"/>
                        </div>
                        <!-- Simpan -->
                        <div>
                            <input type="submit" name="simpan" value="simpan perubahan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- database -->
<?php
// error_reporting(0);
    $judul= $_POST['judul'];
    $pengarang= $_POST['pengarang'];
    $penerbit= $_POST['penerbit'];
    $tahun_terbit= $_POST['tahun_terbit'];
    $isbn= $_POST['isbn'];
    $jumlah_buku= $_POST['jumlah_buku'];
    $rakbuku= $_POST['rakbuku'];
    $tgl_input= $_POST['tgl_input'];
    $simpan= $_POST['simpan'];
    if ($simpan) {
        $sql=$koneksi->query("update tb_buku set judul ='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', isbn='$isbn', jumlah_buku='$jumlah_buku', rakbuku=' $rakbuku', tgl_input='$tgl_input' where id='$id'");

        if ($sql) {
            ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil diubah.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "?page=buku";
                });
                </script>               
            <?php
        }
    }
?>