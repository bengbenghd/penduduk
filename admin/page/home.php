        

        <h1 class="h3 mb-0 text-gray-800">Data Daerah</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nama Daerah</th>
                      <th>Jumlah Penduduk</th>
                      <th>Total Pendapatan</th>
                      <th>Rata-rata Pendapatan</th>
                      <th>Status</th>
                  </tr>
              </thead>
          
          <tbody>
            <?php
            include '../config.php';
            
            $sql = "SELECT * FROM regions LEFT join person on person.id_person=regions.id_regions";

            $query = mysqli_query($con, $sql);
            $sql2 = "SELECT region_id,count(*) as Jumlah from person group by region_id";
            $query2 = mysqli_query($con, $sql2);
            if(mysqli_num_rows($query) > 0){
                while($row2 = mysqli_fetch_array($query2)){
              while($row = mysqli_fetch_array($query)){
            ?>
              <tr>
                <td><?php echo $row['id_regions'] ?></td>
                <td><?php echo $row['name_regions'] ?></td>
                <td><?php echo $row2['Jumlah'] ?></td>
                <td><?php echo number_format($row['income'], 0, ',', '.') ?></td>
                <td><?php ?></td>
              </tr>
            <?php     
              } }
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Daerah</th>
                <th>Jumlah Penduduk</th>
                <th>Total Pendapatan</th>
                <th>Rata-rata Pendapatan</th>
                <th>Status</th>
            </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>