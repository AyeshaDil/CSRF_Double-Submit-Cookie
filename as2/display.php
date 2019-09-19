<?php

require_once 'token.php';

$val = $_POST["token"];

if(isset($_POST['ustatus'])){
	if(token::checkToken($val,$_COOKIE['csrfTokenCookie'])) {
		echo "<h2>Valid request: ".$_POST['ustatus']."</h2>";
		echo "<h3>CSRF token matched</h3>";
		echo "<h3> Hidden field (".$val.") --> csrfTokenCookie (".$_COOKIE['csrfTokenCookie'].")</h3>";	
	}else {
		echo "<h2> Invalid request, CSRF token does not match :  ".$_POST['ustatus']."</h2>";
	}
}
?>
