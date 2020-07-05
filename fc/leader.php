<?php
    session_start();
    $score = $_POST['score'];
    $userid = $_SESSION['userid'];
    
        $servername = "localhost";
        $username = "wissenaire_fortnight";
        $password = "wissenaire21fortnight";
        $dbname = "wissenaire_fortnight21";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

          $sql = "UPDATE `user` SET `score`='$score' WHERE `userid`='$userid' AND `score`<'$score' ";

        
        if (mysqli_query($conn, $sql)) echo "done";
        else echo "not";
        mysqli_close($conn);
?>   