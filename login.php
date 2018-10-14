<?php
	require"/include/db_connect.php";
    
    $data=$_POST;
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<title>Вход</title>
<?php
	if(isset($data['login']))
    {
        $error = array();
        $user=R::findOne('users', 'login = ?', array($data['login']));
        if($user)
        {
            if ( md5($data['password']) == $user->password)
            {
               $_SESSION['logged_user'] = $user;
               echo '<div class="good">HELLO!</br> Можете перейтии на <a href="/">главную </a>странцу!</div>';
            }else
            {
                $error[] ='Пароль введен не верно!';
            }
        }else
        {
            $error[] = 'Пользователь не найден!';
        }
        if(! empty($error))
        {
          echo '<div class="error">'.array_shift($error).'</div>'; 
    }
    }
?>
<center><div id="block-login">
<h2 class="h2-title">Вход</h2>
<form action="login.php" method="POST">

<p>
<p><strong>Логин</strong></p>
 <input type="text" name="login" class="login2" value="<?php
	echo $data['login'];
?>" />
</p>

<p>
<p><strong>Пароль</strong></p>
 <input type="password" name="password" class="password" value="<?php
	echo $data['password'];
?>" />
</p>

<p>
<button type="submit" name="do_login" class="submit-login">Войти</button>
</p>

</form>
</div>
</center>
