<?php
/*
 * Created on 05.09.2008, 09:56:43
 * by win-user: lorenzen_fi07b
 * 
 * TODO
 * whitespacing in html-output
 * 
 */
 
  
include ('include.inc.php');

/*
* 
* Aufgabe sechs
* 
*/ 
htmlheader();

function form() {
	echo '                <h1>Aufgabe 6</h1>
                        <form action="' . $_SERVER[PHP_SELF] . '" method="post">
                        <p>K&ouml;rpergr&ouml;&szlig;e <strong title="Required" class="required">*</strong>: <input type="text" name="groesse" value="'; if (isset($_POST["groesse"])) {echo $_POST["groesse"];} echo '" />cm<br />
                        Kategorie <strong title="Required" class="required">*</strong>:</p>
                        <ul style="list-style-type:none"><li><input type="radio" checked="checked" name="gewicht_typ" value="1" /> Untergewicht</li>
                        <li><input type="radio" name="gewicht_typ" value="2" /> Normalgewicht</li>
                        <li><input type="radio" name="gewicht_typ" value="3" /> &Uuml;bergewicht</li>
                        <li><input type="radio" name="gewicht_typ" value="4" /> starkes &Uuml;bergewicht</li>
                        <li><input type="radio" name="gewicht_typ" value="5" /> extremes &Uuml;bergewicht</li></ul>
                        <p><input type="submit"/></p></form>';
    if (!isset($_POST["groesse"]) || $_POST["groesse"] == '') 
    {
    	echo '					<p>Felder, die markiert <strong title="Required" class="required">*</strong> sind, m&uuml;ssen ausgef&uuml;llt werden!</p>';
    }
}

if (!isset($_POST["groesse"]) && !isset($_POST["gewicht_typ"]))
{
	form();
	htmlfooter();
	exit;
}
else
{
	form();
	$groesse = (int) $_POST["groesse"];
	$gewicht_typ = (int) $_POST["gewicht_typ"];
	
	if ($groesse < 300) 
	{
    
		switch ($gewicht_typ) {
			case 1:
				$gewicht_limit = 'Untergewicht';
				$g_typ_ug = '<span title="unendlich">&infin;</span>';
				$g_typ_og = round(18.5 * ($groesse / 100) * ($groesse / 100), 1);
				break;
			case 2:
				$gewicht_limit = 'Normalgewicht';
				$g_typ_ug = round(18.5 * ($groesse / 100) * ($groesse / 100), 1);
				$g_typ_og = round(25.0 * ($groesse / 100) * ($groesse / 100), 1);
				break;
			case 3:
				$gewicht_limit = 'Leichtes &Uuml;bergewicht';
				$g_typ_ug = round(25.0 * ($groesse / 100) * ($groesse / 100), 1);
				$g_typ_og = round(30.0 * ($groesse / 100) * ($groesse / 100), 1);
				break;
			case 4:
				$gewicht_limit = 'Starkes &Uuml;bergewicht';
				$g_typ_ug = round(30.0 * ($groesse / 100) * ($groesse / 100), 1);
				$g_typ_og = round(40.0 * ($groesse / 100) * ($groesse / 100), 1);
				break;
			case 5:
				$gewicht_limit = 'Extremes &Uuml;bergewicht';
				$g_typ_ug = round(40.0 * ($groesse / 100) * ($groesse / 100), 1);
				$g_typ_og = '<span title="unendlich">&infin;</span>';
				break;
			default:
				$gewichtsgrenze = '<span title="unendlich">&infin;</span>';
				$g_typ_ug = '<span title="unendlich">&infin;</span>';
				$g_typ_og = '<span title="unendlich">&infin;</span>';
				break;
		}
		echo '<h2>Ausgabe</h2>
				<p>Gewichtsgrenzen zur Kategorie: <em>' . $gewicht_limit . '</em>:</p>
				<ul><li>bei einer K&ouml;rpergr&ouml;&szlig;e von: <em>' . $groesse . '</em> cm</li>
				<li>Untergrenze: <em>' . $g_typ_ug . '</em> kg</li>
				<li>Obergrenze: <em>' . $g_typ_og . '</em> kg</li></ul>' . "\n";
		
	}
	else
	{
	        //echo $_POST["groesse"];
	        exit ("                <p><strong>Bitte die K&ouml;rpergr&ouml;&szlig;e sinvoll angeben!</strong></p>");
	}
	
	htmlfooter();
}

 
?>
