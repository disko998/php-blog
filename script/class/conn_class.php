<?php
class Model
{
  const DBUSER = "root";
  const DBPASS = "";
  const DBHOST = "localhost";
  const DB = "newsdb";
  public static $conn = null;
  public static function GetConnection(){
    if(!self::$conn){
      self::$conn = new PDO("mysql:host=".self::DBHOST.";dbname=".self::DB,self::DBUSER,self::DBPASS);
    }
    return self::$conn;
  }
}
 ?>
