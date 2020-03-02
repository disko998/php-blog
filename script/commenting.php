<?php
require "class/comment_class.php";
require "class/validation_class.php";

if (!(isset($_POST['postId']) && isset($_POST['comment']) && isset($_POST['userId']))) {
  die("Wrong input!");
}

$userID=validForm::clear(trim($_POST['userId']));
$postID=validForm::clear(trim($_POST['postId']));
$comment=validForm::clear(trim($_POST['comment']));

if (empty($comment) || empty($postID) || empty($userID)) {
  die("You can't submit empty comment!");
}

$newCom=new Comment($userID,$postID,$comment);
$newCom->postComment();
 ?>
