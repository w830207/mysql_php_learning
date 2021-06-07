<?php
	error_reporting(E_ALL);
	ini_set("display_errors","On");

	$method = $_POST["method"];
	
	$pname = addslashes($_POST["pname"]);	//ddslashes()防止SQL Injection
	$pid = addslashes($_POST["pid"]);
	$bid = addslashes($_POST["bid"]);
	$loan = addslashes($_POST["loan"]);
	$payyear = addslashes($_POST["payyear"]);
	$pphone = addslashes($_POST["pphone"]);
	
	$db_link = mysqli_connect("localhost", "root", "1234","workbank") or die("MySQL 伺服器連結失敗 <br>");
	
	if ($method == "insert"){	//單選判斷要進行什麼操作 新增/修改/刪除
		$sql_query= "INSERT INTO `plan` (`pname`, `pid`, `bid`, `loan`, `payyear`, `pphone`) VALUES ('$pname','$pid','$bid','$loan','$payyear','$pphone')";
		$result = mysqli_query($db_link,$sql_query) or die("新增失敗  <br>");
	}
	if ($method == "update"){
		$sql_query= "UPDATE `plan` SET pname ='$pname',bid ='$bid',loan ='$loan',payyear ='$payyear',pphone ='$pphone' WHERE pid ='$pid'";
		$result = mysqli_query($db_link,$sql_query) or die("修改失敗  <br>");
	}
	if ($method == "delete"){
		$sql_query= "DELETE FROM `plan` WHERE pid ='$pid'";
		$result = mysqli_query($db_link,$sql_query) or die("刪除失敗  <br>");
	}
	
	$sql_query = "select * from plan";
	$result = mysqli_query($db_link,$sql_query) or die("SQL  <br>");
 
	while($row = mysqli_fetch_array($result))	//列出該表所有資料
	{
	echo $row['pname']."<br>";
	echo $row['pid']."<br>";
	echo $row['bid']."<br>";
	echo $row['loan']."<br>";
	echo $row['payyear']."<br>";
	echo $row['pphone']."<br><br>";
	}
?>