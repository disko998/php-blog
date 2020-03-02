<?php
require "class/validation_class.php";
require "class/conn_class.php";

if (!($_SERVER["REQUEST_METHOD"] == "POST")) {
  die("Error 404");
}
if (!(isset($_POST['fname']) && isset($_POST['lname'])
&& isset($_POST['email']) && isset($_POST['pass'])
&& isset($_POST['bdate']) && isset($_POST['gender']) )){
  die("Error 404,go <a href=\"../index.php\">back</a>!");
}

$fname=validForm::clear(trim($_POST['fname']));
$lname=validForm::clear(trim($_POST['lname']));
$email=validForm::clear(trim($_POST['email']));
$pass=htmlspecialchars(trim($_POST['pass']));
$bdate=validForm::clear(trim($_POST['bdate']));
$gender=validForm::clear(trim($_POST['gender']));
//echo $fname." ".$lname." ".$email." ".$pass." ".$bdate." ".$gender;

if (validForm::validAll($fname,$lname,$email,$pass,$bdate,$gender)) {
  $conn = Model::GetConnection();
  if (!$conn) {
    die("Connection to database faild");
  }
  $sqlQuery="INSERT INTO users(first_name,last_name,email,password,bdate,gender)
              VALUES('$fname','$lname','$email','$pass','$bdate','$gender')";
  $res = $conn->exec($sqlQuery);
  if ($res>0) {
    echo "Successlly registration {$fname},you can <a href=\"../index.php\">login</a> now!";
  }else {
    echo "This email already exsist,go <a href=\"../index.php\">back</a>!";
  }
}else {
 echo "Wrong inputs,go <a href=\"../index.php\">back</a>!";
}

 ?>
