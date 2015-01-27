<?php

class Net_HL7_Types_TS
{

    private $ts;
    private $year, $month, $day, $hour, $minute, $seconds;

    public function __construct()
    {
        $this->ts = strftime("%Y%m%d%H%M%S");

    }

    public function setDateTime($year, $month, $day, $hour = 0, $minute = 0, $seconds = 0)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
        $this->hour = $hour;
        $this->minute = $minute;
        $this->seconds = $seconds;

        $this->updateTs();


    }

    private function updateTs()
    {
        $unixTime = mktime($this->hour, $this->minute, $this->seconds, $this->month, $this->day, $this->year);
        $this->ts = strftime("%Y%m%d%H%M%S", $unixTime);

    }

    /**
     * @return String
     **/
    function toTsString()
    {
        return $this->ts;
    }

}