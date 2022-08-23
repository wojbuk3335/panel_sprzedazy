<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location: index.php');
		exit();
	}
	
	$config = require_once 'config.php';
	
	$polaczenie = new mysqli($config['host'], $config['user'], $config['password'], $config['database']);
	
	if ($polaczenie->connect_errno!=0)
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else
{
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
	
		if ($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM users WHERE user='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				$wiersz = $rezultat->fetch_assoc();
				if(password_verify($haslo,$wiersz['pass'])){
					$_SESSION['zalogowany'] = true;
					$_SESSION['id'] = $wiersz['id'];
					$_SESSION['user'] = $wiersz['user'];
					$_SESSION['abbr'] = $wiersz['abbr'];
					$_SESSION['pass'] = $wiersz['pass'];
					unset($_SESSION['blad']);
					$rezultat->free_result();
						if( $wiersz['user']=="admin")
								header('Location: admin/index.php');
						else
								header('Location: panel.php');
				}else{
					$_SESSION['blad'] = '<span class="red_inscription">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
				}
			} else {
					$_SESSION['blad'] = '<span class="red_inscription">Nieprawidłowy login lub hasło!</span>';
					header('Location: index.php');
			}
		}
		$polaczenie->close();
	}
?>