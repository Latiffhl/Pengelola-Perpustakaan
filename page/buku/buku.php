<a href="?page=buku&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>
<br>
<div class="row">
     <div class="col-md-12">
         <!-- Advanced Tables -->
         <div class="panel panel-default">
             <div class="panel-heading">
                 Data Buku
             </div>
             <div class="panel-body">
                 <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Judul</th>
                                 <th>Pengarang</th>
                                 <th>Penerbit</th>
                                 <th>ISBN</th>
                                 <th>Jumlah Buku</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>

                         <tbody>

                            <?php
                            // HIDE
                            // error_reporting(0);

                                $no = 1;
                                // mysql
                                $sql =mysqli_query($koneksi, "SELECT * FROM tb_buku");
                                while ($data= mysqli_fetch_array($sql)) {
                                    switch ($data['rakbuku']) {
                                        case 'rak1':
                                            $rakbuku = "Rak 1";
                                            break;
                                        case 'rak2':
                                            $rakbuku = "Rak 2";
                                            break;
                                        case 'rak3':
                                            $rakbuku = "Rak 3";
                                            break;
                                        
                                        default:
                                            $rakbuku = "Tidak Diketahui";
                                        }
                               

                                
                            ?>

                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['judul'];?></td>
                                <td><?php echo $data['pengarang'];?></td>
                                <td><?php echo $data['penerbit'];?></td>
                                <td><?php echo $data['isbn'];?></td>
                                <td><?php echo $data['jumlah_buku'];?></td>
                                <td>
                                    <a href="?page=buku&aksi=ubah&id=<?php echo $data['id'];?>" class="btn btn-info">Ubah</a>
                                    <a href="#" onclick="konfirmasiHapus(<?php echo $data['id']; ?>)" class="btn btn-danger">Hapus</a>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                    <script>
                                    function konfirmasiHapus(id) {
                                    Swal.fire({
                                        title: 'Apakah Anda Yakin?',
                                        text: 'Data yang dihapus tidak dapat dikembalikan.',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Hapus',
                                        cancelButtonText: 'Batal'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                        // Jika pengguna menekan tombol "Ya, Hapus", lanjutkan proses penghapusan
                                        window.location.href = "?page=buku&aksi=hapus&id=" + id;
                                        }
                                    })
                                    }
                                    </script>
                                    
                                </td>
                            </tr>

                            <?php } ?>

                         </tbody>
                         </table>
                 </div>
             </div>
         </div>
     </div>
</div>
