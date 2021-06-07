
<?php 
	error_reporting(E_ALL);
	ini_set("display_errors","On");
	
	$id = addslashes($_POST["value"]);	//ddslashes()防止SQL Injection
	$method = $_POST["method"];
	
	if ($method == "branch"){	//判斷單選的選擇對象
		$sql_query = "select * from branch where bid = $id";
		$fields = array("分行名稱","分行代碼","經理名", "經理上任日","地址");
	}
	if ($method == "client"){
		$sql_query = "select * from client where cid = $id";
		$fields = array("客戶名稱","客戶編號","負責人名稱", "客戶電話");
	}
	if ($method == "plan"){
		$sql_query = "select * from plan where pid = $id";
		$fields = array("計劃名稱","計劃編號","所屬分行", "貸款金額","年付金額","聯絡電話");
	}

	$db_link = mysqli_connect("localhost", "root", "1234","workbank") or die("MySQL 伺服器連結失敗 <br>"); //連線到資料庫
	
	$result = mysqli_query($db_link,$sql_query) or die('MySQL query error'); 
	
	
	while($row=mysqli_fetch_row($result)) { 	//逐行列出結果
		for($j=0; $j<mysqli_num_fields($result); $j++) {
			echo "$fields[$j] = $row[$j] <BR>"; 
		} 
		echo "<BR>"; 
	}
	mysqli_close($db_link); 
?> 