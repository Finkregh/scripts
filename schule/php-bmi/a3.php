<?php

include ('include.inc.php');

/*
* 
* Aufgabe drei
* 
*/ 
htmlheader();

$koerpergroesse = (int) $_POST["groesse"];
$frau = (boolean) $_POST["frau"];

if ($koerpergroesse > 101 && $koerpergroesse < 300) 
{
        $normalgewicht = $koerpergroesse - 100;
        $idealgewichtmann = $normalgewicht - 10 / 100 * $normalgewicht;
        $idealgewichtfrau = $normalgewicht - 15 / 100 * $normalgewicht;

        echo '<h1>Aufgabe 3, Idealgewicht via Formular, mit Geschlechtswahl, ausgelagert</h1>
        <p>Normalgewicht: <em>' . $normalgewicht . 'kg</em></p>';
        if ($frau = true)
        {
                echo '        <p>Idealgewicht f&uuml;r eine <em>' . $koerpergroesse . 'cm</em> gro&szlig;e Frau: <em>' . $idealgewichtfrau . 'kg</em></p>';
        }
        else
        {
                echo '        <p>Idealgewicht f&uuml;r einen <em>' . $koerpergroesse . 'cm</em> gro&szlig;en Mann: <em>' . $idealgewichtmann . 'kg</em><br />';
        }
}
else
{
        //echo $_POST["groesse"];
        exit ("<p><strong>Bitte die K&ouml;rpergr&ouml;&szlig;e sinvoll (zwischen 102cm und 300cm) angeben!</strong><!-- sonst funktioniert unsere schwachsinnige Formel nicht --></p>");
}

htmlfooter();

?>
