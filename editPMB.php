<?php
    include ("main/side.php");
    require "asset/controller/connection.php";
    require "asset/controller/function.php";
    $conn = conn();
?>
<h1 class="h3 mb-2 text-gray-800">Edit PMB</h1><br />

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Edit PMB - Telkom Realisasi 2019</h6>
  </div>
  <div class="card-body">
      <form class="user" method="POST">
          <?php getNilaiPMBTargetRealisasi(); ?>
          <div class="form-group">
              <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="login" class="form-control form-control-user" value="Update Data">
          </div>
        </form>
  </div>
</div>

<?php
    include ("main/footer.php"); 
?>