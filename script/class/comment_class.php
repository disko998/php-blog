<?php

class Comment
{
  public $commId;
  public $userId;
  public $postId;
  public $text;
  public $isDelete;

  function __construct($userId,$postId,$text)
  {
    $this->userId=$userId;
    $this->postId=$postId;
    $this->text=$text;
  }

  public static function getCommentForId($id)
  {
    try {
      //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
      $conn=Model::GetConnection();
      $res=$conn->query("SELECT * FROM comment WHERE post_id='{$id}' AND deleted=0");
      if ($res) {
        $arr = $res->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
      }else {
          die("Post not found");
      }
    } catch (Exception $e) {
      echo "Connection faild!";
    }
  }

  public function postComment()
  {
    require 'conn_class.php';
    //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
    $conn=Model::GetConnection();
    $res=$conn->exec("INSERT INTO comment(user_id,post_id,text) VALUES($this->userId,$this->postId,'{$this->text}')");
    if ($res) {
      header("location:../home.php");
    }else {
      echo $this->userId." ".$this->postId." ".$this->text;
    }
  }
}
 ?>
