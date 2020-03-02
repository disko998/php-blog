<?php
require "class/post_class.php";

if (!(isset($_GET['id']) && !empty($_GET['id']))) {
  die("id is empty or not set");
}
header("location:../home.php?catId=".$_GET['id']);

?>
