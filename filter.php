<?php

require_once 'connect.php';


if ($_SERVER['REQUEST_METHOD'] =='POST') {

    $region = $_POST['region'];
    $difficulty = $_POST['difficulty'];
    $lengthFrom = $_POST['lengthFrom'];
    $lengthTo = $_POST['lengthTo'];


    $sql = "SELECT * FROM routes WHERE region='$region' AND difficulty='$difficulty' and length between '$lengthFrom' and '$lengthTo' order by length";

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


