<?php
namespace Feiertage\Test;

use Cake\Collection;
use Feiertage\Holidays;

class HolidaysTest extends \PHPUnit_Framework_TestCase
{
    public function setUp() {
      parent::setUp();
    }

    public function tearDown() {
      parent::tearDown();
    }

    public function testHolidaysContainsFixedHolidays() {
      $holidays = new Holidays(new \DateTime('2017-01-01'));
      $holidays = $holidays->setFixedHolidays()->getFixedHolidays();
      $this->assertCount(10, $holidays->toArray(), 'The wwrong number of fixed holidays is returned.');
    }
}
