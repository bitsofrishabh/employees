<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Code challenge</title>
<link href="design.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//netsh.pp.ua/upwork-demo/1/js/typeahead.js"></script>
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
<?php
$nameErr = $titleErr = $managerErr = "";
$name = isset($_GET["name"]) ? $_GET["name"] : "";
$title = isset($_GET["title"]) ? $_GET["title"] : "";
$manager = isset($_GET["manager"]) ? $_GET["manager"] : "";
$manager_id = isset($_GET["manager_id"]) ? $_GET["manager_id"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
?>
<h2 align="center">Enter Employees Details</h2>
<form action="save.php"  method="GET" align ="center">
<input type="hidden" id="id" name="id" value="<?php echo $id;?>"/>
<p><strong>NAME:-</strong><input type="text" name="name" placeholder="Name" value="<?php echo $name;?>" required/><br><br>
<strong>TITLE:-</strong><input type="text" name="title" placeholder="Designation" value="<?php echo $title;?>" required/><br><br>
<strong>MANAGER:-</strong><input type="text" id="manager" name="manager" placeholder="Manager" autocomplete="off"  value="<?php echo $manager;?>" required />
<input type="hidden" id="manager_id" name="manager_id" value="<?php echo $manager_id; ?>"/><br><br>
<input type="submit" value="ADD" /></p>

</form>

<?php
require 'connect.php';
$query_search = "select eid, name from employees";
$query_exec = mysql_query($query_search) or die(mysql_error());
$results = array();
while($row = mysql_fetch_array($query_exec))
{
   $results[] = array(
      'label' => $row['name'],
      'eid' => $row['eid'],
      'name' => $row['name']
   );
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
var employees = <?php echo json_encode($results); ?>;
$(document).ready(function(){
console.log(employees);
  $("#manager").autocomplete({
    source: employees,
    select: function(event, ui) {
            setManager(ui.item.eid, ui.item.name);
            }
    });
});
function setManager(eid, name){
console.log("Selected manager:"+name);
$('#manager_id').val(eid);
}
</script>
<style type="text/css">
  .ui-menu-item {
    color: black;
    border-radius: 0px;
    border: 0.5px solid #454545;


    display: block;
    padding: 5px 5px;
    position: relative;
    
    float: bottom;
    max-width: 250px;
    background-color: white;
   border-color: #45a049;
  

  }
  input[type=text], select {
    width: 300px;
    padding: 8px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

  }
  input[type=submit] {
    width: 300px;
    background-color: #4CAF50;
    color: white;
    padding: 8px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
 
</style>

</div>    
</body>


</html>

