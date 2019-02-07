<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = clearStr($_POST['name']);
	$dob = clearStr($_POST['dob']);
	$login = clearStr($_POST['login']);
	$password = passwordGen($_POST['password']);
	$passwordRep = passwordGen($_POST['passwordRep']);
	
	if ($password != $passwordRep) {
		$_SESSION['msg_auth'] = 'Ошибка при повторном вводе пароля!';
		header('Location: /' . $domainPath . '/?page=11');
		exit;
	}
	
	if (empty($name) || empty($dob) || empty($login) || empty($password) || empty($passwordRep)) {
		$_SESSION['msg_auth'] = 'Необходимо заполнить все поля!';
		header('Location: /' . $domainPath . '/?page=11');
		exit;
	}
	
	$sql = "SELECT login FROM users";
	$res = mysqli_query(connect(), $sql);
	if ($row = mysqli_fetch_assoc($res)) {
		if ($login == $row['login']) {
			$_SESSION['msg_auth'] = 'Данный логин уже существует! Подберите другой!';
			header('Location: /' . $domainPath . '/?page=11');
			exit;
		} 
	}
	
	$sql = "INSERT INTO users (name, login, password, dob) 
			VALUES ('$name', '$login', '$password', '$dob')";
	mysqli_query(connect(), $sql);
	$_SESSION['msg_auth'] = '';
	$_SESSION['login'] = $login;
	$_SESSION['msgGallery'] = 'Вы авторизованный пользователь. Можете покупать товары';
	$_SESSION['msgGalleryErr'] = '';
	
	header('Location: /' . $domainPath . '/?page=10');
	exit;
}

if(!empty($_SESSION['msg_auth'])) {
	$content = "<span style='color:red'>{$_SESSION['msg_auth']}</span>";
}
$title = 'Регистрация пользователя';
$content .= <<<php
<form method="post">
    <input type="text" name="name" placeholder="Введите Ваше имя" style="width:220px;padding: 3px"><br>
	<input type="date" name="dob" placeholder="Введите Ваш день рождения" style="width:220px;padding: 3px"><br>
	<input type="text" name="login" placeholder="Придумайте оригинальный логин" style="width:220px;padding: 3px"><br>
    <input type="password" name="password" placeholder="Придумайте сложный пароль" style="width:220px;padding: 3px"><br>
	<input type="password" name="passwordRep" placeholder="Повторите пароль" style="width:220px;padding: 3px"><br>
    <input type="submit">
</form>
php;
?>