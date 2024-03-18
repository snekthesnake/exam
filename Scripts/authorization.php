<?php
		$login = $_POST['Login'];
		$password = $_POST['Password'];
		if ($login != "" and $password != "")
		{
			$connection = mysqli_connect('localhost','root','','exam');
			$Q = mysqli_query($connection,"SELECT COUNT(Worker_Mail) FROM Worker WHERE Worker_Mail = '$login' and Password = '$password';");
			$skoka = mysqli_fetch_assoc($Q);
			$skoka = $skoka["COUNT(Worker_Mail)"];
			if (isset($Q))
			{
				if ($skoka == 0)
				{
					print("<script type='text/javascript'>");
					print("alert('Такого пользователя не существует');");			
					print("location.replace('../authorization.html');");
					print("</script>");
				}
				else
				{
					session_start();
					echo("Есть такой пользователь!");
					$_SESSION['login'] = $login;
					print("<script type='text/javascript'>");
					print("location.replace('../authorization.html');");
					print("</script>");
				}
			}
			mysqli_close($connection);
		}
		else
		{
			print("<script type='text/javascript'>");
			print("alert('Такого пользователя не существует');");
			print("location.replace('../authorization.html');");
			print("</script>");
		}
?>