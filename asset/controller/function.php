<?php
    require "connection.php";

    function checkUser(String $email) {
        $conn = conn();
        $sql = "SELECT * FROM user WHERE email_user = '$email'";
        $qry = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($qry);

        if ($check > 0) {
            // return "true";
            echo "ada";
        } else {
            // return "false";
            echo "KOSONG";
        }
    }

    checkUser("hai");

    function test() {
        echo "Hello World";
    }
?>