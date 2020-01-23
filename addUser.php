<?php
    include ("main/side.php");
    include_once ("asset/controller/connection.php");
?>
 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add User</h1><br />

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Add New User</h6>
            </div>
            <div class="card-body">
                <form class="user" methode="POST">
                    <div class="form-group">
                        <h6>Insert E-mail : </h6>
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <h6>Insert Password : </h6>
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <h6>Re-type Password : </h6>
                        <input type="password" name="rePassword" class="form-control form-control-user" id="exampleInputPassword" placeholder="Re-type Password">
                    </div>
                    <div class="form-group">
                        <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="login" class="form-control form-control-user" value="Add User">
                    </div>
                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Daftar
                    </a> -->
                  </form>
            </div>
          </div>
<?php
    include ("main/footer.php");
    
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];

        
    }
?>