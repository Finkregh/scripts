<?php
/*
 * Created on 28.10.2008
 * by win-user: lorenzen_fi07b
 * 
 * TODO
 * 
 * 
 */
 
  
include ('include.inc.php');

/*
* 
* Aufgabe sieben
* 
*/ 
htmlheader();

function form() {
	echo '<h1>Aufgabe 7</h1>
			<form action="' . $_SERVER[PHP_SELF] . '" method="post">
				<p>K&ouml;rpergr&ouml;&szlig;e <strong title="Required" class="required">*</strong>: <input type="text" name="groesse" value="'; if (isset($_POST["groesse"])) {echo $_POST["groesse"];} echo '" />cm<br />
				<p><input type="submit"/></p>
			</form> 
	';
    if (!isset($_POST["groesse"]) || $_POST["groesse"] == '')
    {
    	echo '<p>Felder, die markiert <strong title="Required" class="required">*</strong> sind, m&uuml;ssen ausgef&uuml;llt werden!</p>';
    }
}

if (!isset($_POST["groesse"]) && !isset($_POST["gewicht_typ"]))
{
	form();
	htmlfooter();
	exit();
}
else
{
	form();
	$groesse = (int) $_POST["groesse"];
	$gewicht_typ = (int) $_POST["gewicht_typ"];
	
	if ($groesse < 300) 
	{
		echo '<h2>Ausgabe</h2>
				<p>K&ouml;rpergr&ouml;&szlig;e: <em>' . $groesse . '</em>cm</p>
				<ol>
		';
    	for ($counter=40; $counter<=90; $counter=$counter+10)
    	{
			$bmi = round($counter / (($groesse / 100)* ($groesse / 100)), 1);
			echo '<li>bei einem Gewicht von: <em>' . $counter . 'kg</em> w&uuml;rde der BMI: <em>' . $bmi . '</em> betragen</li>
			';
		}
		echo '</ol>';		
	}
	else
	{
	        exit ("<p><strong>Bitte die K&ouml;rpergr&ouml;&szlig;e sinvoll angeben!</strong></p>");
	}
	
	htmlfooter();
}

 
?>
