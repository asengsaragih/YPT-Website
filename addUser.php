<?php
    include ("main/side.php");
    require "asset/controller/connection.php";
    require "asset/controller/function.php";
?>
 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add User</h1><br />

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Add New User</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST">
                    <div class="form-group">
                        <h6>Insert E-mail : </h6>
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email Address" required>
                    </div>
                    <div class="form-group">
                        <h6>Insert Password : </h6>
                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <h6>Re-type Password : </h6>
                        <input type="password" name="rePassword" class="form-control form-control-user" id="exampleInputPassword" placeholder="Re-type Password" required>
                    </div>
                    <div class="form-group">
                        <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="login" class="form-control form-control-user" value="Add User">
                    </div>
                  </form>
            </div>
          </div>
<?php
    include ("main/footer.php");
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $rePassword = md5($_POST['rePassword']);

        if ($password == $rePassword) {
            toastMessage("password harus beda");
        }
    }

    function checkUser(String $email) {
        $conn = conn();
        $sql = "SELECT * FROM user WHERE email_user = '$email'";
        $qry = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($qry);

        if ($check > 0) {
            return "true";
        } else {
            return "false";
        }
    }              
?>