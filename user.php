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

<p align="center"><strong>Name :</strong><?php echo $_GET["name"] ?></p>
<p align="center"><strong>Title :</strong><?php echo $_GET["title"] ?></p>
<p align="center"><strong>Manager :</strong><?php echo $_GET["manager"] ?></p>
<p align="center"> <?php
echo "<a href=\"form.php?id=".$_GET["id"]."&name=".$_GET["name"]."&title=".$_GET["title"]."&manager=".$_GET["manager"]."&manager_id=".$_GET["manager_id"]."\">Edit</a>"
?>
</p>

</div>    
</body>


</html>

