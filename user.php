<?php
	include ("main/side.php");
?>

 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User</h1>
          <p class="mb-4">Ini adalah user untuk admin dan user DHE YPT </p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>username</th>
                      <th>group</th>
                      <th>action</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Taufik Rahmat Kurniawan</td>
                      <td>taurahkur</td>
                      <td>superadmin</td>
                      <td>
                      	<a href="#" class="btn btn-warning btn-icon-split">
	                    	<span class="icon text-white-50">
	                      		<i class="fas fa-edit"></i>
	                    	</span>
	                    <span class="text">Edit</span>
                  		</a>
                  		<a href="#" class="btn btn-danger btn-icon-split">
	                    	<span class="icon text-white-50">
	                      		<i class="fas fa-trash"></i>
	                    	</span>
	                    <span class="text">Hapus</span>
                  		</a>
              		  </td>
                      
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Nur Atnan</td>
                      <td>atnan</td>
                      <td>admin</td>
                      <td><a href="#" class="btn btn-warning btn-icon-split">
	                    	<span class="icon text-white-50">
	                      		<i class="fas fa-edit"></i>
	                    	</span>
	                    <span class="text">Edit</span>
                  		</a>
                  		<a href="#" class="btn btn-danger btn-icon-split">
	                    	<span class="icon text-white-50">
	                      		<i class="fas fa-trash"></i>
	                    	</span>
	                    <span class="text">Hapus</span>
                  		</a></td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

<?php
	include ("main/footer.php");
?>