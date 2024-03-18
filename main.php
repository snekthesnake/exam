<html>
<head>
	<link rel="stylesheet" href="css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
	<div class="header">
		<center>
		<hr/>
		<a class="header_text" href="registration.html" >Регистрация</a>
		<p class="header_text"></p>
		<a class="header_text" href="authorization.html">Авторизация</a>
		<p class="header_text"></p>
		<a class="header_text" href="main.php">Главная</a>
		</center>
		<hr/>
	</div>
	<center>
	<table border="1px solid black">
		<caption>Существующие пользователи</caption>
		<?php
		session_start();
		if(isset($_SESSION['login']))
		{
			print("<script type='text/javascript'>");
			print("alert('Доброго времени суток, ".$_SESSION['login']."');");
			print("</script>");
			//echo($_SESSION['login']);
		}
		else
		{
			print("<script type='text/javascript'>");
			print("alert('Сперва нужно авторизоваться!');");
			print("location.replace('authorization.html');");
			print("</script>");
		}
			$connection = mysqli_connect('localhost','root','','exam');
			$skoka_Q = mysqli_query($connection,"SELECT COUNT(*) FROM worker;");
			$skoka = mysqli_fetch_assoc($skoka_Q);
			$skoka = $skoka["COUNT(*)"];
			print("<tr>");
			print("<th class='text'>Login</th>");
			print("<th class='text'>Password</th>");
			print("</tr>");
			for ($i = 0;$i < $skoka;$i++)
			{
				print("<tr>");
				$Q = mysqli_query($connection,"SELECT Worker_Mail,PASSWORD FROM worker LIMIT 1 OFFSET ".$i." ;");
				$QR = mysqli_fetch_assoc($Q);
				$LOGIN = $QR["Worker_Mail"];
				$PASSWORD = $QR["PASSWORD"];
				print("<th class='text'>".$LOGIN."</th>");
				print("<th class='text'>".$PASSWORD."</th>");
				print("</tr>");
			}
			mysqli_close($connection);
		?>
</table>
</center>
</body>
</html>