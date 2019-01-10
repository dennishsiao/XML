<?php
	$xml=simplexml_load_file("servant.xml");
	if($_POST["action"]=="submit"){
		$x=$xml;
		$x=$xml->addChild("servant");
		$x->addChild("id",$_POST["id"]);
		$x->addChild("name",$_POST["name"]);
		$x->addChild("star",$_POST["star"]);
		$x->addChild("class",$_POST["class"]);
		$x->addChild("maxhp",$_POST["maxhp"]);
		$x->addChild("maxatk",$_POST["maxatk"]);
		$x->addChild("commandcard",$_POST["commandcard"]);
		$x->addChild("NoblePhantasm",$_POST["NoblePhantasm"]);
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
		var b=document.forms["Form"]["name"].value;
		var c=document.forms["Form"]["star"].value;
		var d=document.forms["Form"]["class"].value;
		var e=document.forms["Form"]["maxhp"].value;
		var f=document.forms["Form"]["maxatk"].value;
		var g=document.forms["Form"]["commandcard"].value;
		var h=document.forms["Form"]["NoblePhantasm"].value;
		if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="",f==null || f=="",g==null || g=="",h==null || h=="")
		{
			alert("Please Fill All Required Field");
			return false;
		}
    }
</script>
<div id="wrapper">
	<div id="box">
    	<h1>FGO servant資料-新增</h1>		
		<button type="button" onclick="loadXMLDoc()">顯示servant</button>
		<br><br>
		<table id="demo"></table>
    </div>
    <div id="box">
    	<form method="post"  name="Form" onsubmit="return validateForm()" action="">
        	<h3><a href="index.php">新增servant</a><a> </a><a href="delete.php">刪除servant</a><a> </a><a href="replace.php">修改servant</a><a> </a><a href="search.php">查詢servant</a></h3>
            <label for="id">ID：</label>
            <input type="text" name="id" id="id"><br>
            <label for="name">名稱：</label>
            <input type="text" name="name" id="name"><br>
			<label for="star">星數：</label>
            <input type="text" name="star" id="star"><br>
			<label for="class">職階：</label>
            <input type="text" name="class" id="class"><br>
			<label for="maxahp">最大HP：</label>
            <input type="text" name="maxhp" id="maxhp"><br>
			<label for="maxatk">最大ATK：</label>
            <input type="text" name="maxatk" id="maxatk"><br>
			<label for="commandcard">指令卡：</label>
            <input type="text" name="commandcard" id="commandcard"><br>
			<label for="NoblePhantasm">寶具：</label>
            <input type="text" name="NoblePhantasm" id="NoblePhantasm"><br>
            <input type="submit" value="送出">
            <input type="hidden" name="action" value="submit">
        </form>
    </div>
</div>
</body>
</html>