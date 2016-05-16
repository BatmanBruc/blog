<?php

class Comment{

    public static function getComments($id_post){
        $dbh = DB::dbcon();
        $sql = 'SELECT * FROM comments WHERE id_post = :id_post';


        $result = $dbh->prepare($sql); 
        $result->bindParam(':id_post', $id_post, PDO::PARAM_STR);
        $result->execute();

        $comment = $result->fetchAll(PDO::FETCH_ASSOC);
        return $comment;
    }
    public static function setComments($name_user,$text,$id_post){

            $dbh = DB::dbcon();
            $sql = 'INSERT INTO comments (name_user, text, id_post)'.'VALUES (:name_user, :text, :id_post)';
            
            $result = $dbh->prepare($sql);
            $result->bindParam(':name_user', $name_user, PDO::PARAM_STR);
            $result->bindParam(':text', $text, PDO::PARAM_STR);
            $result->bindParam(':id_post', $id_post, PDO::PARAM_INT);
            $result->execute();
                echo "ok";
            return true;
    }
}
?>