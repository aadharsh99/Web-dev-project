<?php

require_once 'Ticket.php'; // Include the Ticket class to be tested

use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    public function testTicketCreation()
    {
        $description = "iPhone screen repair";
        $dueDate = '2024-04-30';

        $ticket = new Ticket($description, $dueDate);

        // Test Ticket ID generation
        $this->assertRegExp( $ticket->getTicketId());

        // Test Ticket Description
        $this->assertEquals($description, $ticket->getDescription());

        // Test Ticket Creation Date (should match today's date)
        $this->assertEquals(date('Y-m-d'), $ticket->getCreationDate());

        // Test Ticket Due Date
        $this->assertEquals($dueDate, $ticket->getDueDate());
    }
}
