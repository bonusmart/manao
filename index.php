<?php
	require "/include/db_connect.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    
    
    
	<title>Задание манао</title>
</head>

<body>

<?php	if( isset($_SESSION['logged_user']) ):?>
<center><div class="autch-good">
<p>Авторизован!</p> 
</div></center>
<center><div class="autch-good">
<p>HELLO,</p>
</div></center>
<center>
 <?php
 
	echo $_SESSION['logged_user']->login;
?>
</center>
 <center><input type="submit" name="submit" class="exit"  value=" Выход " onclick="location.href='logout.php'" /></center>

<?php	else : ?>
 
 <center><input type="submit" name="submit" class="login"  value=" Вход " onclick="location.href='login.php'" /></center>
  <center><input type="submit" name="submit" class="registration"  value=" Регистрация " onclick="location.href='registration.php'" /></center>
<?php	endif; ?>

</body>
</html>
