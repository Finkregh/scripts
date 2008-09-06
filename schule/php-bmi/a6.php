<?php
/*
 * Created on 05.09.2008, 09:56:43
 * by win-user: lorenzen_fi07b
 * TODO
 * 
 */
 
  
include ('include.inc.php');

/*
* 
* Aufgabe sechs
* 
*/ 
htmlheader();


echo '                <h1>Aufgabe 6</h1>
                <p>
                        <form action="' . $_SERVER[PHP_SELF] . '" method="post">
                        K&ouml;rpergr&ouml;&szlig;e: <input type="text" name="groesse" />cm<br />
                        Gewicht: <input type="text" name="gewicht" />kg<br />
                        <input type="submit"/></form>
                </p>
';

$groesse = (int) $_POST["groesse"];
$gewicht = (int) $_POST["gewicht"];

if (isset($_POST["groesse"]) && isset($_POST["gewicht"]) && $groesse < 300 && $gewicht < 450) 
{
        $bmi = $gewicht / (($groesse/100) * ($groesse/100));

        echo '
        	<h2>Ausgabe</h2>
                <p><ul><li>BMI: <em>' . round ($bmi, 2) . '</em></li>
                <li>Gewicht: <em>' . $gewicht . 'kg</em></li>
                <li>Gr&ouml;&szlig;e: <em>' . $groesse . 'cm</em></li>';
        switch ($bmi)
        {
        	case  '18.5':
        	{
        		
        		break;
        	}
        	default:
        	{
        		
        	}
        }
        	
        if ($bmi < 18.5)
        {
			echo '                <li>Kategorie: <strong>Untergewicht</strong></li>';
        }
        else if ($bmi > 18.5 && $bmi < 25)
        {
			echo '                <li>Kategorie: <strong>Normalgewicht</strong></li>';
        }
        else if ($bmi > 25 && $bmi < 30)
        {
			echo '                <li>Kategorie: <strong>leichtes &Uuml;bergewicht</strong></li>';
        }
        else if ($bmi > 30 && $bmi < 40)
        {
			echo '                <li>Kategorie: <strong>starkes Übergewicht</strong></li>';
        }
        else
        {
			echo '                <li>Kategorie: <strong>extremes Übergewicht</strong></li>';
        }
        echo '</ul></p>';
}
else
{
        //echo $_POST["groesse"];
        exit ("                <p><strong>Bitte die K&ouml;rpergr&ouml;&szlig;e und das Gewicht sinvoll angeben!</strong></p>");
}

htmlfooter();
 
?>
