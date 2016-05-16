<?php
class CommentsController{
	public function actionComment($id_post){
		$val = Comment::getComments($id_post);
		foreach ($val as $key) {
			echo "<li id='".$key['id']."' style = 'list-style-type: none;width: 290px;	text-overflow: clip;'><p>".$key['name_user'].":".$key['text']."</li><hr>";
		}
		return true;
	}
	public function actionSetcomment($id_post){

		$text = strip_tags($_POST['text']);
		$name_user = $_SESSION['name'];
		Comment::setComments($name_user,$text,$id_post);

		return true;
	}
}
?>