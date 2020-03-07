<?php
include ("main/side.php");
$conn = conn();
?>
    <h1 class="h3 mb-2 text-gray-800">Mahasiswa <?php getLinkName(); ?></h1><br />

<?php
include ("main/footer.php");

function getLinkName() {
    if (isset($_GET['MHS'])) {
        echo $_GET['MHS'];
    }
}
?>