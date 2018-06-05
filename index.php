<?php

use Times\TimeTravel;

require 'TimeTravel.php';

$timezone = new DateTimeZone('Europe/Paris');
$start = new DateTime('31 Dec 1985',$timezone);
$end = new DateTime('now',$timezone);
$interval = "PT1000000000S";
$step = "P1M1WT24H";

$timeTravel = new TimeTravel($start,$end);

echo 'Reponse 1 : '.$timeTravel->getTravelInfo().'<br><br>';

echo 'Reponse 2 : Pour retrouver le Doc, Marty doit aller 1 Milliard de secondes dans le passé soit le '.$timeTravel->findDate($interval).'<br><br>';

echo 'Reponse 3 : Marty doit s\'arreter faire le plein à ces dates :<br>';

$stops = $timeTravel->backToFutureStepByStep($step);

foreach ($stops as $stop) {

    echo $stop.'<br>';

}











