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

    public function getAge():int {
        return $this->age;
    }

    public function setAge($age):void {
        $this->age = (int) $age;
    }

    public function calculatePrice():float {
        return 1800.00;
    }
}

// $ticket = new Ticket(42);
// var_dump($ticket);