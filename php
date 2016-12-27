<?php
/**
 * Created by PhpStorm.
 * User: lan
 * Date: 16/12/27
 * Time: 下午2:56
 */

$conn = @mysqli_connect("localhost","root","","html5-7");//@符号是阻止报错信息
if (!$conn) {
    die("连接失败！");
}

$conn->query("set names utf8");

$name = $_POST['name'];
$pwd = md5($_POST['pwd']);
$sql = "SELECT * FROM user WHERE name='{$name}'";
$conn->query($sql);
print $_POST['name'];
if(mysqli_affected_rows($conn)>0){
    echo "用户名已存在";
    exit;
}
$sql = "INSERT INTO user(name,pwd) VALUES ('{$name}','{$pwd}')";
$conn->query($sql);
if(mysqli_affected_rows($conn)>0){
    echo "注册成功";
}else{
    echo "注册失败";
}
