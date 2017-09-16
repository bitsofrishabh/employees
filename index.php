<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Code challenge</title>
<link href="design.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(function(){
      $("#includedContent").load("header.html"); 
    });
</script>
</head>
<body>
<div id ="includedContent"></div>

<div id="content">
<h3>ALL EMPLOYEES</h3>
<div id="link">
<a href="form.php">Add Employees</a>
 </div> 
<table class="table table-bordered">
  <thead>
    <tr class="info">
      <th>E.ID</th>
      <th>Name</th>
      <th>Title</th>
      <th>Manager</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
require 'connect.php';
$query_search = "select eid, name, title, manager_id as 'managerid', (select name from employees where managerid=eid) as 'manager' from employees";
$query_exec = mysql_query($query_search) or die(mysql_error());
$rows = mysql_num_rows($query_exec);
if($rows>0)
{
$i=0;
 while($i<$rows)
 {
  	echo "<tr>";
  	echo "<td>".mysql_result($query_exec, $i, 'eid')."</td>";
  	echo "<td>".mysql_result($query_exec, $i, 'name')."</td>";
  	echo "<td>".mysql_result($query_exec, $i, 'title')."</td>";
  	echo "<td>".mysql_result($query_exec, $i, 'manager')."</td>";
  	echo "<td><a href=\"user.php?id=".mysql_result($query_exec, $i, 'eid')."&name=".mysql_result($query_exec, $i, 'name')."&title=".mysql_result($query_exec, $i, 'title')."&manager=".mysql_result($query_exec, $i, 'manager')."&manager_id=".mysql_result($query_exec, $i, 'managerid')."\">View</a></td>";
  	echo "</tr>";
 $i++;
 }
}
?>
</tbody>
</table>


</div>    
</body>


</html>

