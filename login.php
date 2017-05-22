<?php require_once ("templates/top.php"); ?>
<div id="ourServices"> 	
<div class="container">	
				<div class="row">

<?php 
			
			if(isset($_POST['select'])&&isset($_POST['message'])){
				echo $_POST['select']."<br>".$_POST['message'];
				require_once ("templates/subs.php");
				
			}
			
			if(isset($_GET['a'])&&$_GET['a']=="exit"){
				unset($_SESSION["user_id"]);
			}
			
			if(isset($_GET['sub'])&&$_GET['sub']=="no"&&isset($_SESSION['user_id'])){
				$resultUnsub = mysql_query ("UPDATE `subscribers` SET sections_id='' WHERE id=".$_SESSION['user_id']);
			}
			
			if((isset($_POST['email'])&&isset($_POST['password']))||isset($_SESSION['user_id'])){ 
			
			if(!isset($_SESSION['user_id'])){
			$postPassword=$_POST['password'];
			$postEmail=$_POST['email'];

			$result= mysql_query("SELECT * FROM `subscribers`");
			
			$proverka=0;
			$id=999999999;
			
			while($row = mysql_fetch_array($result)){
								
				$email=$row['email'];
				$password=$row['password'];

				if($email==$postEmail&&$postPassword==$password&&$row['id']!=0){$proverka=1;$id=$row['id'];}else if($email==$postEmail&&$postPassword==$password&&$row['id']==0){$proverka=2;$id=0;}
				
				
			}
			}else{if($_SESSION['user_id']!=0){$proverka=1;$id=$_SESSION['user_id'];}else {$proverka=2;$id=$_SESSION['user_id'];}}
			
			
			
			if($proverka==2){
				
				$_SESSION['user_id'] = $id;
				
				echo"здравствуйте, админ!";echo "<a style='cursor:pointer; float:right;' href='login.php?a=exit'>выйти</a>";
				require_once ("templates/admin.php"); 
				
				?>
					<form action= "login.php" method= "POST"> 
									  
						<p style='text-align:center; padding:1%; font: bold 18px sans-serif;'>Выберите название фирмы</p>  
						<select	style='outline: none; float:right; width:96%; padding:1%; margin-right:2%; border: 3px solid black; border-radius: 3px; font-size:17px; color:gray;' 
						name='select'>
										
						
									
						<?php
							
							$sections= mysql_query("SELECT * FROM `section`");
							while($row = mysql_fetch_array($sections)){
								
								$name=$row['section_name'];
								
								$idSection=$row['id'];
								
								echo "<option value=".$idSection.">$name</option>";
								
							}			
							

						?>	
									
						</select>
									  
						<div style=" width:100%; height:1px; clear:both"></div>
											
						<p style='text-align:center; padding:1%; font: bold 18px sans-serif;'>И введите текст рассылки</p>
								
						<div style="text-align: center;">
							<textarea  style="outline: none; width:96%; padding:1%; border: 3px solid black; border-radius: 3px; font-size:17px;" placeholder="Текст рассылки" rows= "7" name= "message"></textarea></p> 
												
							<input style="outline: none; border: 2px solid black; padding:10px; border-radius: 3px; font: bold 18px sans-serif; background: white; " class="col" style="" type= "submit" value= "Разослать">
						
						</div>
					</form>
				<?php
			}
			
			if($proverka==1){
				
				$_SESSION['user_id'] = $id;
				
				$resultSub= mysql_query("SELECT * FROM `subscribers` WHERE id=".$_SESSION['user_id']);
				
				while($rowSub = mysql_fetch_array($resultSub)){			
				$sections_id=$rowSub['sections_id'];
				$name=$rowSub['name'];
				}
				
				echo "<h3 style='text-align:center;'>Здравствуйте ".$name.", добро пожаловать в личный кабинет</h3>";
				
				echo "<a style='cursor:pointer; float:right;' href='login.php?a=exit'>выйти</a>";
				
				require_once ("templates/send.php");
				
				
				
				
				
				
			}else if($proverka!=2){echo "<h3 style='padding-left:20px;text-align:center;'>Вы ввели некорректные данные</h3>";}
			}
			
			if (isset($_POST['chb'])){
				require_once ("templates/idByDot.php");
				$resultUpdates = mysql_query ("UPDATE `subscribers` SET sections_id='".$text."' WHERE id=".$_SESSION['user_id']);
				?>
<script>
	document.location.href='login.php';
</script>
				<?php
			} 

			
			if(!isset($_SESSION['user_id'])&&!isset($_POST['name'])&&!isset($_POST['surname'])&&!isset($_POST['email'])&&!isset($_POST['password'])){
			?>
				<p style="font-weight: bold;text-align: center; font-size:19px;">Введите ваш e-mail и пароль</p>
				
				<form method="post" action="login.php">
				
				<div class="log_values_left">e-mail</div>
				<div class="log_values_right"><input name="email" type="email"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				<div class="log_values_left">пароль:</div>
				<div class="log_values_right"><input name="password" type="password"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				
				<div style="text-align:center;"><input style="font-size:16px; margin-top:20px;" class="send" type="submit" value="войти"></div>
				</form>
			<?php } ?>
</div>
</div>	</div>	
 <?php require_once ("templates/bottom.php"); ?> 