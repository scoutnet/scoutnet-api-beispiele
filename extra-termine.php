<?php
// Dieses Beispiel zeigt, wie man zusätzlich zu den Stammesterminen noch einzelne zusätzliche anzeigt

date_default_timezone_set("Europe/Berlin");

require_once "scoutnet-api-client-php/src/scoutnet.php";          // 1. ScoutNet client einbinden

// ids zusätzlicher Termine
$event_ids = array(500,502,503);

// query bauen
$query = "start_date > ? and (group_id = 2032 or id IN ?)";
$parameters = array( date("Y-m-d"), $event_ids );

// events in einer einzelnen Anfrage abfragen (weil schneller als mehrere)
$events = scoutnet()->events( $query, $parameters ); // 2. Termin abfragen

// Termine anzeigen
foreach($events as $event){
  echo $event->title . "<br />\n";
}
