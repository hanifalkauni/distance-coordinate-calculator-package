<?php

use PHPUnit\Framework\TestCase;
use Alkauni\DistanceCoordinateCalculator\DistanceCalculator;

class DistanceCalculatorTest extends TestCase
{

    protected $tolerance = 10; // Allowable deviation in kilometers, miles
    protected $toleranceMeters = 10000; // Allowable deviation in meters

    public function testCalculateDistanceInKilometers()
    {
        $distance = DistanceCalculator::calculate(40.748817, -73.985428, 34.052235, -118.243683);
        $this->assertEqualsWithDelta(3940, round($distance), $this->tolerance);
    }

    public function testCalculateDistanceInMiles()
    {
        $distance = DistanceCalculator::calculate(40.748817, -73.985428, 34.052235, -118.243683, 'Miles');
        $this->assertEqualsWithDelta(2448, round($distance), $this->tolerance);
    }

    public function testCalculateDistanceInMeters()
    {
        $distance = DistanceCalculator::calculate(40.748817, -73.985428, 34.052235, -118.243683, 'M');
        $this->assertEqualsWithDelta(3940000, round($distance), $this->toleranceMeters);
    }
}
