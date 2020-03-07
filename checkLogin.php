<?php
session_start();
require "assets/controller/connection.php";
require "assets/controller/function.php";
$conn = conn();

if (isset($_POST['login'])) {
    $qry = mysqli_prepare($conn, "SELECT * FROM user WHERE email_user = ? AND password_user = ?");

    mysqli_stmt_bind_param($qry, "ss", $_POST['email'], md5($_POST['password']));
    mysqli_stmt_execute($qry);
    mysqli_stmt_store_result($qry);

    $check = mysqli_stmt_num_rows($qry);

    if ($check > 0) {
        session_start();
        $_SESSION['email'] = $_POST['email'];
        echo "<script>window.location.href='index.php';</script>";
    } else {
        toastMessageIntent("login.php", "Username Atau Password Salah");
    }
} else {
    header("location: login.php");
}
?>