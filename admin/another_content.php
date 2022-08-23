<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
	
	if (isset($_SESSION['zalogowany'])&&$_SESSION['user']!="admin")
	{
		header('Location: panel.php');
		exit();
	}
	
	require_once 'database.php';
	
	?><?php include('connection.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
  <title>Server Side CRUD Ajax Operations</title>
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
	<?php
		$_SESSION['$today'] = date("Y.m.d");  
		echo '<div class="logout_data">Zalogowany:
			<span class="logout_data_user">'.$_SESSION['user'].'</span>
			<span class="logout_data_date">'.$_SESSION['$today'] .'</span>
			<a class="logout_data_logout" href="logout.php">[ Wyloguj ]</a>
		</div>';
	?>
	<?php include('nav.php'); ?>

  <script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/dt-1.10.25datatables.min.js"></script>
	ANOTHER ACTION
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>