<?php

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase {

    /** @test **/
    public function itCanChangeAge() {
        $ticket = new Ticket();
        $ticket->setBirthDate('2000-01-01');
        $ticket->calculateAge();
        $age = $ticket->getAge();
        $ticket->setBirthDate('2010-01-01');
        $ticket->calculateAge();
        $this->assertNotEquals(
            $age,
            $ticket->getAge()
        );
    }

    /** @test **/
    public function itShouldReturnTheCorrectPriceForChildren() {
        $ticket = new Ticket();
        $ticket->setBirthDate('2010-01-01');
        $ticket->calculateAge();
        $ticket->calculatePrice();
        $this->assertEquals(
            1800,
            $ticket->getPrice()
        );
    }

    /** @test **/
    public function itShouldReturnTheCorrectPriceForAdults() {
        $ticket = new Ticket();
        $ticket->setBirthDate('1980-01-01');
        $ticket->calculateAge();
        $ticket->calculatePrice();
        $this->assertEquals(
            2200,
            $ticket->getPrice()
        );
    }

    /** @test **/
    public function itCanSetAgeFromBirthDate() {
        $ticket = new Ticket();
        $ticket->setBirthDate('2000-01-01');
        $ticket->calculateAge();

        $this->assertEquals(
            20,
            $ticket->getAge()
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
}