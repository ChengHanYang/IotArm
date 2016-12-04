<?php
require_once "config.php";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
    //$dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $dbh->exec("set names utf8");//來指定所使用的編碼了
    $res = $dbh->query("SELECT * FROM `action`");
    $res->setFetchMode(PDO::FETCH_ASSOC);  //回傳陣列形式
    //$re ->setFetchMode(PDO::FETCH_OBJ ); //回傳物件形式
    $res_arr = $res->fetch(); //$res物件取fetch()

    //print_r($res_arr);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

echo json_encode($res_arr);//轉json
$dbh = null; //斷線
?>