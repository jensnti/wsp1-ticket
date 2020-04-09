<?php

include_once '../src/Ticket.php';

if(isset($_POST)) {
    // vad behöver vår server veta för att skapa en Ticket?

    $birthdate = filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    // quantity birthdate
    $ticket = new Ticket();
    $ticket->setBirthDate($birthdate);
    $ticket->calculateAge();
    $ticket->calculatePrice();

    $price = $ticket->getPrice();
    $total = 0; // hur räknar jag ut total priset?

    $msg = [
        'age' => $ticket->getAge(),
        'price' => $price,
        'total' => $total
    ];
    header('Content-type: application/json');
    echo json_encode($msg);
}

if (isset($_GET['hello'])) {
    $msg = ['text' => 'Hello world!'];
    header('Content-type: application/json');
    echo json_encode($msg);
}

?>