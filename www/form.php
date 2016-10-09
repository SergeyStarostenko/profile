<?php  
	require "index.php";
	global $base_login;
	session_start();
	if (isset($_COOKIE['login'])) {
		$user = $_COOKIE['login'];
		if(array_key_exists($user, $base_login)){
			header('Refresh: 4; URL=http://profile/profile.php');
			echo "<h2>Вы находитесь в системе<br/>Сейчас вы увидите Ваш профиль!</h2>";
  			exit;
		}
	}
	if (isset($_SESSION['login'])) {
		$user = $_SESSION['login'];
			header('Refresh: 4; URL=http://profile/profile.php');
			echo "<h2>Вы находитесь в системе<br/>Сейчас вы увидите Ваш профиль!</h2>";
  			exit;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css" rel="stylesheet">
	<title>Форма входа</title>
</head>
<body>
	<div class="box">
		<div class="login">
			<h3>Вход</h3>
			<form action="index.php" method="post">
				<input type="text" placeholder="Логин:" name="login_in" class="Input-Box">
				<br>
				<input type="password" placeholder="Пароль:" name="password_in" class="Input-Box">
				<br>
				<input type="submit" name="button_login_in" value="Войти" class="Button-Box_1">
			</form>
		</div>
		<div class="registr">
			<h3>Регистрация</h3>
			<form action="index.php" method="post">
				<input type="text" placeholder="Логин:" name="login" class="Input-Box">
				<br>
				<input type="password" placeholder="Пароль:" name="password" class="Input-Box">
				<br>
				<input type="text" placeholder="Имя:" name="name" class="Input-Box">
				<br>
				<input type="text" placeholder="Фамилия:" name="ferstname" class="Input-Box">
				<br>
				<input type="text" placeholder="Email:" name="email" class="Input-Box">
				<br>
				<input type="radio" name="answer" value="m" class="input_sex">Мужчина
  				<input type="radio" name="answer" value="w" class="input_sex">Женщина
		</div>
		<div class="block_sex_logo">
				<img src="/img/m1.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m1">
				<img src="/img/m2.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m2">
				<img src="/img/m3.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m3">
				<img src="/img/m4.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m4">
				<img src="/img/m5.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m5">
				<img src="/img/m6.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="m6">
				<img src="/img/w7.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w1">
				<img src="/img/w2.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w2">
				<img src="/img/w3.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w3">
				<img src="/img/w4.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w4">
				<img src="/img/w5.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w5">
				<img src="/img/w6.png" alt="" width="50">
				<input type="radio" name="sex_logo" value="w6">
				<br>
				<input type="submit" name="button_registration" value="Зарегистрироваться" class="Button-Box_2">
			</form>
		</div>
	</div>
</body>
</html>