<?php

namespace Alkauni\DistanceCoordinateCalculator;

class DistanceCalculator
{
    /**
     * Calculate the distance between two points using the Haversine formula.
     *
     * @param float $lat1 Latitude of the first point.
     * @param float $lon1 Longitude of the first point.
     * @param float $lat2 Latitude of the second point.
     * @param float $lon2 Longitude of the second point.
     * @param string $unit Unit of measurement (KM for kilometers, Miles for miles, N for nautical miles, M for meters).
     * @return float Distance between the two points.
     */
    public static function calculate(float $lat1, float $lon1, float $lat2, float $lon2, string $unit = 'KM'): float
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        switch (strtoupper($unit)) {
            case 'KM':
                return $miles * 1.609344;
            case 'N':
                return $miles * 0.8684;
            case 'M':
                return $miles * 1.609344 * 1000;
            case 'Miles':
                return $miles;
            default:
                return $miles;
        }
    }
}
