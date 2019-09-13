<?php

require_once 'connect.php';


if ($_SERVER['REQUEST_METHOD'] =='POST') {

    $email = $_POST['email'];

    $sql = "SELECT DISTINCT routes.id, routes.name, region, description, length, difficulty, longitude, latitude, endlongitude, endlatitude, picture FROM routes join history_routes on routes.name=history_routes.name where history_routes.email='$email'";

    $result = mysqli_query($conn, $sql);

    $dbdata = array();

    while ($row = $result->fetch_assoc()) {
        $dbdata[] = $row;
    }

    $obj = (object)[

        'routes' => $dbdata

    ];

    echo json_encode($obj, JSON_UNESCAPED_SLASHES);
}
?>


