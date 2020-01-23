<?php
    function conn() {
        $db_host = "localhost";
        $db_username = "root";
        $db_password = "";
        $db_name = "ypt";
        static $conn;

        if ($conn == NULL){ 
            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
        }

        return $conn;
    }
    /*
        Cara Pemanggilan conn()
        
        $conn = conn();

        function someFunction () {
            $conn = db();
            $result = mysqli_query ($conn, "SELECT * FROM examples);
        }

    */
?>