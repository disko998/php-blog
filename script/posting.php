<?php
require "class/validation_class.php";
require 'class/conn_class.php';

if (!(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['categoryId']))) {
  header("location:../post.php");
}

$title=validForm::clear(trim($_POST['title']));
$text=validForm::clear(trim($_POST['text']));
$categoryID=validForm::clear(trim($_POST['categoryId']));
$message="";

if (empty($title) || empty($text) || empty($categoryID)) {
    setcookie("notify", "Please fill the inputs!",time()+3600,'/');
    header("location:../post.php");
    exit();
}

//$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
$conn=Model::GetConnection();
$res=$conn->exec("INSERT INTO post(category_id,title,text) VALUES($categoryID,'{$title}','{$text}')");
if ($res) {
  $message="You successfully upload post!";
}else {
  $message="Inputs are not valid";
}
  setcookie("notify", $message ,time()+3600,'/');
  header("location:../post.php");
 ?>
