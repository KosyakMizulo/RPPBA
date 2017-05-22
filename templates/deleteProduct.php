<?php
session_start();

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("rpba_mizulo_i_radkevich");
mysql_set_charset("utf8");
if(!$connection||!$db){
	exit(mysql_error());
}
if(isset($_POST['name'])&&isset($_POST['firm'])){
	
	$postName=$_POST['name'];
	$postFirm=$_POST['firm'];
		
	$proverka=0;
	$result = mysql_query("SELECT * FROM `cars`");
	while($rowProverka = mysql_fetch_array($result)){
								
		$nameProverka=$rowProverka['name'];
		$firm_idProverka=$rowProverka['firm_id'];
		if($nameProverka==$postName&&$firm_idProverka==$postFirm){$proverka=1;}
	}
			
	if($proverka==1){
		
		$sql = mysql_query("DELETE FROM cars WHERE (name='".$postName."' && firm_id='".$postFirm."')");
		
		echo "<h3 style='padding-left:20px;text-align:center;'>Автомобиль удалён! <a style='cursor:pointer;' href='../login.php'>Вернуться</a></h3>";
	}
	if($proverka==0){
		
		echo "<h3 style='padding-left:20px;text-align:center;'>Такого авто нет в базе данных! <a style='cursor:pointer;' href='../login.php'>Вернуться</a></h3>";

	}	

}else{echo "<h3 style='padding-left:20px;text-align:center;'>Вы что-то не заполнили, <a style='cursor:pointer;' href='login.php'>вернуться</a></h3>";}

?>
	
	
	
	