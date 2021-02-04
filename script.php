<?php
    $dbserver = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "member_db";
    
    $connect = mysqli_connect($dbserver, $dbusername, $dbpassword, $dbname) or die("Connection error".mysqli_connect_error());


    $username = $_POST['username'];

    $query = "SELECT * FROM member WHERE username = '" .$username. "'";
    //echo "<p> SELECT * FROM member WHERE username = '".$username."'</p> ";
    $result = mysqli_query($connect, $query) or die( mysqli_error($connect));

    while($row = mysqli_fetch_array($result)){
        echo $row['id'];
        echo $row['name'];
        echo $row['username'];
        echo $row['password'];
    }

?>