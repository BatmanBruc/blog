<?php
class LucasController{
	public function actionLuc($id){
		$chek = Lucas::chekLucas($_SESSION['user'], $id);
		if($chek == false){
			$id_user = $_SESSION['user'];
			$id_news = $id;
			Lucas::setTabLucas($id_user, $id_news);
			echo Lucas::setLucas($id);
			return true;
		}
		else{
			if(Lucas::deleteTabLucas($chek)){
			echo Lucas::deleteLucas($id);
			}
			return true;
		}
	}

	public function actionResluc(){
		$val = Lucas::getLucas();
		$json = json_encode($val);
		echo $json;
		return true;
	}
}
?>