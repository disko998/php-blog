<?php
require "conn_class.php";

class User
{
  public $userId;
  public $firstName;
  public $lastName;
  public $email;
  public $password;
  public $bdate;
  public $gander;
  public $admin;

  function __construct($id,$fname,$lname,$email,$pass,$bdate,$gander,$admin)
  {
    $this->userId=$id;
    $this->firstName=$fname;
    $this->lastName=$lname;
    $this->email=$email;
    $this->password=$pass;
    $this->bdate=$bdate;
    $this->gander=$gander;
    $this->admin=$admin;
  }

  public static function getUserById($id)
  {
    try {
      $conn = Model::GetConnection();
      $res=$conn->query("SELECT * FROM users WHERE user_id='{$id}' LIMIT 1");
      if ($res) {
        $asNiz = $res->fetchAll(PDO::FETCH_ASSOC);
        if (count($asNiz)==1) {
          foreach($asNiz as $v){
            $user=new User($v['user_id'],$v['first_name'],$v['last_name'],$v['email'],
                          $v['password'],$v['bdate'],$v['gender'],$v['admin']);
            return $user;
          }
        }else {
          if (isset($_SESSION['access'])){
            session_destroy();
          }
          header("location:index.php");
        }
      }else {
          echo "User not found!";
      }
    } catch (Exception $e) {
      echo "Connection faild!";
    }


  }
}

 ?>
