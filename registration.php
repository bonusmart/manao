<?php
	require "/include/db_connect.php";
?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<title>–Регистрация</title>

<?php
	$data = $_POST;
    if( isset($data['do_registration']))
    $error = array();
    {
        if( trim($data['login']) == '')
        {
            $error[] = '¬ведите логин!';
        }
        
        if (R::count('users', "login = ?", array($data['login']))>0)
        {
            $error[] = 'Ћогин уже существует!';
        }
        
         if($data['password'] == '')
        {
            $error[] = '¬ведите пароль!';
        }
        
        if($data['confirm_password'] !=$data['password'] )
        {
            $error[] = 'ѕароли не совпадают!';
        }
        
        if( trim($data['email']) == '')
        {
            $error[] = '¬ведите Email!';
        }
        
        
        if( trim($data['name']) == '')
        {
            $error[] = '¬ведите »м¤!';
        }
        if( empty($error))
        {
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->password = md5($data['password']);
            $user->email = $data['email'];
            $user->name = $data['name'];
            R::store($user);
            echo '<div class="good">–егистраци¤ проведена успешно!</div>';
        } else
        {
            echo '<div class="error">'.array_shift($error).'</div>';
        }
        
    }
    
?>
<center><div id="block-registration">
<h2 class="h2-title">–егистраци¤</h2>
<form action="/registration.php" method="POST">
<p>
<p><strong>¬аш логин</strong></p>
 <input type="text" name="login" value="<?php
	echo $data['login'];
?>" />
</p>

<p>
<p><strong>¬аш пароль</strong></p>
 <input type="password" name="password" value="<?php
	echo $data['password'];
?>" />
</p>

<p>
<p><strong>¬аш пароль еще раз</strong></p>
 <input type="password" name="confirm_password" value="<?php
	echo $data['confirm_password'];
?>"  />
</p>

<p>
<p><strong>¬аш Email</strong></p>
 <input type="email" name="email" value="<?php
	echo $data['email'];
?>" />
</p>

<p>
<p><strong>¬аше им¤</strong></p>
 <input type="text" name="name" value="<?php
	echo $data['name'];
?>" />
</p>

<p>
<button type="submit" name="do_registration" class="submit-registration">«арегистроватьс¤</button>
</p>

</form>
</div>
</center>
