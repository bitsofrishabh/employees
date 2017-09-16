<!DOCTYPE html>
<html>
<head>
	<title>Tree Hierarchy</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(function(){
      $("#includedContent").load("header.html"); 
    });
</script>
</head>
<body>
<div id ="includedContent"></div>
</body>
</html>
<style type="text/css">
	ul {
    list-style-type: none;
	}
</style>
<?php 
  require 'connect.php';

  function nested_employees($employee, $depth){
    echo "<ul>";
    $tag = $employee['name']." (".$employee['title'].")";
    echo str_repeat('=',$depth)."> "."<a href=\"user.php?id=".$employee['id']."&name=".$employee['name']."&title=".$employee['title']."&manager=".$employee['manager']."&manager_id=".$employee['manager_id']."\">".$tag."</a>";
    
    for($i=0;$i<count($employee['tree']);$i++){
		echo "<li>".nested_employees($employee['tree'][$i], $depth+1)."</li>";
	}
    echo "</ul>";    
  }

  function tree($manager_id){
  	$query = "select eid, name, title, manager_id as 'managerid', (select name from employees where eid=managerid) as 'manager' from employees where manager_id=".$manager_id;
	$res = mysql_query($query) or die(mysql_error());
  	$rows = mysql_num_rows($res);
	$tree = array();
  	if($rows>0)
	{
	$i=0;
	  while($i<$rows)
	  {
	 	$child = array();
	 	$child['id'] = mysql_result($res, $i, 'eid');
	 	$child['name'] = mysql_result($res, $i, 'name');
	 	$child['manager'] = mysql_result($res, $i, 'manager');
	  	$child['title'] = mysql_result($res, $i, 'title');
	 	$child['manager_id'] = mysql_result($res, $i, 'managerid');
	 	$child['tree'] = tree($child['id']);
	 	array_push($tree, $child);
		$i++;
	  }
	}
	return $tree;
  }

  $employee_heads = tree(0);
?>
<h1>Employees</h1>
<ul>
<?php
	for($i=0;$i<count($employee_heads);$i++){
		echo "<li>".nested_employees($employee_heads[$i], 1)."</li>";
	}
?>
<ul>
