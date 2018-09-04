<?php
namespace dev_task\Repositories;

use \dev_task\Db;
use \dev_task\Models\Ticket;

class TicketsRepository
{

    private $db;


    private static $inst = null;

    private function __construct(\dev_task\Db $db)
    {
        $this->db = $db;
    }

   
    public static function create()
    {
        if (self::$inst == null)
        {
            self::$inst = new self(Db::getInstance());
        }
        return self::$inst;
    }

    public function getAll()
    {
        $query = "SELECT id, type, buyer, email, date_visit, time_visit, date_bought FROM tickets;";
        $this->db->query($query);
        $result = $this->db->fetchAll();
        $collection = [];
        foreach ($result as $row)
        {

            $collection[] = new Ticket(
                $row['type'],
                $row['buyer'],
                $row['email'],
                $row['date_visit'],
                $row['time_visit'],
                $row['date_bought'],
                $row['id']
            );
        }
        return $collection;
    }

    public function searchByIdEmailDate($query)
    {

        $this->db->query($query);
        $result = $this->db->fetchAll();
        $collection = [];
        foreach ($result as $row)
        {

            $collection[] = new Ticket(
                $row['type'],
                $row['buyer'],
                $row['email'],
                $row['date_visit'],
                $row['time_visit'],
                $row['date_bought'],
                $row['id']
            );
        }
        return $collection;
    }

    public function saveTicket(Ticket $ticket) 
    {
        $query = "
        INSERT INTO tickets (type, buyer, email, date_visit, time_visit, date_bought) VALUES (?, ?, ?, ?, ?, ?) ";

        
        $params = [       
            $ticket->getType(),
            $ticket->getBuyer(),
            $ticket->getEmail(),
            $ticket->getDateVisit(),
            $ticket->getTimeVisit(),
            $ticket->getDateBought()
        ];

        $this->db->query($query, $params);
        return $this->db->rows() > 0;
    }

}