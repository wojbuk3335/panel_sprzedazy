<?php include('connection.php');

$output= array();
$sql = "SELECT * FROM sales_table";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'item_name',
	2 => 'where_sold',
	3 => 'item_from',
	4 => 'size',
	5 => 'amount_1',
	6 => 'currency_1',
	7 => 'amount_2',
	8 => 'currency_2',
	9 => 'amount_3',
	10 => 'currency_3',
	11 => 'card',
	12 => 'date'
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE item_name like '%".$search_value."%'";
	$sql .= " OR where_sold like '%".$search_value."%'";
	$sql .= " OR item_from like '%".$search_value."%'";
	$sql .= " OR size like '%".$search_value."%'";
	$sql .= " OR amount_1 like '%".$search_value."%'";
	$sql .= " OR currency_1 like '%".$search_value."%'";
	$sql .= " OR amount_2 like '%".$search_value."%'";
	$sql .= " OR currency_2 like '%".$search_value."%'";
	$sql .= " OR amount_3 like '%".$search_value."%'";
	$sql .= " OR currency_3 like '%".$search_value."%'";
	$sql .= " OR card like '%".$search_value."%'";
	$sql .= " OR date like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['id'];
	$sub_array[] = $row['item_name'];
	$sub_array[] = $row['where_sold'];
	$sub_array[] = $row['item_from'];
	$sub_array[] = $row['size'];
	$sub_array[] = $row['amount_1'];
	$sub_array[] = $row['currency_1'];
	$sub_array[] = $row['amount_2'];
	$sub_array[] = $row['currency_2'];
	$sub_array[] = $row['amount_3'];
	$sub_array[] = $row['currency_3'];
	$sub_array[] = $row['card'];
	$sub_array[] = $row['date'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
