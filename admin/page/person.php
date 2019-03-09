        <h1 class="h3 mb-0 text-gray-800">Person</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <ul class="nav nav-pills card-header-pills">
			      <li class="nav-item">
			        <a class="nav-link active" href="#" data-toggle="modal" data-target="#inputPerson">Tambah Data</a>
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
			                <th>Region</th>
			                <th>Alamat</th>
			                <th>Gaji</th>
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
						$result = $con->query("Select regions.id, regions.name, person.region_id from regions INNER JOIN person ON regions.id=person.id");
						$res = $con->query("SELECT * FROM person");
						while($row = $res->fetch_assoc()){
							echo '
							<tr>
								<td>'.$no.'</td>
								<td>'.$row['name_person'].'</td>
								<td>'.$row['region_id'].'</td>
								<td>'.$row['address'].'</td>
								<td>'.number_format($row['income'], 0, ',', '.').'</td>
								<td>'.$row['created_at'].'</td>
								<td><a href="" data-toggle="modal" data-target="#editPerson'.$row['id_person'].'"><button class="btn btn-success btn-sm"><span class="fa fa-edit"></span></button></a> |
								 <a href="" data-toggle="modal" data-target="#hapusPerson'.$row['id_person'].'"><button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button></a></td>

								    <!-- edit regions -->
								    <div class="modal fade" id="editPerson'.$row['id_person'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
								      <div class="modal-dialog modal-lg">
								        <div class="modal-content">
								          <!-- Modal Body -->
								            <div class="modal-body">
								                <form action="" method="POST" role="form">
										         <div class="form-group">
										          <label for="">Nama :</label>
										          <input type="hidden" name="id" class="form-control" value="'.$row['id_person'].'" id="" placeholder="Input field">
										          <input type="text" name="nama" class="form-control" id="" placeholder="Input field" value="'.$row['name_person'].'" required="">
										          <input type="hidden" name="time_date" value="'.$tgl.'" readonly="readonly">
										         </div>
										         <div class="form-group">
										          <label for="">Alamat :</label>
										          <input type="text-area" name="alamat" class="form-control" id="" placeholder="Input field" value="'.$row['address'].'" required="">
										         </div>
										         <div class="form-group">
										          <label for="">Gaji :</label>
										          <input type="text" name="gaji" class="form-control" id="" placeholder="Input field" value="'.$row['income'].'" required="">
										         </div>
										         <div class="form-group">
										          <label for="">Pilih Region :</label>
										          <select id="" class="form-control" name="region">
										          		<option value="'.$row['region_id'].'">'.$row['region_id'].'
										          		</option>
										          </select>
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
										<div class="modal fade" id="hapusPerson'.$row['id_person'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
										        <button type="submit" name="hapus" value="'.$row['id_person'].'" class="btn btn-primary">Save changes</button>
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
			                <th>No</th>
			                <th>Nama</th>
			                <th>Region</th>
			                <th>Alamat</th>
			                <th>Gaji</th>
			                <th>Tanggal</th>
			                <th>Aksi</th>
			            </tr>
			        </tfoot>
                </table>
              </div>
            </div>
          </div>


    <!-- input regions -->
    <div class="modal fade" id="inputPerson" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Body -->
            <div class="modal-body">
                <form action="" method="POST" role="form">
		         <div class="form-group">
		          <label for="">Nama :</label>
		          <input type="text" name="nama" class="form-control" id="" placeholder="Input field" required="">
		          <input type="hidden" name="time_date" value="<?php echo $tgl; ?>" readonly="readonly">
		         </div>
		         <div class="form-group">
		          <label for="">Alamat :</label>
		          <input type="text-area" name="alamat" class="form-control" id="" placeholder="Input field" required="">
		         </div>
		         <div class="form-group">
		          <label for="">Gaji :</label>
		          <input type="text" name="gaji" class="form-control" id="" placeholder="Input field" required="">
		         </div>
		         <div class="form-group">
		          <label for="">Pilih Region :</label>
		          <select id="" class="form-control" name="region">
		          	<?php
		          		$conn = new mysqli("localhost", "root", "", "mysql");
						if ($con->connect_errno) {
							echo "Failed to connect to MySQL: " . $con->connect_error;
						}
						
						$no = 1;
						$res = $con->query("SELECT * FROM regions");
						while($row = $res->fetch_assoc()){
						echo'
		          		<option value="'.$row['id_regions'].'">'.$row['name_regions'].'
		          		</option>
		          		';
		          		$no++;
		          	}?>
		          </select>
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
 $name_person = $_POST['nama'];
 $region_id = $_POST['region'];
 $address = $_POST['alamat'];
 $income = $_POST['gaji'];
 $created_at = $_POST['time_date'];

 $query= mysqli_query($con,"insert into person values ('','$name_person','$region_id','$address','$income','$created_at')") or die(mysqli_error($con));
  echo "<script> alert ('Data Behasil Ditambahkan');
  document.location='index.php?page=person';

  </script>";
 
}

elseif (isset($_POST['update'])) {
 $id_person= $_POST['id'];
 $name_person= $_POST['nama'];
 $region_id = $_POST['region'];
 $address = $_POST['alamat'];
 $income = $_POST['gaji'];
 $created_at = $_POST['time_date'];


 $query= mysqli_query($con,"update person set id_person='$id_person',name_person='$name_person',region_id='$region_id',address='$address',income='$income',created_at='$created_at' where id_person='$id_person' ") or die(mysqli_error($con));
  echo "<script> alert ('Data Behasil Diubah');
  document.location='index.php?page=person';

  </script>";
 
}
elseif (isset($_POST['hapus'])) {
 $id_person= $_POST['hapus'];
 

 $query= mysqli_query($con,"delete from person where id_person='$id_person' ") or die(mysqli_error($con));
  echo "<script>
  document.location='index.php?page=person';

  </script>";
 
}

?>