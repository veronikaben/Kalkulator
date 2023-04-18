<?php

require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/smarty/libs/Smarty.class.php';
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

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator kredytowy');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('role',$role);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);

$smarty->display(_ROOT_PATH.'/app/calc_credit.html');
