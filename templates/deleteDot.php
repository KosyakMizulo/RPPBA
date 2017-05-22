<?php 


$arr = explode('.', $sections_id); 

$result = count($arr);

$sections= mysql_query("SELECT * FROM `section`");

while($row = mysql_fetch_array($sections)){
	$id=$row['id'];
	$name=$row['section_name'];
	for($counter=0;$counter<$result;$counter++){
		if($id==$arr[$counter]){
			echo "<span style='font-size:15px; padding: 5px; float:left;'>".$name."</span>";
		}
	}
}

?>
	
	
	
	