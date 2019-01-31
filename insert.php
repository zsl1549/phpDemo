<?php
 header("Content-type: text/html; charset=utf-8");//设置编码
// header('Content-Type: text/plain; charset=UTF-8');

 // echo "System Environment:<br/><hr>";
  // echo phpinfo();
//   echo getenv('PATH'); //localhost

$MYSQL_USER=getenv('MYSQL_USER');

  if($MYSQL_USER){
$MYSQL_HOST = getenv('MYSQL_HOST');
$MYSQL_PORT = getenv('MYSQL_PORT');
$MYSQL_USER=getenv('MYSQL_USER');
$MYSQL_PASSWORD = getenv('MYSQL_PASSWORD');
$MYSQL_DATABASE = getenv('MYSQL_DATABASE');

// 创建连接
// $con = new mysqli($MYSQL_HOST:$MYSQL_PORT,$MYSQL_USER,$MYSQL_PASSWORD,$MYSQL_DATABASE) or die("数据库连接失败");
$con = new mysqli(`$MYSQL_HOST:$MYSQL_PORT`,$MYSQL_USER,$MYSQL_PASSWORD);
// 检测连接
        if ($con->connect_error) {
            die("连接失败: " . $con->connect_error);
        }else{
            echo "连接成功";
        } 
  }else{
    echo "没有Mysql";
  }

// foreach ($_ENV as $key => $value) {
//   echo "{$key}: {$value}<br/>";
// }
$servername = "localhost:3316";
$username = "root";
$password = "rainbond";

// 创建连接
 $con = new mysqli($servername,$username,$password, "test") or die("数据库连接失败");
 //添加操作
 $api = $_POST['code'];
     $sql = "INSERT INTO people (name) VALUES ('{$api}')";
if ($con->query($sql) === TRUE) {
    echo json_encode("api".$api."插入成功");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();