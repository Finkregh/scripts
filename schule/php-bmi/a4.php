<?php

include ('include.inc.php');

/*
* 
* Aufgabe vier
* TODO: isset
* 
*/ 
htmlheader();


echo '<h1>Aufgabe 4, Eingabeformular</h1>
		<p>
				<form action="a4.php" method="post">
				K&ouml;rpergr&ouml;&szlig;e: <input type="text" name="groesse" />cm<br />
				Geschlecht: <ol>
						<li>m&auml;nnlich: <input type="radio" name="frau" value="false" /></li>
						<li>weiblich: <input type="radio" name="frau" value="true" /></li></ol>
				<input type="submit"/></form>
		</p>';

$koerpergroesse = (int) $_POST["groesse"]; // cast to integer, we only want numbers!
$frau = (boolean) $_POST["frau"];

if ($koerpergroesse > 101 && $koerpergroesse < 300) 
{
        $normalgewicht = $koerpergroesse - 100;
        $idealgewichtmann = $normalgewicht - 10 / 100 * $normalgewicht;
        $idealgewichtfrau = $normalgewicht - 15 / 100 * $normalgewicht;

        echo '<h2>Ausgabe</h2>
        <p>Normalgewicht: <em>' . $normalgewicht . 'kg</em></p>';
        if ($frau = true)
        {
                echo '<p>Idealgewicht f&uuml;r eine <em>' . $koerpergroesse . 'cm</em> gro&szlig;e Frau: <em>' . $idealgewichtfrau . 'kg</em></p>';
        }
        else
        {
                echo '<p>Idealgewicht f&uuml;r einen <em>' . $koerpergroesse . 'cm</em> gro&szlig;en Mann: <em>' . $idealgewichtmann . 'kg</em><br />';
        }
}
else
{
        exit ("<p><strong>Bitte die K&ouml;rpergr&ouml;&szlig;e sinvoll (zwischen 102cm und 300cm) angeben!</strong><!-- sonst funktioniert unsere schwachsinnige Formel nicht --></p>");
}

htmlfooter();

?>
