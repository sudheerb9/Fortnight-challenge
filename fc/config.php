<?php
session_start();
        $acessToken = $_POST['acessToken'];
        $picture = $_POST['picture'];
        $id = $_POST['id'];
        
        $servername = "localhost";
        $username = "wissenaire_fortnight";
        $password = "wissenaire21fortnight";
        $dbname = "wissenaire_fortnight21";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sq = "SELECT * FROM `user` WHERE `userid` = '$id'";
        $sql = "INSERT INTO `user`( `userid`, `accesstoken`, `picture`) VALUES ('$id', '$accessToken', '$picture')";
        
        $_SESSION['userid'] = $id;
        
        if (mysqli_query($conn, $sql)) echo "done";
        else if (mysqli_query($conn, $sq)) echo "present";
        else echo "not";
        mysqli_close($conn);
?>