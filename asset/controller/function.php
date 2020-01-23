<?php
    // require "connection.php";
    include_once "connection.php";

    // function checkUser(String $email) {
    //     $conn = conn();
    //     $sql = "SELECT * FROM user WHERE email_user = '$email'";
    //     $qry = mysqli_query($conn, $sql);
    //     $check = mysqli_num_rows($qry);

    //     if ($check > 0) {
    //         return "true";
    //     } else {
    //         return "false";
    //     }
    // }

    // checkUser("hai");

    function test() {
        echo "Hello World";
    }

    function toastMessage(String $message) {
        echo "<script>alert('$message');</script>";
    }

    function toastMessageIntent(String $context, String $message) {
        echo "<script>alert('$message'); window.location.href='$context';</script>";
    }
?>