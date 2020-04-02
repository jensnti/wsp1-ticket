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
    private $birthDate;
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
        // returns null if not set
        return $this->price;
    }

    public function setType($type):void {
        if (gettype($type) === "string") {

        } else {

        }
    }
    public function getType():string {}

    public function calculatePrice():void {
        if ($this->age < $this->adultLimit) {
            $this->price = 1800.00;
        } else {
            $this->price = 2200.00;
        }
        // priset behöver påverkas av biljettyp
    }

    /**
     * This method expects a validated DateTime
     */
    public function setBirthDate($birthDate):void {
        // gör saker med birthdate
        // spara som instansvariabel
        try {
            $this->birthDate = new DateTime($birthDate);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function calculateAge():void {
        // räkna ut åldern
        // sätt $this->age
        $this->age = 20;
    }
}

$ticket = new Ticket();
$ticket->setBirthDate('2000-01-01');
var_dump($ticket->getBirthDate());
// $ticket->setAge(43);
// $price =  $ticket->calculatePrice();
// echo $price;
// var_dump($ticket);