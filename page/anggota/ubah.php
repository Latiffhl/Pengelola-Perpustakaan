<!-- deklarasi -->
<?php
// $npm = $_GET['npm'];

// $stmt = $koneksi->prepare("SELECT * FROM tb_anggota WHERE npm = ?");
// $stmt->bind_param("s", $npm);
// $stmt->execute();
// $result = $stmt->get_result();
// $tampil = $result->fetch_assoc();
// $klmn1 = $tampil['klmn'];
// $prodi = $tampil['prodi'];
?>
<!-- form tambah Anggota -->
<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">               
                    <form method="POST">
                        <!-- Input Judul -->
                        <div class="form-group">
                            <label>NPM</label>
                            <input class="form-control" name="npm" value="<?php echo $tampil['npm'];?>"readonly/>
                        </div>
                        <!-- Input Pengarang -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" name="nama" value="<?php echo $tampil['nama'];?>"/>
                        </div>
                        <!-- Tempat Lahir -->
                        <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" value="<?php echo $tampil['tempat_lahir'];?>"/>
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir'];?>"/>
                               
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <label class="radio-inline">   

                                <input type="radio"   
                        name="klmn" value="L" <?php if($tampil['klmn'] == 'L') echo 'checked'; ?>> Laki-laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="klmn" value="P" <?php if($tampil['klmn'] == 'P') echo 'checked'; ?>> Perempuan
                            </label>
                        </div>
                        <!-- Opsi Jurusan -->
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select class="form-control" name="prodi">
                                <option value="SE" <?php if($tampil['prodi'] == 'SE') echo 'selected'; ?>>Software Engineering</option>
                                <option value="TI" <?php if($tampil['prodi'] == 'TI') echo 'selected'; ?>>Teknologi Informasi</option>
                                <option value="SI" <?php if($tampil['prodi'] == 'SI') echo 'selected'; ?>>Sistem Informasi</option>
                                <option value="AK" <?php if($tampil['prodi'] == 'AK') echo 'selected'; ?>>Akuntansi</option>
                                <option value="MM" <?php if($tampil['prodi'] == 'MM') echo 'selected'; ?>>Manajemen</option>
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
    $npm= $_POST['npm'];
    $nama= $_POST['nama'];
    $tempat_lahir= $_POST['tempat_lahir'];
    $tgl_lahir= $_POST['tgl_lahir'];
    $klmn= $_POST['klmn'];
    $prodi= $_POST['prodi'];
    $simpan= $_POST['simpan'];
    if ($simpan) {
        $sql=$koneksi->query("UPDATE tb_anggota set nama='$nama', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', klmn='$klmn', prodi='$prodi' WHERE npm='$npm'");
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
                    window.location.href = "?page=anggota";
                });
                </script>                
            <?php
        }
    }
?>

