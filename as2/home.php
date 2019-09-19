<?php
if(isset($_POST['username'],$_POST['password'])){
	$uname = $_POST['username'];
	$pwd = $_POST['password'];
	if($uname == 'admin' && $pwd == 'csrf'){
		echo '<h3>Successfully logged in</h3>';
		session_start();
		$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
		$session_id = session_id();
		setcookie('sessionCookie',$session_id,time()+ 60*60*24*365 ,'/');
		setcookie('csrfTokenCookie',$_SESSION['token'],time()+ 60*60*24*365 ,'/');
	}
	else{
		echo 'Invalid Credentials';
		exit();
	}
}
else{
	header('Location:./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	
	$(document).ready(function(){
	
	var c_value = "";
    var dCookie = decodeURIComponent(document.cookie);
	var csrfC = dCookie.split(';')[2]
	if(csrfC.split('=')[0] = "csrfTokenCookie" ){
		c_value = csrfC.split('csrfTokenCookie=')[1];
		document.getElementById("t_value").setAttribute('value', c_value) ;
	}
	});

</script>
</head>

<body>
<div class="login">
			<h1>Create post</h1>
			<form action="display.php" method="post">
				
                <input type="text" name="ustatus" placeholder="Type something!" id="ustatus">
                <input type="hidden" name="token" value="" id="t_value"/>
				<input type="submit" value="Share">
			</form>
		</div>

</html>