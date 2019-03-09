        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penduduk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Gaji</th>
                      <th>Daerah</th>
                  </tr>
              </thead>
          
          <tbody>
            <?php
            include '../config.php';
            
            $sql = "SELECT * FROM person LEFT join regions on person.id_person=regions.id_regions";

            $query = mysqli_query($con, $sql);

            if(mysqli_num_rows($query) > 0){
              while($row = mysqli_fetch_array($query)){
            ?>
              <tr>
                <td><?php echo $row['id_person'] ?></td>
                <td><?php echo $row['name_person'] ?></td>
                <td><?php echo number_format($row['income'], 0, ',', '.') ?></td>
                <td><?php echo $row['name_regions'] ?></td>
              </tr>
            <?php     
              }
            }
            ?>
          </tbody>
          <tfoot>
                  <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Gaji</th>
                      <th>Daerah</th>
                  </tr>
              </tfoot>
                </table>
              </div>
            </div>
          </div>