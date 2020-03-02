<?php
class Post
{
public static function getAllPosts()
   {
      try {
        //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
        $conn=Model::GetConnection();
        $res=$conn->query("SELECT * FROM post WHERE deleted=0");
        if ($res) {
          $postArr = $res->fetchAll(PDO::FETCH_ASSOC);
          return $postArr;
        }else {
            echo "Post not found!";
        }
      } catch (Exception $e) {
        echo "Connection faild!";
      }
    }
public static function getSportPosts()
     {
        try {
          //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
          $conn=Model::GetConnection();
          $res=$conn->query("SELECT * FROM post WHERE category_id=1 AND deleted=0");
          if ($res) {
            $postArr = $res->fetchAll(PDO::FETCH_ASSOC);
            return $postArr;
          }else {
              echo "Post not found!";
          }
        } catch (Exception $e) {
          echo "Connection faild!";
        }
      }
public static function getTechPosts()
       {
          try {
            //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
            $conn=Model::GetConnection();
            $res=$conn->query("SELECT * FROM post WHERE category_id=3 AND deleted=0");
            if ($res) {
              $postArr = $res->fetchAll(PDO::FETCH_ASSOC);
              return $postArr;
            }else {
                echo "Post not found!";
            }
          } catch (Exception $e) {
            echo "Connection faild!";
          }
        }
public static function getPoliticsPosts()
         {
            try {
              //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
              $conn=Model::GetConnection();
              $res=$conn->query("SELECT * FROM post WHERE category_id=6 AND deleted=0");
              if ($res) {
                $postArr = $res->fetchAll(PDO::FETCH_ASSOC);
                return $postArr;
              }else {
                  echo "Post not found!";
              }
            } catch (Exception $e) {
              echo "Connection faild!";
            }
          }
public static function getGamingPosts(){
            try {
              //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
              $conn=Model::GetConnection();
              $res=$conn->query("SELECT * FROM post WHERE category_id=7 AND deleted=0");
              if ($res) {
                $postArr = $res->fetchAll(PDO::FETCH_ASSOC);
                return $postArr;
              }else {
                  echo "Post not found!";
              }
            } catch (Exception $e) {
              echo "Connection faild!";
            }
          }
public static function getPostByCategory($id)
{
  switch ($id) {
    case 1:
      return self::getSportPosts();
      break;
    case 3:
      return self::getTechPosts();
      break;
    case 6:
      return self::getPoliticsPosts();
      break;
    case 7:
      return self::getGamingPosts();
      break;
    default:
      return self::getAllPosts();
      break;
  }

}

public static function getAllCatagorys()
   {
      try {
        //$conn = new PDO("mysql:host=localhost;dbname=newsdb","root","");
        $conn=Model::GetConnection();
        $res=$conn->query("SELECT * FROM category");
        if ($res) {
          $catArr = $res->fetchAll(PDO::FETCH_ASSOC);
          return $catArr;
        }else {
            echo "Catagory not found!";
        }
      } catch (Exception $e) {
        echo "Connection faild!";
      }
    }
}


 ?>
