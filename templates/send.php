<?php

echo "<b>Выберите те фирмы, о новостях которых вы хотите получать сообщения на почту</b><br><br>";

echo "<p style='font-size:20px;'><b>Все фирмы:</b></p>";

echo "<form method='POST' action='login.php'>";

$sections= mysql_query("SELECT * FROM `section`");
while($row = mysql_fetch_array($sections)){
	
	$name=$row['section_name'];
	$id=$row['id'];
	$check="";
	if(mb_strstr ($sections_id, $id)){$check="checked";}
	
	
			echo "<input $check type='checkbox' name='chb[]' value='$id' type='checkbox'><span style='font-size:15px;'><a href='cars.php?firm=$name'>$name</a></span><br>";
	
}

echo "<br><input type='submit' name='submit'  value='Подписаться'><br>";

if($sections_id!=""){
					echo "<br><a href='login.php?sub=no'>Отписаться от всего</a>";
				}else{
					echo "<b>Текущих подписок нет</b>";
				}

echo "</form>";

?>

	
	
	
	