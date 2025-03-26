<a href="?page=anggota&aksi=tambah" class="btn btn-primary" style="margin-bottom: 5px;">Tambah Data</a>
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
                                 <th>NPM</th>
                                 <th>Nama</th>
                                 <th>Tempat Lahir</th>
                                 <th>Tanggal Lahir</th>
                                 <th>Jenis Kelamin</th>
                                 <th>Program Studi</th>
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
                                
                                $sql =mysqli_query($koneksi, "SELECT * FROM tb_anggota");
                                while ($data= mysqli_fetch_array($sql)) {
                                    switch ($data['klmn']) {
                                        case 'L':
                                            $klmn = "Laki-Laki";
                                            break;
                                        case 'P':
                                            $klmn = "Perempuan";
                                            break; 
                                        default:
                                            $klmn = "Tidak Diketahui";
                                    }switch ($data['prodi']) {
                                        case 'SE':
                                            $prodi = "Software Engineering";
                                            break;
                                        case 'TI':
                                            $prodi = "Teknologi Informasi";
                                            break;
                                        case 'SI':
                                            $prodi = "Sisem Informasi";
                                            break;
                                        case 'AK':
                                            $prodi = "Akuntansi";
                                            break;
                                        case 'MM':
                                            $prodi = "Manajemen";
                                            break;
                                        default:
                                            $prodi = "Tidak Diketahui";    
                                    }
                                   
                                        
                                                                            
                                
                                
                               
                                
                            ?>

                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $data['npm'];?></td>
                                <td><?php echo $data['nama'];?></td>
                                <td><?php echo $data['tempat_lahir'];?></td>
                                <td><?php echo $data['tgl_lahir'];?></td>
                                <td><?php echo $klmn;?></td>
                                <td><?php echo $prodi;?></td>
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


