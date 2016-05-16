<?php
class UserController{
	public function actionReg(){
		$name = '';
		$email = '';
		$password = '';
		$result = false;
		if(isset($_POST['submit'])){
			$errors = false;
			$name = strip_tags($_POST['name']);
			$email = strip_tags ($_POST['email']);
			$password = strip_tags ($_POST['password']);

			if(!User::chekName($name)) $errors[] = "Короткое имя";
			if(!User::chekEmail($email)) $errors[] = "Некоректный email";
			if(!User::chekEmailExists($email)) $errors[] = "Такой email уже существует";
			if(!User::chekPassword($password)) $errors[] = "Короткий пароль";
			if(!User::chekLanPassword($password)) $errors[] = "Только латинские буквы и цифры";

			if($errors == false){
				$result = User::register($name, $email, $password);
			}

		}
		require_once(ROOT.'/views/user/register.php');
		return true;
	}

	public function actionLogin(){
		$email = '';
		$password = '';
		$result = false;
		if(isset($_POST['submit'])){
			$errors = false;
			$email = $_POST['email'];
			$password = $_POST['password'];

			if(!User::chekEmail($email)) $errors[] = "Некоректный email";
			if(!User::chekPassword($password)) $errors[] = "Короткий пароль";
			if(!User::chekLanPassword($password)) $errors[] = "Только латинские буквы и цифры";

			$user = User::chekUserData($email, $password);
			$userID = $user['id'];
			$user_name = $user['name']; 

			if($userID == false){
				$errors[] = 'Неправильные данные для входа';
			}
			else{
				User::author($userID,$user_name );
				header('Location: /cabinet/');
			}

		}
		require_once(ROOT.'/views/user/login.php');
		return true;		
	}

	public function actionLogout(){
		unset($_SESSION['user']);
		header('Location: /');
	}
}
?>
