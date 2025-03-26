<a href="?page=transaksi&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>
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
                                 <th>NPM</th>
                                 <th>Nama</th>
                                 <th>Tanggal Pinjam</th>
                                 <th>Tanggal Kembai</th>
                                 <th>Terlambat</th>
                                 <th>Status</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>

                         <tbody>

                             <?php
                            // HIDE
                            // error_reporting(0);
                            // mysqli_error()

                                $no = 1;
                                // mysql
                                
                                $sql =mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
                                while ($data= mysqli_fetch_assoc($sql)) {
                             
                                
                               
                                
                            ?>

                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['judul'];?></td>
                                <td><?php echo $data['npm'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['tgl_pinjam'];?></td>
                                <td><?php echo $data['tgl_kembali'];?></td>
                                <td><?php
                                
                                    $denda = 1000;

                                    $tgl_dateline = $data['tgl_kembali'];
                                    $tgl_kembali = date('Y-m-d');

                                    $lambat = terlambat($tgl_dateline,$tgl_kembali);
                                    $denda1 = $lambat*$denda;

                                    if($lambat>0){
                                        echo "
                                        
                                        <font color='red'>$lambat hari<br>(Rp $denda1)</font>
                                        
                                        ";
                                    }else{
                                        echo $lambat . "Hari";
                                    }
                                    

                                ?>
                                </td>
                                <td><?php echo $data['status'];?></td>
                                <td>
                                    <a href="?page=anggota&aksi=ubah&npm=<?php echo $data['npm']; ?>" class="btn btn-info">Ubah</a>
                                    <a href="#" onclick="konfirmasiHapus(<?php echo $data['npm']; ?>)" class="btn btn-danger">Hapus</a>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                                    <script>
                                    function konfirmasiHapus(npm) {
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
                                       
                                        window.location.href = "?page=anggota&aksi=hapus&npm=" + npm;
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


