<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 05/06/18
 * Time: 17:27
 */

namespace Times;

use DateInterval;
use DatePeriod;
use DateTime;

class TimeTravel extends \DateTime
{

    private $start;

    private $end;

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param mixed $start
     */
    public function setStart($start): void
    {
        $this->start = $start;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end): void
    {
        $this->end = $end;
    }


    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function getTravelInfo()
    {

        $diff = $this->getStart()->diff($this->getEnd());
        $res = $diff->format('Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates');

        return $res;

    }

    public function findDate($interval)
    {

        $start = $this->getStart();
        $start->sub(new DateInterval($interval));
        $res = $start->format('d-m-Y');

        return $res;

    }

    public function backToFutureStepByStep($step)
    {

      $interval = new DateInterval($step);
      $period   = new DatePeriod($this->getStart(), $interval, new DateTime('31 Dec 1985'));
      $res[]='';

    foreach ($period as $dt) {

         $res[] = $dt->format('M d Y H:i');

    }

    return $res;

    }

}