<?php

namespace App\Helper;

/**
 * Class Conversions
 */
class Conversions {

    /**
     * @param $date
     *
     * @return string
     */
    public static function getPostElapsedTime( $date ) {
        $unixTime = strtotime( $date );

        // convert current time to proper timestamp
        $currentTime   = new \DateTime( 'now', new \DateTimeZone( 'America/Chicago' ) );
        $timeOffset    = $currentTime->getOffset();
        $convertedUnix = $currentTime->format( 'U' ) - abs( $timeOffset );

        $estimatedTime = $convertedUnix - $unixTime;

        if ( $estimatedTime < 1 ) {
            return 'less than 1 second ago';
        }

        $condition = [
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60      => 'month',
            24 * 60 * 60           => 'day',
            60 * 60                => 'hour',
            60                     => 'minute',
            1                      => 'second'
        ];

        foreach ( $condition as $secs => $str ) {
            $d = $estimatedTime / $secs;

            if ( $d >= 1 ) {
                $r = round( $d );

                return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
            }
        }
    }

    /**
     * @param $int
     *
     * @return string
     */
    public static function intToFloat($int) {
        return number_format($int, 2);
    }
}