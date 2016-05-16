<?php
class GetUser{
	public static function getName(){
	if(isset($_SESSION['user'])){
		$user = User::getName($_SESSION['user']);
	}
	echo $user['name'];

  }		

}

?>