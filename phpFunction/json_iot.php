<?php
require_once "config.php";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
    //$dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $dbh->exec("set names utf8");//�ӫ��w�ҨϥΪ��s�X�F
    $res = $dbh->query("SELECT * FROM `action`");
    $res->setFetchMode(PDO::FETCH_ASSOC);  //�^�ǰ}�C�Φ�
    //$re ->setFetchMode(PDO::FETCH_OBJ ); //�^�Ǫ���Φ�
    $res_arr = $res->fetch(); //$res�����fetch()

    //print_r($res_arr);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

echo json_encode($res_arr);//��json
$dbh = null; //�_�u
?>