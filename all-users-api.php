<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('includes/connection.php');

if ($conn) {
    $query = "SELECT * FROM users";

    $result = mysqli_query($conn, $query);
    $response = array();
    if ($result) {
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['id'];
            $response[$i]['username'] = $row['username'];
            $response[$i]['email'] = $row['email'];
            $i++;
        }

        echo json_encode($response,JSON_PRETTY_PRINT);
    }

}
?>