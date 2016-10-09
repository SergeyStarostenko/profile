<?php  
	header("Content-Type: text/html; charset=utf-8");
	session_start();
	require "index.php";
	global $base_date;
	if (isset($_COOKIE['login'])) {
		$user = $_COOKIE['login'];
	}
	if (isset($_SESSION['login'])) {
		$user = $_SESSION['login'];
	}
	if($user == ''){
		header('Refresh: 4; URL=http://profile/form.php');
		echo "<h2>Время сессии истекло<br>Через 4сек вы будите переведены на форму регистрации/входа</h2>";
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style_profile.css" rel="stylesheet">
	<title><?php echo $user; ?></title>
</head>
<body>
	<div class="card">
		<div class="card_logo">
		<?php 
			if ($base_date["$user"]['sex_logo'] !== '' && $base_date["$user"]['sex_logo'] !== NULL) {
				echo "<img src=\"img/".$base_date["$user"]['sex_logo'].".png\">";
			}if ($_SESSION['sessin_data']['sex_logo'] !== '' && $_SESSION['sessin_data']['sex_logo'] !== NULL) {
				echo "<img src=\"img/".$_SESSION['sessin_data']['sex_logo'].".png\">";
			}if($_SESSION['sessin_data']['sex_logo'] == NULL && $base_date["$user"]['sex_logo'] == NULL) {
				echo "<img src=\"img/anon.png\">";
			}
		?>
		</div>	
		<div class="card_data">
			<h2><?php echo $user; ?></h2>
			<ul>
				<?php
				if (isset($_COOKIE['login'])) {
					foreach ($base_date[$user] as $kay => $value) {
						if ($value == 'm' || $value == 'w' || $kay === 'sex_logo' || $value == '') {
							continue;
						}
						else{
							echo "<li>".$value."</li>";
						}
					}
				}
				if (isset($_SESSION['login'])) {
					foreach ($_SESSION['sessin_data'] as $kay => $value) {
						if ($value == 'm' || $value == 'w' || $kay == 'login' || $kay == 'sex_logo' || $value == '') {
							continue;
						}
						else{
					 		echo "<li>".$value."</li>";
					 	}
					} 
				}
				if(isset($_COOKIE['login']) == FALSE && isset($_SESSION['login']) == FALSE){
					echo "406";
				}
					
				?>
			</ul>
			<form action="index.php" method="post">
				<input type="submit" name="button_login_exit" value="Выйти" class="Button-Box_1">
			</form>
		</div>
	</div>
</body>
</html>