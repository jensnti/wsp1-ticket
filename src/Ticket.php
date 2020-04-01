<?php

class Ticket {
    // pris
    private $price;
    // giltighetstid

    // typ av biljett
    private $type; // 1dagars, 2dagars, VIP
    private $types= [
        '1 day',
        '2 day',
        'VIP'
    ];

    // barn / vuxenbiljett
    private $age;

    public function __construct ($age = 0, $type = 1) {
        $this->age = (int) $age;
        $this->type = $type;
    }

    
}

$ticket = new Ticket(42);
var_dump($ticket);