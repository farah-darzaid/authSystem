<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('includes/connection.php');

if ($conn) {

    $user_id = $_GET['user_id'];
    $query = "SELECT t1.*, t2.id FROM user_information t1 INNER JOIN users t2
              ON t1.user_id = t2.id WHERE t1.user_id='$user_id'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row,JSON_PRETTY_PRINT);

}
?>