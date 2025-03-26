<!-- form tambah buku -->
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
                            <label>Judul</label>
                            <input class="form-control" name="judul" />
                        </div>
                        <!-- Input Pengarang -->
                        <div class="form-group">
                            <label>Pengarang</label>
                            <input class="form-control" name="pengarang" />
                        </div>
                        <!-- Input Penerbit -->
                        <div class="form-group">
                            <label>Penerbit</label>
                            <input class="form-control" name="penerbit" />
                        </div>
                        <!-- Input Tahun Terbit -->
                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <select class="form-control" name="tahun_terbit">
                               <?php
                               
                                    $tahun=date("Y");

                                    for ($i=$tahun-30; $i <= $tahun ; $i++) { 
                                        echo'
                                        
                                            <option value="'.$i.'">'.$i.'</option>
                                        
                                        ';
                                    }
                               
                               ?>
                            </select>
                        </div>
                        <!-- Input ISBN -->
                        <div class="form-group">
                            <label>ISBN</label>
                            <input class="form-control" name="isbn" />
                        </div>
                        <!-- Input Jumlah Buku -->
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input class="form-control" type="number" name="jumlah_buku" />
                        </div>
                         <!-- Input Lokasi Buku -->
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select class="form-control" name="rakbuku">
                                <option value="rak1">Rak 1</option>
                                <option value="rak2">Rak 2</option>
                                <option value="rak3">Rak 3</option>
                            </select>
                        </div>
                        <!-- Tanggal Input Buku -->
                        <div class="form-group">
                            <label>Tanggal Input</label>
                            <input class="form-control" type="date" name="tgl_input" />
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
        $sql=$koneksi->query("insert into tb_buku (judul, pengarang, penerbit, tahun_terbit, isbn, jumlah_buku,rakbuku, tgl_input) 
            values(' $judul',' $pengarang',' $penerbit','$tahun_terbit','$isbn','$jumlah_buku',' $rakbuku',' $tgl_input')");
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
                    window.location.href = "?page=buku";
                });
                </script>                
            <?php
        }
    }
?>

