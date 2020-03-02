<?php
require 'class/conn_class.php';

if (!(isset($_POST['commId']) && isset($_POST['admin']) && isset($_POST['userId']) && isset($_POST['ownerId']))) {
  header("location:../home.php");
}
if ($_POST['admin']) {
  $commID=trim($_POST['commId']);
  if (empty($commID)) {
    header("location:../home.php");
  }
  $conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
  $res=$conn->exec("UPDATE comment SET deleted=1 WHERE comm_id='{$commID}'");
  if ($res) {
    header("location:../home.php");
  }else {
    header("location:../home.php");
  }
}else {
  $ownerID=trim($_POST['ownerId']);
  $userID=trim($_POST['userId']);
  $commID=trim($_POST['commId']);
  if (empty($userID) || empty($commID) || empty($ownerID)) {
    header("location:../home.php");
  }
  if ($userID==$ownerID) {
    //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
    $conn=Model::GetConnection();
    $res=$conn->exec("UPDATE comment SET deleted=1 WHERE comm_id='{$commID}'");
    if ($res) {
      header("location:../home.php");
    }else {
      header("location:../home.php");
    }
  }else {
    header("location:../home.php");
  }

}
 ?>
