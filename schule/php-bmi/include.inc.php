<?php
/*
 * Created on 05.09.2008, 09:00:34
 * by win-user: lorenzen_fi07b
 * TODO
 * 
 */
 
 function htmlheader() {
echo '<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
	<head profile="http://gmpg.org/xfn/11">
		<title>Aufgaben ...</title>
		<!-- <link rel="stylesheet" href="./style/style.css" type="text/css" media="screen" />
		<link rel="shortcut icon" href="favicon.ico" /> -->
		<style type="text/css" media="screen">
				strong.required {color: red; cursor:help}
		</style>
	</head>
	<body>
			';
   }

function htmlfooter() {
echo '
	</body>
</html>';
   }
   
?>
