<?php
    include "dbConnection.php";
    
    $conn = getDatabaseConnection("final");
    session_start();
    
    
    if ($_POST['op'] == 1) {
        //insert new appointment
        $sql = "INSERT INTO appointments (userId, date, start_time, duration) VALUES (:id, :d, :start, :dur)";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":id" => $_SESSION["userId"],
                             ":d" => $_POST['date'],
                             ":start" => $_POST['start_time'],
                             ":dur" => $_POST['duration']));
                             
        $appId = $conn->lastInsertId();
        
        // echo ($_SESSION['userId']);
    } else if ($_POST['op'] == 2) {
        // get all appointments after current date
        $sql = "SELECT * FROM appointments WHERE userId=:id and date>NOW()";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":id" => $_SESSION["userId"]));
                             
        $records=$stmt->fetchAll();
        
        echo json_encode($records);
    } else if ($_POST['op'] == 3) {
        // remove appointment with specific ID
        $sql = "DELETE FROM appointments WHERE id=:id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(":id" => $_POST["id"]));
    }
?>