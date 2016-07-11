<?php
namespace Feiertage\Test;

use Cake\Collection;
use Feiertage\Holidays;

class HolidaysTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function testFixedHolidaysAreCorrectlySet()
    {
          $holidays = new Holidays(new \DateTime('2017-01-01'));
          $fixedHolidays = $holidays->setFixedHolidays()->getFixedHolidays();
          $this->assertCount(10, $fixedHolidays, 'The wwrong number of fixed holidays is returned.');
    }

    public function testFlexibleHolidaysAreCorrectlySet()
    {
        $holidays = new Holidays();
        $flexibleHolidays = $holidays->setFlexibleHolidays()->getFlexibleHolidays();
        $this->assertCount(6, $flexibleHolidays, 'The wrong number of flexible holidays is returned.');
    }
}
