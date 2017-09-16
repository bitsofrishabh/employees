<?php
require 'connect.php';

if(isset($_GET['name']))
{
$name = $_GET["name"];
$title = $_GET["title"];
$manager_id = $_GET["manager_id"];

if(strlen($_GET["id"])==0)
	$sql_query = "insert into employees(name,title,manager_id) VALUES('".$name."','".$title."','".$manager_id."')";
else{
	$sql_query = "update employees set name='".$name."',title='".$title."',manager_id='".$manager_id."' where EID=".$_GET["id"];	
	echo $sql_query;
}
$query_exec = mysql_query($sql_query) or die(mysql_error());

if($query_exec)
{
	header('Location: index.php');
}
else {
	echo 'Not inserted';
}
}
?>