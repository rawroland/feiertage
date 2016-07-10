<?php
namespace Feiertage;


class Holiday
{

    private $name;

    private $date;

    private $states;

    public function __construct($name, \DateTime $date, array $states = [])
    {
        $this->name = $name;
        $this->date = $date;
        $this->states = $states;
    }

}