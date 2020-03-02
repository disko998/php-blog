<?php
require "class/validation_class.php";
require "class/conn_class.php";

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
  die("Error 404");
}

if (!(isset($_POST['e']) && isset($_POST['p']))) {
  header("Location:../index.php");
  die();
}

$email=validForm::clear(trim($_POST['e']));
$pass=validForm::clear(trim($_POST['p']));

if (!(validForm::validEmail($email) && validForm::validPass($pass))) {
  die ("Invalid data");
}
$conn = Model::GetConnection();
$res=$conn->query("SELECT * FROM users WHERE email='{$email}' AND password='{$pass}' LIMIT 1");
if ($res) {
  $asNiz = $res->fetchAll(PDO::FETCH_ASSOC);
  if (count($asNiz)==1) {
    foreach($asNiz as $v){
      session_start();
      $_SESSION['user_id'] = $v['user_id'];
      $_SESSION['access'] = 'ok';
      header('location:../home.php');
    }
  }else {
    echo "Wrong email or password!";
  }
}else {
  echo "error";
}





 ?>
