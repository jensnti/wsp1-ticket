<?php

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase {

    /** @test **/
    public function itShouldReturnAge() {
        $ticket = new Ticket();
        $ticket->setBirthDate('2000-01-01');
        $ticket->calculateAge();
        $age = $ticket->getAge();
        $this->assertEquals(
            0,
            $age
        );
    }

    /** @test **/
    // public function itCanChangeAge() {
    public function it_can_change_age() {
        // ny instans
        $ticket = new Ticket();
        // åldern vi kommer att använda för att kolla
        $age = 42;
        // sätt åldern i Ticket med setAge
        $ticket->setAge($age);
        // kontrollera att getAge returnerar den valda åldern
        $this->assertEquals(
            $age,
            $ticket->getAge()
        );
    }

    /** @test **/
    public function itShouldReturnTheCorrectPriceForChildren() {
        // instans & sätta åldern
        $ticket = new Ticket(15);
        // räkna ut och hämta priset
        $ticket->calculatePrice();
        // hämta och kontrollera pris
        $this->assertEquals(
            1800,
            $ticket->getPrice()
        );
    }

    /** @test **/
    public function itShouldReturnTheCorrectPriceForAdults() {
        $ticket = new Ticket(40);
        $ticket->calculatePrice();
        $this->assertEquals(
            2200,
            $ticket->getPrice()
        );
    }

    /** @test **/
    public function itShouldReturnAType() {
    
    }

    /** @test **/
    public function itCanSetTypeFromInt() {

    }

    /** @test **/
    public function itCanSetTypeFromString() {
    
    }

    /** @test **/
    public function itCanReturnABirthDateObject() {
        // skapa en ny instans av Ticket
        $ticket = new Ticket();
        // använd get metoden getAge för att hämta åldern
        $ticket->setBirthDate('2000-01-01');

        $birthDate = $ticket->getBirthDate();
        // kontrollera att $age har rätt värde
        $this->assertIsObject($birthDate);
    }

    /** @test **/
    public function itCanSetAgeFromBirthDate() {
        $ticket = new Ticket();

        $ticket->setBirthDate('2000-01-01');
        $ticket->calculateAge();

        $age = $ticket->getAge();
        $this->assertEquals(
            20,
            $age
        );
    }
}