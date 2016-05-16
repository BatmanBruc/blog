<?php

class News{
    public function getAll(){
        $dbh = DB::dbcon();
        $a = $dbh->prepare('SELECT * FROM tab_1 ORDER BY date DESC');
        $a->execute();
        $result = $a->fetchAll();
        return $result; 
        
    }
    
    public function getOne($id){
        $dbh = DB::dbcon();
        $a = $dbh->prepare('SELECT * FROM tab_1 WHERE id='.$id);
        $a->execute();
        $result = $a->fetchAll();
        return $result; 
        
    }

    public static function getCountnews(){
        $dbh = DB::dbcon();
        $sql = 'SELECT COUNT(*) FROM tab_1';


        $result1 = $dbh->prepare($sql);
        $result1->execute();

        $news_count = $result1->fetchColumn();
        return $news_count;
    }

    public static function getComments($id_post){
        $dbh = DB::dbcon();
        $sql = 'SELECT * FROM comments WHERE id_post = :id_post';


        $result = $dbh->prepare($sql); 
        $result->bindParam(':id_post', $id_post, PDO::PARAM_STR);
        $result->execute();

        $comment = $result->fetchAll(PDO::FETCH_ASSOC);
        return $comment;
    }
}
?>