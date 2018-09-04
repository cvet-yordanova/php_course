<?php

namespace dev_task\Models;

use dev_task\Repositories\TicketsRepository;

class Ticket {

    private $id;

    private $type;

    private $buyer;

    private $email;

    private $dateVisit;

    private $timeVisit;

    private $dateBought;


    public function __construct( 
                        $type,
                        $buyer,
                        $email,
                        $dateVisit,
                        $timeVisit,
                        $dateBought,
                        $id = null
                        )
    {
        $this->setId($id);
        $this->setType($type);
        $this->setBuyer($buyer);
        $this->setEmail($email);
        $this->setDateVisit($dateVisit);
        $this->setTimeVisit($timeVisit);
        $this->setDateBought($dateBought);
    }

    public function save()
    {
        return TicketsRepository::create()->saveTicket($this);
    }

    public static function all()
    {
        return TicketsRepository::create()->getAll();
    } 

    public function search($query)
    {
        return TicketsRepository::create()->searchByIdEmailDate($query);
    }

    public function getId()
    {
        return $this->id;
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getType()
    {
        return $this->type;
    }

    private function setType($type)
    {
        $this->type = $type;
    }

    public function getBuyer()
    {
        return $this->buyer;
    }

    private function setBuyer($buyer)
    {
        $this->buyer = $buyer;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function setEmail($email)
    {
        $this->email = $email;
    }

    public function getDateVisit()
    {
        return $this->dateVisit;
    }

    private function setDateVisit($dateVisit)
    {
        $this->dateVisit = $dateVisit;
    }

    public function getTimeVisit()
    {
        return $this->timeVisit;
    }

    private function setTimeVisit($timeVisit)
    {
        $this->timeVisit = $timeVisit;
    }

    public function getDateBought()
    {
        return $this->dateBought;
    }

    private function setDateBought($dateBought)
    {
        $this->dateBought = $dateBought;
    }
   
}