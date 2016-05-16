<?php 
class lucas{
	public static function setLucas($id){
		$dbh = DB::dbcon();
		$sql1 = 'SELECT lucs FROM tab_1 WHERE id = :id';

		$result1 = $dbh->prepare($sql1);
		$result1->bindParam(':id', $id, PDO::PARAM_INT);
		$result1->execute();

		$lucs = $result1->fetchColumn();
		$lucs++;

		$sql2 = 'UPDATE tab_1 SET lucs = :lucs WHERE id = :id';

		$result2 = $dbh->prepare($sql2);
		$result2->bindParam(':lucs', $lucs, PDO::PARAM_INT);
		$result2->bindParam(':id', $id, PDO::PARAM_INT);
		$result2->execute();

		return $lucs;

	}

	public static function chekLucas($id_user, $id_news){
		$dbh = DB::dbcon();
		$sql = 'SELECT COUNT(*) FROM lucas WHERE id_user = :id_user AND id_news = :id_news';
		$result = $dbh->prepare($sql);
		$result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
		$result->bindParam(':id_news', $id_news, PDO::PARAM_INT);
		$result->execute();
		$result->fetchColumn();

		if(!isset($result)) return false;
		else{ 
			$sql1 = 'SELECT * FROM lucas WHERE id_user = :id_user AND id_news = :id_news';
			$result1 = $dbh->prepare($sql1);
			$result1->bindParam(':id_user', $id_user, PDO::PARAM_INT);
			$result1->bindParam(':id_news', $id_news, PDO::PARAM_INT);
			$result1->execute();
			$a = $result1->fetchAll();
			$k = [];
			foreach ($a as $k) {
				return $k['id'];
			}
			

		}
	}

	public static function setTabLucas($id_user, $id_news){
		$dbh = DB::dbcon();
		$sql = 'INSERT INTO lucas (id_user, id_news)'.'VALUES (:id_user, :id_news)';

		$result = $dbh->prepare($sql);
		$result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
		$result->bindParam(':id_news', $id_news, PDO::PARAM_INT);
		$result->execute();
	}

	public static function deleteTabLucas($id){
		$dbh = DB::dbcon();
		$sql = 'DELETE FROM lucas WHERE id = :id';
		$result = $dbh->prepare($sql);
		$result->bindParam(':id', $id, PDO::PARAM_INT);
		$result->execute();
		return true;

	}


	public static function deleteLucas($id){
		$dbh = DB::dbcon();
		$sql1 = 'SELECT lucs FROM tab_1 WHERE id = :id';

		$result1 = $dbh->prepare($sql1);
		$result1->bindParam(':id', $id, PDO::PARAM_INT);
		$result1->execute();

		$lucs = $result1->fetchColumn();
		$lucs--;

		$sql2 = 'UPDATE tab_1 SET lucs = :lucs WHERE id = :id';

		$result2 = $dbh->prepare($sql2);
		$result2->bindParam(':lucs', $lucs, PDO::PARAM_INT);
		$result2->bindParam(':id', $id, PDO::PARAM_INT);
		$result2->execute();

		return $lucs;

	}

	public static function getCountLucas(){
		$dbh = DB::dbcon();
		$sql = 'SELECT COUNT(*) FROM lucas';


		$result1 = $dbh->prepare($sql);
		$result1->execute();

		$lucs = $result1->fetchColumn();
		return $lucs;

	}

	public static function getLucas(){
				$dbh = DB::dbcon();
		$sql1 = 'SELECT lucs,id FROM tab_1';

		$result1 = $dbh->prepare($sql1);
		$result1->execute();

		$lucs = $result1->fetchAll(PDO::FETCH_ASSOC);
		return $lucs;
	}


}
?>