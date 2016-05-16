<?php
class CabinetController{
	public function actionIndex(){
		require_once(ROOT.'/views/user/cabinet/cabinet.php');
		return true;		
	}
}
?>