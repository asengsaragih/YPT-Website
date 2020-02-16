<?php
    include ("main/side.php");
    $conn = conn();
?>
<h1 class="h3 mb-2 text-gray-800">Edit PMB</h1><br />

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Edit PMB</h6>
  </div>
  <div class="card-body">
      <form class="user" method="POST">
          <?php getNilaiPMBTargetRealisasi(); ?>
      </form>
  </div>
</div>

<?php
  include ("main/footer.php");
?>