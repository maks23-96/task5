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
   echo "Connect to MySql DB success";
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
     }else
     {
      echo "Query Success";
     }
  }
  function getData($key)
  {
    // $query = sprintf("SELECT '$key' FROM MY_TEST WHERE data='user5'");
    // $result = mysql_query($query);
    // if (!$result)
    // {
    //  $message = 'neverniy zapros: ' .mysql_error() . "\n";
    //  $message .= 'Zapros: ' . $query;
    //  die($message);
    // }  else
    // {
    //    echo "Query success";
    //    echo $result;
    // }
  }
  function deleteData($key)
  {
   $query =  printf("DELETE FROM MY_TEST WHERE key='user5'");
   $result = mysql_query($query);
   if (!$result)
     {
       $message = 'neverniy zapros: ' .mysql_error() . "\n";
       $message .= 'Zapros: ' . $query;
       die($message);
     }
  }
}
class Pgsql implements iWorkData
{
  public function __construct()
      {
      $link = pg_connect("host=localhost dbname=user1 user=user1 password=tuser1");
      if (!link)
       {
      die('Error connection');
      } else
      {
      echo "Success";
    }
      }
  function saveData($key,$val)
  {
    $query = ("INSERT INTO MY_TEST VALUES('$key','$val')");
     $result = pg_query($link,$query);
     if (!$result)
    {
     $message = 'neverniy zapros' . "\n";
     $message .= 'Zapros: ' . $query;
     die($message);
    }
  }
  function getData($key)
  {
  
  }
  function deleteData($key)
  {
  
  }
}





?>
