<?php
namespace Imie\Models;

abstract class MyPdo{
  const PREFIX = "mysql:";
  const HOST = "127.0.0.1";
  const PORT = "3306";
  const DB = "tele";
  const LOGIN = "root";
  const PWD = "imie";

  public static function getPdo(){
    // mysql:host=127.0.0.1;port=3306;dbname=tele

    $dsn = self::PREFIX . "host=" . self::HOST  . ";port="  . self::PORT . ";dbname=" . self::DB;
    try{
      $pdo = new \PDO($dsn, self::LOGIN, self::PWD);
      $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    catch(\PDOException $e){
      header('Location: error.php');
    }

    return $pdo;
  }

}
