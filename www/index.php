<?php
    header("Content-Type: text/html; charset=utf-8");
    require_once __DIR__ . '/function.php';


# - База_Логинов зарегистрированных с паролем:
#	ключ = Логин ///// значение = Пароль
	$base_login = [
	   #  login  => password
		'Sergey' => '111',
		'Andrey' => '222',
		'Darina' => '333',
		'Petrov' => '444',
	];

# - База_Данных  с дополнительной информацией -> Имя, Фамилия, Email, Пол
	$base_date = [
	   #  login  =>    name      ferstname         email          Sex                Logo
		'Sergey' => ['Сергей', 'Старостенко', 'Sergey@gmail.com', 'm', 'sex_logo' => 'm2'],
		'Andrey' => ['Андрей', 'Остроушко', 'Adnrey@gmail.com', 'm', 'sex_logo' => 'm6'],
		'Darina' => ['Дарина', 'Пустовит', 'Darina@gmail.com', 'w', 'sex_logo' => 'w7'],
		'Petrov' => ['Петя', 'Иванов', 'Petrov@gmail.com', 'm', 'sex_logo' => 'm3'],
	];

# - Присваивание данных от Формы-Входа
	$login_in = $_POST['login_in'];
	$password_in = $_POST['password_in'];

# - Присваивание данных от Формы-Регистрации
	$login = $_POST['login'];
	$password = $_POST['password'];
	$name = $_POST['name'];
	$ferstname = $_POST['ferstname'];
	$email = $_POST['email'];
	$sex = $_POST['answer'];
	$sex_logo = $_POST['sex_logo'];

	#var_dump($login);

	if(isset($_POST['button_login_in'])){
		login_in($login_in, $password_in);
	}
	if(isset($_POST['button_registration'])){
		if (checking_form($login, $password, $name, $ferstname, $email) == 1) {
			registration($login, $password, $name, $ferstname, $email, $sex, $sex_logo);
		}else{
			header('Refresh: 2; URL=http://profile/form.php');
			echo "<h2>Извините, данные не прошли проверку!<br>Через 5сек вы будите переведены на форму входа/регистрации</h2>";
  			exit;
		}
	}
	if(isset($_POST['button_login_exit'])){
		setcookie('login','');
		session_start();
		unset($_SESSION['sessin_data']);
		session_destroy();
		header('Refresh: 2; URL=http://profile/form.php');
			echo "<h2>Вы выходите из профиля!<br>Через 5сек вы будите переведены на форму входа/регистрации</h2>";
  		exit;
	}


 ?>