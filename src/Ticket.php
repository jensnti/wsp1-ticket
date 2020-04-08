<?php

class Ticket {
    // pris
    private $price; // can only be set through calcPrice
    private $type; // 1dagars, 2dagars, VIP
    private $types= [
        '1 day',
        '2 day',
        'VIP'
    ];
    private $age; // can only be set from bithDate
    private $birthDate;
    private $adultLimit;

    public function __construct ($type = 1, $adultLimit = 18) {
        $this->type = $type;
        $this->adultLimit = $adultLimit;
    }

    public function getAge():int {
        return $this->age;
    }

    public function getPrice():float {
        // returns null if not set
        return $this->price;
    }

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
        try {
            $this->birthDate = new DateTime($birthDate);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBirthDate():object {
        return $this->birthDate;
    }

    public function calculateAge():void {
        $now = new DateTime();
        $interval = $this->birthDate->diff($now);
        $this->age = $interval->format('%Y');
    }
}
