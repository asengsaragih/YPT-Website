<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location: login.php");
}

define("EMAIL_SESSION", $_SESSION['email']);

require "assets/controller/connection.php";
require "assets/controller/function.php";
require "vendor/fpdf/fpdf.php";

//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial', 'B', 16);
//$pdf->Cell(40, 10, 'Hello World!');
//$pdf->Output();

echo getCampusName(getIdCampus(getId()));

function getId() {
    if (isset($_GET['id'])) {
        return $_GET['id'];
    }
}

function getMonth() {
    if (isset($_GET['month'])) {
        return $_GET['month'];
    }
}

function getIdCampus(int $id) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT id_kampus FROM pmb WHERE id_pmb = '$id'");
    $row = mysqli_fetch_assoc($qry);
    return $row['id_kampus'];
}

function getCampusName(int $campus) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT nama_kampus FROM kampus WHERE id_kampus = '$campus'");
    $row = mysqli_fetch_assoc($qry);
    return $row['nama_kampus'];
}

?>