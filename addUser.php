<?php
	include ("main/side.php");
?>
 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add User</h1><br />

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Add New User</h6>
            </div>
            <div class="card-body">
                <form class="user">
                    <div class="form-group">
                        <h6>Insert E-mail : </h6>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <h6>Insert Password : </h6>
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <h6>Re-type Password : </h6>
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Re-type Password">
                    </div>
                    <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </a>
                  </form>
            </div>
          </div>

<?php
	include ("main/footer.php");
?>