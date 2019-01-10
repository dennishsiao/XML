<?php
	$xml=simplexml_load_file("servant.xml");
	if($_POST["action"]=="submit"){	
		$count = 0;
		foreach($xml as $servant)
		{
			if($servant->id == $_POST["id"]) {
				unset($xml->servant[$count]);
			}
			$count++;
		}
		$xml->asXML("servant.xml");
		header("Refresh:0");
	}
?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse:collapse;
}
th, td {
  padding: 5px;
}
</style>
<meta charset="utf-8">
<title>FGO servant資料</title>
</head>
<body>
<script>
function loadXMLDoc() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xmlhttp.open("GET", "servant.xml", true);
  xmlhttp.send();
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<tr><th>ID:</th><th>名稱:</th><th>星數:</th><th>職階:</th><th>最大血量:</th><th>最大攻擊力:</th><th>指令卡:</th><th>寶具:</th></tr>";
  var x = xmlDoc.getElementsByTagName("servant");
  for (i = 0; i <x.length; i++) { 
    table += "<tr><td>" +
    x[i].getElementsByTagName("id")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("star")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("class")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("maxhp")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("maxatk")[0].childNodes[0].nodeValue +
    "</td><td>" +
	x[i].getElementsByTagName("commandcard")[0].childNodes[0].nodeValue +
    "</td><td>" +
    x[i].getElementsByTagName("NoblePhantasm")[0].childNodes[0].nodeValue +
    "</td></tr>";
  }
  document.getElementById("demo").innerHTML = table;
}
	function validateForm()
    {
		var a=document.forms["Form"]["id"].value;
		if (a==null || a=="")
		{
			alert("Please Fill All Required Field");
			return false;
		}
    }
</script>
<div id="wrapper">
	<div id="box">
    	<h1>FGO servant資料-刪除</h1>		
		<button type="button" onclick="loadXMLDoc()">顯示servant</button>
		<br><br>
		<table id="demo"></table>
    </div>
    <div id="box">
    	<form method="post">
        	<h3><a href="index.php">新增servant</a><a> </a><a href="delete.php">刪除servant</a><a> </a><a href="replace.php">修改servant</a><a> </a><a href="search.php">查詢servant</a></h3>
            <label for="id">要刪除的servant ID：</label>
            <input type="text" name="id" id="id"><br>
            <input type="submit" value="送出">
            <input type="hidden" name="action" value="submit">
        </form>
    </div>
</div>
</body>
</html>