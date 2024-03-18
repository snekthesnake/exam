<?php
		$login = $_POST['Login'];
		$password1 = $_POST['Password1'];
		$password2 = $_POST['Password2'];
		if ($login != "" and $password1 != "" and $password2 != "")
		{
			if (!str_contains($login, ";") and !str_contains($password1, ";") and !str_contains($password2, ";"))
			{
				if ($password1 == $password2)
				{
					$connection = mysqli_connect('localhost','root','','exam');
					$login = mysqli_real_escape_string($connection,$_POST['Login']);
					$password1 = mysqli_real_escape_string($connection,$_POST['Password1']);
					$sql = "INSERT INTO Worker(Worker_Mail,PASSWORD, Role) VALUES ('$login','$password1', '1');";
					$proverka = mysqli_query($connection,"SELECT COUNT(Worker_Mail) FROM Worker WHERE Worker_Mail = '$login';");
					$skoka = mysqli_fetch_assoc($proverka);
					$skoka = $skoka["COUNT(Worker_Mail)"];
					if ($skoka == 0)
					{
						$Q = mysqli_query($connection,$sql);
						mysqli_close($connection);
						print("<script type='text/javascript'>");
						print("alert('Вы успешно зарегестрировались!');");
						print("location.replace('../authorization.html');");
						print("</script>");
					}
					else
					{
						mysqli_close($connection);
						print("<script type='text/javascript'>");
						print("alert('Пожалуйста,займите другой Логин');");
						print("location.replace('../registration.html');");
						print("</script>");
					}
				}
				else
				{
					print("<script type='text/javascript'>");
					print("alert('Пароли не совпадают');");
					print("location.replace('../registration.html');");
					print("</script>");
				}
			}
			else
			{
				print("<script type='text/javascript'>");
				print("alert('В поле содержатся запрещённые символы: ;');");
				print("location.replace('../registration.html');");
				print("</script>");
			}
		}
		else
		{
			print("<script type='text/javascript'>");
			print("alert('Одно из полей пустое');");
			print("location.replace('../registration.html');");
			print("</script>");
		}
?>