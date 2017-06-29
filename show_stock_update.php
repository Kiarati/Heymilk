<?php
include("config.php");
	
	

	$date = date("Y-m-d H:i:s");
	//$product_expire = $_POST['p_expire'];
	
      $sqlupdate = "UPDATE tb_stock SET 
        name_ingredient = '".$_POST['p_name']."', stock_qty = '".$_POST['p_qty']."', date_exp = '".$_POST['p_exp']."'
       WHERE id = '".$_POST['p_id']."'";
        $queryupdate = mysqli_query($conn,$sqlupdate);
 header("location:stock.php");

        
?>