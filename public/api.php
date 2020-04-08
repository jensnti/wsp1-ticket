<?php

$msg = [
    "birthdate" => "2000-01-01",
    "price" => 1800
];
header('Content-type: application/json');
echo json_encode($msg);

?>