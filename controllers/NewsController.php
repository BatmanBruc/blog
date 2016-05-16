<?php
class NewsController
{
	public function actionList(){
	    $a = new News;
        $a = $a->getAll();
		require_once(ROOT.'/views/news/news.php');
		return true;
		
	}

	public function actionOne($id){
	    $a = new News;
        $a = $a->getOne($id);
		require_once(ROOT.'/views/news/one_news.php');
		return true;
		
	}


	public function actionCount(){
		echo News::getCountnews();
		return true;
	}
}

?>