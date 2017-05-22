<?php
session_start();

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("rpba_mizulo_i_radkevich");
mysql_set_charset("utf8");
if(!$connection||!$db){
	exit(mysql_error());
}
if(isset($_POST['name'])&&isset($_POST['cost'])&&isset($_POST['firm'])&&isset($_POST['type'])&&isset($_POST['short_description'])&&isset($_POST['description'])&&isset($_POST['characteristics'])){
	
	$postName=$_POST['name'];
	$postCost=$_POST['cost'];
	$postFirm=$_POST['firm'];
	$postType=$_POST['type'];
	$postShort_description=$_POST['short_description'];
	$postDescription=$_POST['description'];
	$postCharacteristics=$_POST['characteristics'];
	
	
	$proverka=0;
	$result = mysql_query("SELECT * FROM `cars`");
	while($rowProverka = mysql_fetch_array($result)){
								
		$nameProverka=$rowProverka['name'];
		$firm_idProverka=$rowProverka['firm_id'];
		if($nameProverka==$postName&&$firm_idProverka==$postFirm){$proverka=1;}
	}
			
	if($proverka==1){
		echo "<h3 style='padding-left:20px;text-align:center;'>Такой товар уже есть! <a style='cursor:pointer;' href='../login.php'>Вернуться</a></h3>";
	}
	if($proverka==0){
$uploaddir = '../img/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "<h3 style='padding-left:20px;text-align:center;'>Добавлено в бд, <a style='cursor:pointer;' href='../login.php'>вернуться</a></h3>";
	$resultInsert = mysql_query ("INSERT INTO cars(cost, name, firm_id, type_id,characteristics,description,short_description,image) VALUES ('".$postCost."','".$postName."','".$postFirm."','".$postType."','".$postCharacteristics."','".$postDescription."','".$postShort_description."','".$uploadfile."')");
} else {
    echo "<h3 style='padding-left:20px;text-align:center;'>Ошибка!</h3>";
}

	}	

}else{echo "<h3 style='padding-left:20px;text-align:center;'>Вы что-то не заполнили, <a style='cursor:pointer;' href='login.php'>вернуться</a></h3>";}

?>
	
	
	
	