<!-- form tambah Anggota -->
<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">               
                    <form method="POST">
                        <!-- Input Judul -->
                        <div class="form-group">
                            <label>NPM</label>
                            <input class="form-control" name="npm" />
                        </div>
                        <!-- Input Pengarang -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" />
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" />
                        </div>
                        <!-- Input Tahun Terbit -->
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir">
                               
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="checkbox-inline">  
                                <input type="checkbox" value="L" name="klmn"/> Laki Laki
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="P" name="klmn"/> Perempuan
                            </label>
                        </div>
                        </div>
                        <!-- Input Jumlah Buku -->
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="prodi">
                                <option value="SE">Software Engineering</option>
                                <option value="TI">Teknologi Informasi</option>
                                <option value="SI">Sistem Informasi</option>
                                <option value="AK">Akuntansi</option>
                                <option value="MM">Manajemen</option>
                            </select>
                        </div>
                        <!-- Simpan -->
                        <div>
                            <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- php -->
<?php
// error_reporting(0);
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $klmn = $_POST['klmn'];
    $prodi = $_POST['prodi'];

    if ($simpan) {
        $sql=$koneksi->query("insert into tb_anggota (npm, nama, tempat_lahir, tgl_lahir, klmn, prodi) 
            values(' $npm',' $nama',' $tempat_lahir','$tgl_lahir','$klmn','$prodi')");
        if ($sql) {
            ?>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil di simpan.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = "?page=anggota";
                });
                </script>                
            <?php
        }
    }
?>

