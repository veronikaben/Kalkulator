<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

$x = isset($_REQUEST ['x']) ? $_REQUEST['x'] : null;
$y = isset($_REQUEST ['y']) ? $_REQUEST['y'] : null;
$z = isset($_REQUEST ['z']) ? $_REQUEST['z'] : null;
$operation = ['op'] ? ['op'] : null;

if ( ! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano liczby miesięcy';
}
if ( $z == "") {
	$messages [] = 'Nie podano oprocentowania';
}

if (empty( $messages )) {
	
	if (! is_numeric( $x )) {
		$messages [] = 'Podana kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Podana wartość nie jest liczbą całkowitą';
	}
}
    
if (empty ( $messages )) {
    
    global $role;
	
    $x = intval($x);
    $y = intval($y);
    $z = floatval($z);

    switch ($operation) {
        default : 
            $result = ($x / $y + (($x / $y) * $z / 100));
                break;
    }                        
}

include 'calc_credit_view.php';