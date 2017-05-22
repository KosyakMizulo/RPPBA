<?php
session_start();

$connection = mysql_connect("localhost","root","");
$db = mysql_select_db("rpba_mizulo_i_radkevich");
mysql_set_charset("utf8");
if(!$connection||!$db){
	exit(mysql_error());
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>РППБА</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link id="callCss" rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8" />

	<link id="callCss"rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />

</head>

<body>
<div id="headerSection">
	<div class="container">
		
    <div class="span3 logo">
    <a href="#"><img src="img/logo.png" alt="" /></a>
	</div>
		
		<div class="navbar">
			<button class="pull-right ddbtn" id="toggle-btn"><img src="img/drop-down.png"></button>
            <div id="menu" class="nav-collapse" style="float: right; background:#1E90FF; padding:16px;border: 0px solid black; border-radius:30px 0 0 30px;">

				<a href="index.php">Главная</a>
				<a href="about.php">О нас</a>
				<a href="cars.php">Автомобили</a>
				<a href="login.php">Вход</a>
				<a href="register.php">Регистрация</a>
				
			</div>
			
		</div>
	</div>
	</div>
<!--Header Ends================================================ -->