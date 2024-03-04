<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $uid=$_POST["UID"];
    $fuelamt=100;
    $fueltype="Petrol";
    $response = array(
        "uid" => $uid,
        "fuelamt" => $fuelamt,
        "fueltype" => $fueltype
        );

// Convert the array to JSON
header('Content-Type: application/json');
echo json_encode($response);
}

?>
