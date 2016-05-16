<?php
class DB{
    public static function dbcon()
    {
        $db_confPath = ROOT.'/confing/db_conf.php';
		$arr = include($db_confPath);
        $dbh = new PDO('mysql:host=127.0.0.1:3306;dbname=marvel', $arr['user'], $arr['pass']);
        return $dbh;
    }
 }   
?>