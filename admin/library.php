<?php

	require_once 'database.php';
	$arrat=array();
	$designation = [];
	$query = "SELECT item_name FROM  item_name";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result)) {
		$designation[] = $row["item_name"]; 
	}
	
		function fill_from_box($connect){ 
		$output = '';
		$query = "SELECT * FROM users ";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row){
				if($row["abbr"]!="Admin")
				{
				if($_SESSION['user']==$row["user"]) 
					$output .= '<option selected>'.$row["abbr"].'</option>';
				else
					$output .= '<option  value="'.$row["abbr"].'">'.$row["abbr"].'</option>';
				}
			}
		return $output;
	}
	
	function fill_sizes_box($connect){ 
		$output = '';
		$query = "SELECT * FROM sizes ";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row){
			$output .= '<option value="'.$row["size"].'">'.$row["size"].'</option>';
			}
		return $output;
	}
	
	
		function fill_unit_select_box($connect){ 
		$output = '';
		$query = "SELECT * FROM currency ";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row){
			//$output .= '<option value="'.$row["currencySymbol"].'">'.$row["currencySymbol"].'</option>';
			if($row["currencySymbol"]=="PLN") 
					$output .= '<option selected>'.$row["currencySymbol"].'</option>';
				else
					$output .= '<option  value="'.$row["currencySymbol"].'">'.$row["currencySymbol"].'</option>';
			}
		return $output;
	}

?>