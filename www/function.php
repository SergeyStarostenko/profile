<?php  

# - Функция Проверки данных от Формы-Входа на наличии в Базе
	function login_in($login_in_f, $password_in_f){
		global $base_login;
		if (array_key_exists($login_in_f, $base_login)) {;
			if ($base_login[$login_in_f] === $password_in_f) {
				setcookie('login', "$login_in_f", time()+120);
				header('Refresh: 4; URL=http://profile/www/profile.php');
				echo "<h2>Вы вошли в систему как - ".$login_in_f."<br/>Сейчас вы увидите Ваш профиль!</h2>";
  				exit;
			}else{
				header('Refresh: 5; URL=http://profile/www/form.php');
				echo "<h2>Не правильно написан пароль. Попробуйте заново!<br/>Через 5сек вы будите переведены на форму авторизации</h2>";
  				exit;
			}
		}else{
			header('Refresh: 5; URL=http://profile/www/form.php');
			echo "<h2>Не найден пользователь по Логину. Зарегистрируйтесь!<br>Через 5сек вы будите переведены на форму регистрации</h2>";
  			exit;
		}
	}

# - Функция Проверки данных от Формы-Регистрации на наличии в Базе
	function registration($login_f, $password_f, $name_f, $ferstname_f, $email_f, $sex_f, $sex_logo_f){
		# - Проверка на пустые строки от Формы-Регистрации
		if($login_f !== '' && $password_f !== '' && $name_f !== '' && $ferstname_f !== '' && $email_f !== '' && $sex_f !== '') {
			# - Проверка на существование Логина в Базе_Логинов
			if(search_login_password($login_f) === 0){
				$sessin_data = [
									'login' => $login_f, 
									'1' => $name_f, 
									'2' => $ferstname_f, 
									'3' => $email_f, 
									'4' => $sex_f, 
									'sex_logo' => $sex_logo_f,
								];
				session_start();
				$_SESSION['login'] = $login_f;
				$_SESSION['sessin_data'] = $sessin_data;
				header('Refresh: 5; URL=http://profile/www/profile.php');
				echo "<h2>Вы вошли в систему как - ".$login_f."<br/>Сейчас вы увидите Ваш профиль!</h2>";
  				exit;
			}else{
				header('Refresh: 5; URL=http://profile/www/form.php');
				echo "<h2>Такой Логин уже существует! Пожалуйста, поменяйте его<br>Через 5сек вы будите переведены на форму регистрации</h2>";
  				exit;
			}
		}else{
			header('Refresh: 5; URL=http://profile/www/form.php');
			echo "<h2>Заполните все поля регистрации!<br>Через 5сек вы будите переведены на форму регистрации</h2>";
  			exit;
		}
	}

# - Функция Проверки Login от Формы-Регистрации на наличии в Базе
	function search_login_password($login_x){
		global $base_login;
		if((array_key_exists($login_x, $base_login))){
			return 1;
		}else{
			return 0;
		}
	}

	function checking_form($login_ch, $password_ch, $name_ch, $ferstname_ch, $email_ch){
		if ($login_ch === $password_ch) {
			header('Refresh: 3; URL=http://profile/www/form.php');
			echo "<h2>Логин и Пароль не совпадают! Пожалуйста измените данные!<br>Через 3сек вы будите переведены на форму входа/регистрации</h2>";
  			exit;
		}

		$login_ch = clean_form($login_ch);
		$name_ch = clean_form($name_ch);
		$ferstname_ch = clean_form($ferstname_ch);
		$email_ch = clean_form($email_ch);

		if(!empty($name_ch) && !empty($ferstname_ch) && !empty($email_ch) && !empty($login_ch)) {
    		$email_validate = filter_var($email_ch, FILTER_VALIDATE_EMAIL); 
			if(check_length($name_ch, 3, 20) && check_length($ferstname_ch, 2, 20) && check_length($login_ch, 3, 20) && $email_validate) {
			  	return 1;
			}else{
				return 0;
			}
		}
		else{
				return 0;
			}
	}

	function clean_form($value = ''){
		$value = trim($value);
    	$value = stripslashes($value);
    	$value = strip_tags($value);
    	$value = htmlspecialchars($value);
    		return $value;
	}

	function check_length($value = "", $min, $max) {
    	$result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    	return !$result;
	}


?>
