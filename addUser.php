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
                        <h6>Insert Role : </h6>
                        <select name="role" class="custom-select custom-select-sm form-control form-control-sm" required>
                            <?php showRole(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="singUp" class="form-control form-control-user" value="Add User">
                    </div>
                  </form>
            </div>
          </div>
<?php
    include ("main/footer.php");
    if (isset($_POST['singUp'])) {

        $conn = conn();

        $email = $_POST['email'];
        $id_role = $_POST['role'];
        $password = md5($_POST['password']);
        $rePassword = md5($_POST['rePassword']);

        if ($password != $rePassword) {
            toastMessage("password 1 dan 2 harus sama");
            return;
        }

        $sql = "SELECT * FROM user WHERE email_user = '$email'";
        $qry_check = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($qry_check);

        if ($check > 0) {
            toastMessage("User Sudah Ada");
            return;
        }


        $qry = mysqli_query($conn, "INSERT INTO user (email_user, password_user, id_role) VALUES ('$email', '$password', '$id_role')");
        if ($qry) {
            toastMessage("Berhasil Membuat User");
        }

    }

    function showRole() {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT * FROM role");
        while ($key = mysqli_fetch_array($qry)) {
            ?>
            <option value="<?php echo $key['id_role']; ?>"><?php echo $key['nama_role']; ?></option>
            <?php
        }
    }

//    function insertUser(String $email, String $password, int $role) {
//        $conn = conn();
//        $sql = "SELECT * FROM user WHERE email_user = '$email'";
//        $qry = mysqli_query($conn, $sql);
//        $check = mysqli_num_rows($qry);

//        if ($check > 0) {
//            toastMessage("User Sudah Ada");
//            return;
//        }
//
//        $qryInsert = mysqli_query($conn, "INSERT INTO user (id_user, email_user, password_user, id_role) VALUES ('', '$email', '$password', '$role')");
//        if ($qryInsert) {
//            toastMessage("User Berhasil Ditambahkan");
//        } else {
//            toastMessage("Gagal Membuat User");
//            return;
//        }
//    }
?>