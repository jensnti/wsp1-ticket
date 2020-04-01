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

    public function getPrice():float {}
    public function setType($type):void {
        if (gettype($type) === "string") {

        } else {
            
        }
    }
    public function getType():string {}

    public function calculatePrice():float {
        // if sats, kontrollera ålder
        // returnera korrekt pris för barn/vuxen
        // priset behöver påverkas av biljettyp
        return 1800.00;
    }
}

$ticket = new Ticket(0);
$ticket->setAge(43);
$price =  $ticket->calculatePrice();
echo $price;
var_dump($ticket);