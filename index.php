<?php require_once ("templates/top.php"); ?>

<div id="carouselSection" class="cntr"> 
		<div id="myCarousel" class="carousel slide">
		
			<div class="carousel-inner">
				<div class="item active">
					<a class="cntr" href="#"><img src="img/1.png" alt=""></a>
				</div>
				
				<div class="item">
					<a class="cntr" href="#"><img src="img/2.png" alt=""></a>
				</div>
				
				
			</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
</div>


<!-- Blog Section -->
<div id="blogSection">
 
 <div class="container">
			<h1 style="text-align:center; color:red; font-size:320%;">Мы являемся официальными представителя брендов BMW и MAZDA в Минске.</h1><br><br>
			
			
			
			
	<?php 
	
	$information= mysql_query("SELECT * FROM `information`  ORDER BY id");
	
	while($row = mysql_fetch_array($information)){
		
		$section_id=$row['section_id'];
		$id=$row['id'];
		$text=$row['text'];
		$image=$row['image'];

		$section= mysql_query("SELECT * FROM `section` WHERE id=".$section_id);
		
		while($rowSection = mysql_fetch_array($section)){
			
			$section_name=$rowSection['section_name'];
		
		if($id%2){
			if($id!=1){echo"<hr class='soften clear'/>";}
			?>
			
			
			<div class="row">	
		
        
        <div class="col-lg-8 col-md-12">
		
		<div class="inner">
		<h1><?php echo $section_name; ?></h1>
		<p><?php echo $text; ?></p>
        
       
		</div>
        
        </div>
        
        <div class="col-lg-4 col-md-12">
          <img class="r-image" src="<?php echo $image; ?>" alt="" />
        </div>
        
   </div>
			<?php 
		}
		else{
			?>
			
        <hr class="soften clear"/>
    <div class="row">	
		
        <div class="col-lg-4 col-md-12">
          <img class="r-image" src="<?php echo $image; ?>" alt="" />
        </div>
        
        <div class="col-lg-8 col-md-12">
        
		<div class="inner">
		<h1><?php echo $section_name; ?></h1>
		<p><?php echo $text; ?></p>
      
		</div>
        
        </div>
        
       
        
   </div>    
			<?php
		}
		}
	}	
	
	?>		
			
	
	
   
        
        
			
   
	</div>
</div>


<?php require_once ("templates/bottom.php"); ?> 
 