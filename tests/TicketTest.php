<?php

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase {

    /** @test **/
    public function itShouldReturnAge() {
        // skapa en ny instans av Ticket
        $ticket = new Ticket();
        // använd get metoden getAge för att hämta åldern
        $age = $ticket->getAge();

        // kontrollera att $age har rätt värde
        $this->assertEquals(
            0,
            $age
        );
    }
}