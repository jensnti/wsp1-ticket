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

    private $adultLimit;

    public function __construct (
        $age = 0, 
        $type = 1, 
        $adultLimit = 18
    ) {
        $this->age = (int) $age;
        $this->type = $type;
        $this->adultLimit = $adultLimit;
    }

    public function getAge():int {
        return $this->age;
    }

    public function setAge($age):void {
        $this->age = (int) $age;
    }

    public function getPrice():float {
        return $this->price;
    }

    public function setType($type):void {
        if (gettype($type) === "string") {

        } else {

        }
    }
    public function getType():string {}

    public function calculatePrice():void {
        // if sats, kontrollera ålder $this->age
        // sätt $this->price med korrekt pris för barn/vuxen
        // 1800 eller 2200
        $this->price = 2200.00;

        // priset behöver påverkas av biljettyp

    }
}

// $ticket = new Ticket(0);
// $ticket->setAge(43);
// $price =  $ticket->calculatePrice();
// echo $price;
// var_dump($ticket);