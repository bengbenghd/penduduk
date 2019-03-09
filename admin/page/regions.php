        <h1 class="h3 mb-0 text-gray-800">Regions</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <ul class="nav nav-pills card-header-pills">
			      <li class="nav-item">
			        <a class="nav-link active" href="#" data-toggle="modal" data-target="#inputRegions">Tambah Data</a>
			      </li>
			    </ul>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                	<thead>
			            <tr>
			                <th>No</th>
			                <th>Nama</th>
			                <th>Tanggal</th>
			                <th>Aksi</th>
			            </tr>
			        </thead>
					
					<tbody>
						<?php
						$tgl=date('Y-m-d H:i:s');
						$conn = new mysqli("localhost", "root", "", "mysql");
						if ($con->connect_errno) {
							echo "Failed to connect to MySQL: " . $con->connect_error;
						}
						
						$no = 1;
						$res = $con->query("SELECT * FROM regions");
						while($row = $res->fetch_assoc()){
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['name_regions'].'</td>
								<td>'.$row['created_at'].'</td>
								<td><a href="" data-toggle="modal" data-target="#editRegions'.$row['id_regions'].'"><button class="btn btn-success btn-sm"><span class="fa fa-edit"></span></button></a> |
								 <a href="" data-toggle="modal" data-target="#hapusRegions'.$row['id_regions'].'"><button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>
								    <div class="modal fade" id="editRegions'.$row['id_regions'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									      <div class="modal-dialog modal-lg">
									        <div class="modal-content">
									          <!-- Modal Body -->
									            <div class="modal-body">
									                <form action="" method="POST" role="form">
											         <div class="form-group">
											          <label for="">Nama Daerah</label>
											          <input type="hidden" name="id" class="form-control" value="'.$row['id_regions'].'" id="" placeholder="Input field">
											          <input type="text" name="daerah" class="form-control" id="" placeholder="Input field" value="'.$row['name_regions'].'">
											          <input type="hidden" name="time_date" value="'.$tgl.'" readonly="readonly">
											         </div>
									            </div>
									            
									            <!-- Modal Footer -->
									            <div class="modal-footer">
									                <button type="button" class="btn btn-default" data-dismiss="modal">
									                    Close
									                </button>
									                <button type="submit" class="btn btn-primary" name="update">
									                    Update
									                </button>
									            </div>
									        </div>
									      </div>
									    </div>

									    <!-- Modal Hapus -->
										<div class="modal fade" id="hapusRegions'.$row['id_regions'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										  <div class="modal-dialog" role="document">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										        <h4 class="modal-title" id="myModalLabel"></h4>
										      </div>
										      <div class="modal-body">
										        <form action="" method="POST" role="form">
										         
										         
										         Apakah Anda Ingin Menghapus Data ?
										        
										         
										        
										      </div>
										      <div class="modal-footer">
										        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										        <button type="submit" name="hapus" value="'.$row['id_regions'].'" class="btn btn-primary">Save changes</button>
										       </form>
										      </div>
										    </div>
										  </div>
										</div>
							</tr>
							';
							$no++;
						}
						?>
					</tbody>
					<tfoot>
			            <tr>
			                <th>ID</th>
			                <th>Nama</th>
			                <th>Tanggal</th>
			                <th>Aksi</th>
			            </tr>
			        </tfoot>
                </table>
              </div>
            </div>
          </div>

    <!-- input regions -->
    <div class="modal fade" id="inputRegions" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Body -->
            <div class="modal-body">
                <form action="" method="POST" role="form">
		         <div class="form-group">
		          <label for="">Nama Daerah</label>
		          <input type="text" name="daerah" class="form-control" id="" placeholder="Input field" required="">
		          <input type="hidden" name="time_date" value="<?php echo $tgl; ?>" readonly="readonly">
		         </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary" name="simpan">
                    Tambah
                </button>
            </div>
        </div>
      </div>
    </div>

<?php include('../config.php'); //file database yang sudah di buat

if (isset($_POST['simpan'])) {
 $name_regions= $_POST['daerah'];
 $created_at = $_POST['time_date'];

 $query= mysqli_query($con,"insert into regions values ('','$name_regions','$created_at')") or die(mysqli_error($con));
  echo "<script> alert ('Data Behasil Ditambahkan');
  document.location='index.php?page=regions';

  </script>";
 
}

elseif (isset($_POST['update'])) {
 $id_regions= $_POST['id'];
 $name_regions= $_POST['daerah'];
 $created_at = $_POST['time_date'];


 $query= mysqli_query($con,"update regions set id_regions='$id_regions',name_regions='$name_regions',created_at='$created_at' where id_regions='$id_regions' ") or die(mysqli_error($con));
  echo "<script> alert ('Data Behasil Diubah');
  document.location='index.php?page=regions';

  </script>";
 
}
elseif (isset($_POST['hapus'])) {
 $id_regions= $_POST['hapus'];
 

 $query= mysqli_query($con,"delete from regions where id_regions='$id_regions' ") or die(mysqli_error($con));
  echo "<script>
  document.location='index.php?page=regions';

  </script>";
 
}

?>