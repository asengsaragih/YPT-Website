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
                      <th>E-mail</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php showDataUser(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


<?php
	include ("main/footer.php");
	function showDataUser() {
	    $conn = conn();
	    $qry = mysqli_query($conn, "SELECT * FROM user");
	    $i = 1;
        while ($key = mysqli_fetch_array($qry)) {
            ?>
            <tr>
                <td> <?php echo $i++; ?></td>
                <input type="hidden" name="email" value="<?php echo $key['email_user']; ?>">
                <td><?php echo $key['email_user']?></td>
                <td><?php echo roleTitle($key['id_role'])?></td>
                <td>
                    <form method="POST">
                        <input name="id_user" type="hidden" value="<?php echo $key['id_user']; ?>">
                        <i class="fas fa-trash">
                            <input onclick="validateDelete()" type="submit" name="deleteUser" style="padding: 10px;" class="btn btn-danger btn-icon-split" value="Delete User">
                        </i>
                    </form>
                </td>
            </tr>
            <?php
        }
    }

    function deleteUser(int $id_user) {
	    $conn = conn();
	    $qry = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
	    if (!$qry) {
	        echo "<script>alert('gagal menghapus user')</script>";
        }
    }
?>

<script>
    function validateDelete() {
        var r = confirm("Hapus User?");
        if (r == true) {
            <?php
                if (isset($_POST['deleteUser'])) {
                    $id_user = $_POST['id_user'];
                    deleteUser($id_user);
                }
            ?>
        }
    }
</script>
