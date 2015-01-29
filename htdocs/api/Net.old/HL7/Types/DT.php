<?php

class Net_HL7_Types_DT
{

    private $ts;
    private $year, $month, $day;

    public function __construct()
    {
        $this->ts = strftime("%Y%m%d");

    }

    public function setDateTime($year, $month, $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;

        $this->updateDate();


    }

    private function updateDate()
    {
        $unixTime = mktime(null, null, null, $this->month, $this->day, $this->year);
        $this->ts = strftime("%Y%m%d", $unixTime);

    }

    /**
     * @return String
     **/
    function toTsString()
    {
        return $this->ts;
    }

}