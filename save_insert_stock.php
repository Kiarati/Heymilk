<?php
include("config.php");
	
	//$product_code = $_POST['p_code'];
	$product_name = $_POST['p_name'];
	$date = date("Y-m-d H:i:s");
	//$product_expire = $_POST['p_expire'];
	$product_qty = $_POST['p_qty'];
	$date_exp = $_POST['p_exp'];
$sql = "SELECT * FROM tb_stock ORDER BY `tb_stock`.`product_code` DESC";
    $query = mysqli_query($conn,$sql);
    $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

if($result['product_code'] == ""){
      $product_code = 'w1';
      //echo $product_code;

 }else{
       $product_code = $result['product_code'];
    $product_code1 = substr($product_code, 0, 1);
    $product_code2 = substr($product_code, 1, 1);
  $product_int = (int)$product_code2+1;
  $product_code = $product_code1.$product_int;
  //echo $product_code;
 }


   
 	//echo $product_code;
 	
    // 

          $strSQL3 = "INSERT INTO tb_stock (product_code,name_ingredient,stock_qty,stock_created_date,date_exp) VALUES ('".$product_code."','".$product_name."','".$product_qty."','".$date."','".$date_exp."')";
       $query3 = mysqli_query($conn,$strSQL3);
       header("location:stock.php");
?>