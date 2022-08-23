<?php 
include('connection.php');
$item_name = $_POST['item_name'];
$where_sold = $_POST['where_sold'];
$item_from =$_POST['item_from'];
$size = $_POST['size'];
$amount_1 = $_POST['amount_1'];
$currency_1 = $_POST['currency_1'];
$amount_2 = $_POST['amount_2'];
$currency_2 = $_POST['currency_2'];
$amount_3 = $_POST['amount_3'];
$currency_3 = $_POST['currency_3'];
$id = $_POST['id'];
$card = $_POST['card'];
$date=$_POST['date'];


$sql = "UPDATE `sales_table` SET `item_name`='$item_name',`where_sold`='$where_sold',`item_from`='$item_from',  `size`='$size',`amount_1`='$amount_1',`currency_1`='$currency_1',`amount_2`='$amount_2',`currency_2`='$currency_2',`amount_3`='$amount_3',`currency_3`='$currency_3',`card`='$card',`date`='$date' WHERE id='$id'";
$query= mysqli_query($con,$sql);
$lastId = mysqli_insert_id($con);
if($query ==true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>