<?php
/**
 * Created by PhpStorm.
 * User: jm
 * Date: 2019/1/30
 * Time: 17:26
 */
header("Content-type: text/html; charset=utf-8");//设置编码
$servername = "localhost:3316";
$username = "root";
$password = "rainbond";
$con = new mysqli($servername,$username,$password, "test") or die("数据库连接失败");

$sql="select * from demo";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        $apis=array();
        $apis['people'] = $row["people"];
        array_push($apis, $row["people"]);

        echo  json_encode($apis);
    }
} else {
    echo "0 结果";
}
$con->close();
