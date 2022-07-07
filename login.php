<?php
$username = null;
$password = null;
$invalidUser = $_GET["invalid"];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(!empty($_POST["username"]) && !empty($_POST["password"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		if($username == 'admin' && $password == 'admin') {
			session_start();
			$_SESSION["authenticated"] = 'true';
			header('Location: demo.php');
		}
		else {
			header('Location: login.php?invalid=true');
                       // $invalid = 'true';
		}
		
	} else {
		header('Location: login.php?invalid=true');
                $invalid = 'true';
	}
} else {
?>

<html>
<head><title>Login Page</title></head>
<body>
<center>
<img src="http://i.imgur.com/S8prDtg.jpg" alt="7.png" border="0" />
<table width="700" height="300" border="0" >
<tr>

<td width=500><form method='post'>
<?php if($invalidUser == 'true'){
?>
<font color="red">Invalid username or password!</font></br>
<?php 			
} ?>
<b><font color="blue" size="5px">Username:  </font></b><input type='text' name='username' size=18 autofocus></br>
<b><font color="blue" size="5px">Password :  </font></b><input type='password' name='password' size=18 autofocus></br></br>
<input type='submit' value='   ' style="background-image: url('http://sv1.upsieutoc.com/2016/10/25/login.jpg'); border: none; padding: 25px 82px;">
</tr>
</table>
</center>
</body>
</html> 
<?php } ?>

