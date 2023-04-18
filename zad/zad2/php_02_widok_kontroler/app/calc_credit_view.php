
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
</head>
<body>
    
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
    
<div style="width:90%; margin: 2em auto;">    

<form action="<?php print(_APP_URL);?>/app/calc_credit.php" method="post" class="pure-form pure-form-stacked">
    <legend>Kalkulator</legend>
    <fieldset>

	<label for="id_x">Kwota kredytu:</label>
	<input id="id_x" type="text" name="x" value="<?php if (isset ($x)) print($x); ?>" /><br />
		
	<label for="id_y">Okres spłaty(miesiące):</label>
	<input id="id_y" type="text" name="y" value="<?php if (isset ($y)) print($y); ?>" /><br />
	
	<label for="id_z">Oprocentowanie:</label>
	<input id="id_z" type="text" name="z" value="<?php if (isset ($z)) print($z); ?>" /><br />
	
        </fieldset>
	<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<?php

if (isset($messages)) {
	echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 10px; background-color: #f00; width:300px; font-weight: bold;">';
	foreach ( $messages as $key => $msg ) {
		echo '<li>'.$msg.'</li>';
	}
	echo '</ol>';
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #6b5; width:300px; font-weight: bold;">
<?php echo 'Miesięczna rata: '.$result; ?>
</div>
<?php } ?>
    
</div>

</body>
</html>