<?php
	error_reporting(E_ALL);
	ini_set("display_errors","On");

	$method = $_POST["method"];
	
	$cname = addslashes($_POST["cname"]);	//ddslashes()防止SQL Injection
	$cid = addslashes($_POST["cid"]);
	$rname = addslashes($_POST["rname"]);
	$cphone = addslashes($_POST["cphone"]);
	
	$db_link = mysqli_connect("localhost", "root", "1234","workbank") or die("MySQL 伺服器連結失敗 <br>");
	
	if ($method == "insert"){	//單選判斷要進行什麼操作 新增/修改/刪除
		$sql_query= "INSERT INTO `client` (`cname`, `cid`, `rname`, `cphone`) VALUES ('$cname','$cid','$rname','$cphone')";
		$result = mysqli_query($db_link,$sql_query) or die("新增失敗  <br>");
	}
	if ($method == "update"){
		$sql_query= "UPDATE `client` SET cname ='$cname',cid ='$cid',rname ='$rname',cphone ='$cphone' WHERE cid ='$cid'";
		$result = mysqli_query($db_link,$sql_query) or die("修改失敗  <br>");
	}
	if ($method == "delete"){
		$sql_query= "DELETE FROM `client` WHERE cid ='$cid'";
		$result = mysqli_query($db_link,$sql_query) or die("刪除失敗  <br>");
	}
	

	$sql_query = "select * from client";
	$result = mysqli_query($db_link,$sql_query) or die("SQL  <br>");

 
	while($row = mysqli_fetch_array($result))	//列出該表所有資料
	{
	echo $row['cname']."<br>";
	echo $row['cid']."<br>";
	echo $row['rname']."<br>";
	echo $row['cphone']."<br><br>";
	}
?>