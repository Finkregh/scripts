<?php

include ('include.inc.php');

/*
* 
* Aufgabe eins
* 
*/ 

/* broca-formel */
$koerpergroesse = 180;
$normalgewicht = $koerpergroesse - 100;
$idealgewichtmann = $normalgewicht - 10 / 100 * $normalgewicht;

htmlheader();
echo '<h1>Aufgabe 1, Idealgewicht Mann</h1>
<p>Ergebnisse der Broca-formel fuer einen 180cm grossen mann</p>';
echo '<p>Normalgewicht: ' . $normalgewicht . 'kg<br />';
echo 'Idealgewicht: ' . $idealgewichtmann . 'kg</p>';
htmlfooter();

?>
