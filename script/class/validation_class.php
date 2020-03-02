<?php
class validForm
{
  public static function validAll($fname,$lname,$email,$pass,$bdate,$gender)
  {
    if (self::validName($fname) && self::validName($lname) && self::validEmail($email)&&
        self::validPass($pass)&& self::validBdate($bdate) && self::validGende($gender)){
          return true;
    }else{return false;}
  }
  public static function validName($s)
  {
    $len=strlen($s);
    if ($s=="" || $len<2 || $len>20) {
      return false;
    }
    if (!ctype_alpha($s)) {
      return false;
    }
    return true;
  }
  public static function validEmail($s)
  {
    $len=strlen($s);
    if ($s=="" || $len>40) {
      return false;
    }
    if (!filter_var($s,FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    return true;
  }
  public static function validPass($s)
  {
    $len=strlen($s);
    if ($s=="" || $len<6 || $len>30) {
      return false;
    }
    return true;
  }
  public static function validBdate($s)
  {
    $len=strlen($s);
    if ($s=="" && !(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$s))) {
      return false;
    }
    $arr=explode('-',$s);
    $date=mktime(0,0,0,$arr[1],$arr[2],$arr[0]);
    $year=date('Y',$date);
    $age=date('Y')-$year;
    if ($age<18) {
      return false;
    }
    return true;
  }
  public static function validGende($s)
  {
    $len=strlen($s);
    if ($s=="" || $len!=1) {
      return false;
    }
    if ($s!=='m' && $s!=='f') {
      return false;
    }
    return true;
  }
  public static function clear($p)
  {
   $p = str_replace("<","",$p);
   $p = str_replace(">","",$p);
   return $p;
  }
}


 ?>
