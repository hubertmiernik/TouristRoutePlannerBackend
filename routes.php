<?php

require_once 'connect.php';

$sql = "SELECT * FROM routes order by name";

$result = mysqli_query($conn, $sql);


$dbdata = array();

while ( $row = $result->fetch_assoc())  {
    $dbdata[]=$row;
}

$obj = (object) [

    'routes' => $dbdata
];


echo json_encode($obj, JSON_UNESCAPED_SLASHES);

?>