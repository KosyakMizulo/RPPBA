<?php require_once ("templates/top.php"); ?>


<!-- Our Services======================================== -->
<div id="ourServices"> 	
<div class="container">	
				
      <p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px; font-weight: bold;color: black; float:left;'>Поиск по цене:</p>

	<form method="post" action="cars.php" style='float:left;'>
				
				
				<p style='padding:0px 0 2px 0;margin:3px 5px 0px 0px; color: black; float:left;'>Стартовая цена: <input style="padding:0px 5px 0px 5px;" name="start_price">
				
	
				Конечная цена: <input style="padding:0px 5px 0px 5px;" name="end_price">
				
				
				<input style="padding:0px 5px 0px 5px;" class="send" type="submit" value="поиск"></p>
				</form>      
      
	<?php 
	
	if((isset($_POST['start_price']))&&(isset($_POST['end_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))){
		$start_price=$_POST['start_price'];
		$end_price=$_POST['end_price'];
		if($start_price>$end_price){
			$start_price=0;
		}
	}
	if((!isset($_POST['end_price']))&&(isset($_POST['start_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))){
		$end_price=9999999;
		$start_price=$_POST['start_price'];
	}
	if((!isset($_POST['start_price']))&&(isset($_POST['end_price']))&&(preg_match("|^[\d]*$|",$_POST['end_price']))){
		$start_price=0;
		$end_price=$_POST['end_price'];
	}
	
	?>
	  
      <div style=" width:100%; height:1px; clear:both"></div>
	  
	  <p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px;; font-weight: bold;color: black; float:left;'>Поиск по фирме:</p>
	  
	  <?php 
	  
		$sections= mysql_query("SELECT * FROM `section`");
	  
		while($rowSection = mysql_fetch_array($sections)){
			
		$section_name=$rowSection['section_name']; 
		
		echo "<a href='cars.php?firm=$section_name' style='padding:2px 5px 2px 5px;border: 2px solid black;margin:5px; border-radius: 3px; font-size:13px; font-weight: bold;texpt-decoration:none; color: black; float:left;'>".$section_name."</a>";

		}
		?>
		
	  <a href='cars.php' style='padding:2px 5px 2px 5px;border: 2px solid black;margin:5px; border-radius: 3px; font-size:13px; font-weight: bold;texpt-decoration:none; color: black; float:left;'>Показать все</a>
	  
	  <div style=" width:100%; height:1px; clear:both"></div>
	  
	  <p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px;; font-weight: bold;color: black; float:left;'>Поиск по типу:</p>
	  
	  <?php 
	  
		$types= mysql_query("SELECT * FROM `type`");
	  
		while($rowTypes = mysql_fetch_array($types)){
			
		$type=$rowTypes['type']; 
		$type_id=$rowTypes['id']; 
		
		echo "<a href='cars.php?type=$type' style='padding:2px 5px 2px 5px;border: 2px solid black;margin:5px; border-radius: 3px; font-size:13px; font-weight: bold;texpt-decoration:none; color: black; float:left;'>".$type."</a>";

		}
		?>
		
	  <a href='cars.php' style='padding:2px 5px 2px 5px;border: 2px solid black;margin:5px; border-radius: 3px; font-size:13px; font-weight: bold;texpt-decoration:none; color: black; float:left;'>Показать все</a>
	  
	  <?php 
	
	$i=0;
	$o=0;
	$c=0;
	
	if(isset($start_price)&&isset($end_price)){
		$cars= mysql_query("SELECT * FROM `cars` WHERE (cost>='".$start_price."' AND cost<='".$end_price."') ORDER BY cost");
	}else{
		$cars= mysql_query("SELECT * FROM `cars`  ORDER BY cost");
	}
	
	
	
	while($row = mysql_fetch_array($cars)){
		
		$id=$row['id'];
		$firm_id=$row['firm_id'];
		$type_id=$row['type_id'];
		$name=$row['name'];
		$image=$row['image'];
		$cost=$row['cost'];
		$short_description=$row['short_description'];
		$description=$row['description'];
		$characteristics=$row['characteristics'];
		
		$firms= mysql_query("SELECT * FROM `section`");
		
		while($rowFirm = mysql_fetch_array($firms)){
			
		$section_name=$rowFirm['section_name']; 

		if(isset($_GET['firm'])&&$_GET['firm']==$section_name){
			$o=$o+1;
		}
		}
		
		if($o>0){
			$section= mysql_query("SELECT * FROM `section` WHERE (id='".$firm_id."' AND section_name='".$_GET['firm']."')");
		}else{
			$section= mysql_query("SELECT * FROM `section` WHERE id=".$firm_id);
		}
		
		while($rowSection = mysql_fetch_array($section)){
			
			$section_name=$rowSection['section_name'];
			
			$types= mysql_query("SELECT * FROM `type`");
			
			while($rowTyper = mysql_fetch_array($types)){
			
			$type=$rowTyper['type']; 

			if(isset($_GET['type'])&&$_GET['type']==$type){
				$c=$c+1;
			}
			}
			
			if($c>0){
				$typer= mysql_query("SELECT * FROM `type` WHERE (id='".$type_id."' AND type='".$_GET['type']."')");
			}else{
				$typer= mysql_query("SELECT * FROM `type` WHERE id=".$type_id);
			}
			
			
		
			while($rowType = mysql_fetch_array($typer)){
				
				$type=$rowType['type'];
				
				if($i==0){echo "<div class='row'>";}
				if($i%3){}else{echo "</div><div class='row'>";}
				
				
				?>
				
				<div class="col-md-4 col-xs-12">
				<div class="info-img"><img style="width:167px;height:144px;" src="<?php echo $image; ?>" ></div>
				<h4><b><?php echo $name; ?></b></h4>
				<p><?php echo $short_description; ?></p>
				<p style="color:red;font-weight:bold;"><?php echo $cost; ?>$</p>
				<a href="cars_about.php?id=<?php echo $id; ?>" class="car_watch">Посмотреть</a><br><br>
				</div>

				<?php

				$i=$i+1;
				
			}
		}
	}

			?>
	  
</div>
</div>
</div>        
</div> 
 <?php require_once ("templates/bottom.php"); ?> 