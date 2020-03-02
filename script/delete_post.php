<?php
require 'class/conn_class.php';

if (!(isset($_POST['postId']) && isset($_POST['admin']))) {
  header("location:../home.php");
}
if ($_POST['admin']) {
  $postID=trim($_POST['postId']);
  if (empty($postID)) {
    header("location:../home.php");
    exit();
  }
  //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
  $conn=Model::GetConnection();
  $res=$conn->exec("UPDATE post SET deleted=1 WHERE post_id='{$postID}'");
  if ($res) {
    header("location:../home.php");
  }else {
    header("location:../home.php");
  }
}else {
  header("location:../home.php");
}

 ?>
