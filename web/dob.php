<?php
	error_reporting(E_ALL);
	ini_set("display_errors","On");

	$method = $_POST["method"];
	
	$bname = addslashes($_POST["bname"]);	
	$bid = addslashes($_POST["bid"]);
	$mname = addslashes($_POST["mname"]);
	$mdate = addslashes($_POST["mdate"]);
	$addr = addslashes($_POST["addr"]);
	
	$db_link = mysqli_connect("localhost", "root", "1234","workbank") or die("MySQL 伺服器連結失敗 <br>");
	
	if ($method == "insert"){	//單選判斷要進行什麼操作 新增/修改/刪除
		$sql_query= "INSERT INTO `branch` (`bname`, `bid`, `mname`, `mdate`, `addr`) VALUES ('$bname','$bid','$mname','$mdate','$addr')";
		$result = mysqli_query($db_link,$sql_query) or die("新增失敗 <br>");
	}
	if ($method == "update"){
		$sql_query= "UPDATE `branch` SET bname ='$bname',bid ='$bid',mname ='$mname',mdate ='$mdate',addr ='$addr' WHERE bid ='$bid'";
		$result = mysqli_query($db_link,$sql_query) or die("修改失敗  <br>");
	}
	if ($method == "delete"){
		$sql_query= "DELETE FROM `branch` WHERE bid ='$bid'";
		$result = mysqli_query($db_link,$sql_query) or die("刪除失敗  <br>");
	}
	

	$sql_query = "select * from branch";
	$result = mysqli_query($db_link,$sql_query) or die("SQL  <br>");

 
	while($row = mysqli_fetch_array($result))	//列出該表所有資料
	{
	echo $row['bname']."<br>";
	echo $row['bid']."<br>";
	echo $row['mname']."<br>";
	echo $row['mdate']."<br>";
	echo $row['addr']."<br><br>";
	}
?>