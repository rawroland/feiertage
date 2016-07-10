<?php
namespace Feiertage;


use Cake\Collection\Collection;

class Holidays
{
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $year;

    /**
    * @var Cake\Collection\Collection
    */
    private $fixedHolidays;

    /**
     * @var array
     */
    private $fixedHolidaysConfig = [
        'new_year' => [
            'name' => 'Neujahr',
            'date' => '01-01',
            'states' => []
        ],
        'three_kings' => [
            'name' => 'Heilige Drei Könige (Epiphanias), Erscheinungsfest',
            'date' => '06-01',
            'states' => []
        ],
        'labor_day' => [
            'name' => 'Erster Mai, Tag der Arbeit	',
            'date' => '05-01',
            'states' => []
        ],
        'augsburg_hohes_frieden' => [
            'name' => 'Augsburger Hohes Friedensfest',
            'date' => '08-08',
            'states' => ['BY_Augsburg']
        ],
        'assumption' => [
            'name' => 'Mariä Himmelfahrt(stag)',
            'date' => '08-15',
            'states' => ['BY_Katholisch', '']
        ],
        'unity_day' => [
            'name' => 'Tag der Deutschen Einheit',
            'date' => '10-03',
            'states' => ['BY_Katholisch', 'SL']
        ],
        'reformation_day' => [
            'name' => 'Neujahr',
            'date' => '10-31',
            //TODO: Check special rules for reformation day.
            'states' => ['BB', 'MV', 'SN', 'ST']
        ],
        'all_saints' => [
            'name' => 'Allerheiligen(tag)',
            'date' => '11-01',
            'states' => ['BW', 'BY', 'NW', 'RP', 'SL']
        ],
        'first_christmas' => [
            'name' => 'Erster Weihnachts(feier)tag',
            'date' => '12-25',
            'states' => []
        ],
        'second_christmas' => [
            'name' => 'Zweiter Weihnachts(feier)tag	',
            'date' => '12-26',
            'states' => []
        ],
    ];

    public function __construct(\DateTime $date = null)
    {
        if(!$date) {
            $date = new \DateTime();
        }
        $this->date = $date;
        $this->year = $date->format('Y');
    }

    public function setFixedHolidays()
    {
        $fixedHolidays = new Collection($this->fixedHolidaysConfig);
        $this->fixedHolidays = $fixedHolidays->map(function ($holiday) {
            return new Holiday(
                $holiday['name'],
                \DateTime::createFromFormat('Y-m-d', "{$this->year}-{$holiday['date']}"),
                $holiday['states']
            );
        });

        return $this;
    }

    public function getFixedHolidays()
    {
        return $this->fixedHolidays;
    }

}
