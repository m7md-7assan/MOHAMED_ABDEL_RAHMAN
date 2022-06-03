<?php
namespace app\database\config;  
class Connection {
private $dbhost='localhost';
private $username='root';
private $password='';
private $dbname='e_commerce';
public $con;
public function __construct()
{
    $this->con= new \mysqli($this->dbhost,$this->username,$this->password,$this->dbname);
}
public function __destruct()
{
    $this->con->close();
}
}
?>