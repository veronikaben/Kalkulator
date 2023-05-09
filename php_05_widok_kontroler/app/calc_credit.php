<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function validate (&$x, &$y, &$z) {

if ( ! (isset($x) && isset($y) && isset($z))) {
    return false;
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
if (empty( $messages )) {
    return true;
} else { 
	return false;
}

}

$x = $_REQUEST ['x'] ?? null;
$y = $_REQUEST ['y'] ?? null;
$z = $_REQUEST ['z'] ?? null;


if (validate($x, $y, $z)) {

    global $role;
	
	$x = intval($x);
	$y = intval($y);
	$z = floatval($z);

	$result = ($x / $y + (($x / $y) * $z / 100));
}



include 'calc_credit_view.php';