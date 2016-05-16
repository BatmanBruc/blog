<?php
class User{

		public static function register($name, $email, $password){
			$dbh = DB::dbcon();
			$sql = 'INSERT INTO users (name, email, password)'.'VALUES (:name, :email, :password)';
			
			$result = $dbh->prepare($sql);
			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':password', $password, PDO::PARAM_STR);
			if($result->execute()){
			return true;
			} 			
		}

		public static function chekName($name){
			if(strlen($name) >= 4){
				return true;
			}
		}

		public static function chekPassword($password){
			if(strlen($password) >= 6){
				return true;
			}
		}	

		public static function chekLanPassword($password){
			if(preg_match('|^[A-Z0-9]+$|i', $password)){
				return true;
			}
		}

		public static function chekEmail($email){
			if(filter_var($email, FILTER_VALIDATE_EMAIL)){
				return true;
			}
		}

		public static function chekEmailExists($email){
			$dbh = DB::dbcon();
			$sql = 'SELECT COUNT(*) FROM users WHERE email = :email';

			$result = $dbh->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->execute();

			if($result->fetchColumn()) return false;
			return true;
			
		}

		public static function chekUserData($email, $password){
			$dbh = DB::dbcon();
			$sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

			$result = $dbh->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_INT);
			$result->bindParam(':password', $password, PDO::PARAM_INT);
			$result->execute();

			$user = $result->fetch();
			if($user){
				return $user;
			}

			return false;

		}		

		public static function author($userId,$user_name ){
			$_SESSION['user'] = $userId;
			$_SESSION['name'] = $user_name;
		}	

		public static function getName($id){
			$dbh = DB::dbcon();
			$sql = 'SELECT * FROM users WHERE id = :id';

			$result = $dbh->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->execute();

			$user = $result->fetch();	

			return $user;
		}
	}
?>