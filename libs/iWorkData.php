<?php
interface iWorkData
{
 public function saveData($key, $val);
 public function getData($key);
 public function deleteData($key);
}
class Cookie implements iWorkData
{
  public function saveData($key, $val)
  {
    SetCookie($key, $val);
  }
  public function getData($key)
  {
    if(isset($_COOKIE[($key)])){
      echo $_COOKIE[($key)];
    }else
    {
      echo "Variable ".$key." delete";
    } 
  }
  public function deleteData($key)
  { 
    $val="";  
    SetCookie($key,$val); 
  }
}
class Session implements iWorkData
{ 
  function saveData($key, $val)
 {
   $_SESSION[$key]=$val;  
 }
 public function getData($key)
 {
  echo  $_SESSION[$key];
  
 }
 public function deleteData($key)
 {
    unset($_SESSION[$key]); 
 }
}  
class Mysql implements iWorkData
{ 
  public function __construct()
  {
    $link = mysql_connect('localhost','user1','tuser1');
   if (!link)
  {
    die('Error connection: '.mysql_error());
  } else
  {
   echo "Success";
  }
   mysql_select_db('user1', $link) or die(mysql_error());

  }
  function saveData($key,$val)
  {
     $query = sprintf("REPLACE INTO MY_TEST VALUES('$key','$val')");
     $result = mysql_query($query);
     if (!$result)
     {
      $message = 'neverniy zapros: ' .mysql_error() . "\n";
      $message .= 'Zapros: ' . $query;
      die($message);
     }
  }
  function getData($key)
  {
   // $query = sprintf("SELECT '$key','$val' FROM MY_TEST WHERE ");  
  }
  function deleteData($key)
  {
  
  }
}
class Pgsql implements iWorkData
{
  function saveData($key,$val)
  {
  
  }
  function getData($key)
  {
  
  }
  function deleteData($key)
  {
  
  }
}





?>
