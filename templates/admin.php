<?php if(isset($_SESSION['user_id'])&&($_SESSION['user_id']==0)){ ?>
<hr>
<table width=100%>
    <tr>
        <td style="vertical-align: top; padding: 0 10px 0 10px;">	
		
		<h2>Добавить автомобиль</h2>
		
	<form enctype="multipart/form-data" action="templates/addProduct.php" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
    <!-- Название элемента input определяет имя в массиве $_FILES -->
	<p><b>Название:</b></p>
   <input name="name">
   <p><b>Цена:</b></p>
   <input name="cost">
	<p><b>Фирма:</b></p>
	<?php
		$sections= mysql_query("SELECT * FROM `section`");
			while($rowSection = mysql_fetch_array($sections)){
								$name=$rowSection['section_name'];
								$idSection=$rowSection['id'];
								echo "<input name='firm' type='radio' value=".$idSection.">$name";
			}			
	?>	
	<p><b>Тип:</b></p>
	<?php
		$typeQuery= mysql_query("SELECT * FROM `type`");
			while($rowType = mysql_fetch_array($typeQuery)){
								$type=$rowType['type'];
								$idType=$rowType['id'];
								echo "<input name='type' type='radio' value=".$idType.">$type";
			}			
	?>	
   <p><b>Картинка:</b></p>
   <input style="border: none;" name="userfile" type="file" />
   <p><b>Краткое описание:</b></p>
   <input style="width: 100%;" name="short_description">
	<p><b>Описание:</b></p>
	<textarea style="outline: none; width:100%; border: 2px solid black; border-radius: 3px; font-size:17px;" placeholder="Тут описание" rows= "7" name= "description"></textarea>
	<p><b>Характеристики:</b></p>
	<textarea style="outline: none; width:100%; border: 2px solid black; border-radius: 3px; font-size:17px;" placeholder="Тут характеристики" rows= "7" name= "characteristics"></textarea>
    <input type="submit" value="Добавить автомобиль" />
	
`				</form>
	</td>
	
	
        <td style="vertical-align: top; padding: 0 10px 0 10px;">
		
		<h2>Удалить автомобиль</h2>
		
		<form enctype="multipart/form-data" action="templates/deleteProduct.php" method="POST">
	<p><b>Название:</b></p>
   <input name="name">
	<p><b>Фирма:</b></p>
	<?php
		$sections= mysql_query("SELECT * FROM `section`");
			while($rowSection = mysql_fetch_array($sections)){
								$name=$rowSection['section_name'];
								$idSection=$rowSection['id'];
								echo "<input name='firm' type='radio' value=".$idSection.">$name";
			}			
	?>	
<br><br>
    <input type="submit" value="Удалить автомобиль" />
	
`				</form>
		</td>
    </tr>
</table>
<?php } ?>	
<h2>Рассылка</h2>