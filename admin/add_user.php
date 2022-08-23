<?php 
include('connection.php');
$item_name = $_POST['item_name_add'];
$where_sold = $_POST['where_sold_add'];
$item_from = $_POST['item_from_add'];
$size = $_POST['size_add'];
$amount_1 = $_POST['amount_1_add'];
$currency_1  = $_POST['currency_1_add'];
$amount_2 = $_POST['amount_2_add'];
$currency_2 = $_POST['currency_2_add'];
$amount_3 = $_POST['amount_3_add'];
$currency_3 = $_POST['currency_3_add'];
$card = $_POST['card_add'];
$date = $_POST['date_add'];

$sql = "INSERT INTO `sales_table` (`id`,`item_name`,`where_sold`,`item_from`,`size`,`amount_1`,`currency_1`,`amount_2`,`currency_2`,`amount_3`,`currency_3`,`card`,`date`) values (NULL,'$item_name', '$where_sold', '$item_from','$size','$amount_1','$currency_1','$amount_2','$currency_2','$amount_3','$currency_3','$card','$date')";
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