<?php
error_reporting(E_ALL ^ E_NOTICE);
include("config.php");
include('layout.php');
?>

<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #FCF3CF;">
                <h2 class="panel-title"><i class="fa fa-shopping-cart fa-fw"></i> สินค้าในสต็อก</h2>
            </div>
            <div class="panel-body">
<?php 
  $sql = "SELECT * FROM sale_temp,tb_ingredient,tb_stock WHERE stock = 'n' AND barcode = product_barcode AND ingredient_id = product_code";
  $query = mysqli_query($conn,$sql);
  while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
  {
    $sum=$result['stock_qty']-($result['amount']*$result['qty']);
    $sqlupdate = "UPDATE tb_stock 
                  SET stock_qty = '".$sum."' 
                  WHERE product_code = '".$result['product_code']."'";
    $queryupdate = mysqli_query($conn,$sqlupdate);

    $sqlupdate2 = "UPDATE sale_temp 
                  SET stock = 'y' 
                  WHERE pk_temp = '".$result['pk_temp']."'";
    $queryupdate2 = mysqli_query($conn,$sqlupdate2);
  }
  ?>

    <!-- <table class="table table-bordered"> -->
    <table class="table">
    <thead style="font-size:150%; color: green;">
        <td style="min-width: 200px;">ชื่อวัตถุดิบ</td>
        <td style="min-width: 150px;">คงเหลือ</td>
        <td style="min-width: 150px;">วันหมดอายุ</td>
        <td style="min-width: 150px;text-align: center;"><i class="fa fa-cog fa-fw"></i></td>
    </thead>
    </table>
<?php
  $sql2 = "SELECT * FROM tb_stock";
  $query2 = mysqli_query($conn,$sql2);
  while($result2=mysqli_fetch_array($query2,MYSQLI_ASSOC))
  {
?>
     <table class="table">
     <!-- <table class="table table-bordered"> -->
     <tbody>
      <tr>
        <td style="font-size:150%; min-width: 200px;"><?php echo $result2['name_ingredient']; ?></td>
        <td style="font-size:150%; min-width: 150px;"><?php echo $result2['stock_qty']; ?></td>
        <td style="font-size:150%; min-width: 150px;"><?php echo $result2['date_exp']; ?></td>
         <td style="min-width: 150px;text-align: center;"><button class="btn btn-edit2" data-toggle="modal" data-target="#choose-<?php echo $result2["product_code"];?>">แก้ไข</button></td>
      </tr>
    </tbody>
    </table>

      <!-- Modal edit-->
      <div class="modal fade" id="choose-<?php echo $result2["product_code"];?>" tabindex="-1" role="dialog" aria-labelledby="chooseLabel-<?php echo $result2["product_code"];?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="chooseLabel-<?php echo $result2["product_code"];?>">Edit Stock</h4>
            </div>
            <form action="show_stock_update.php" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" class="form-control" id="pc-<?php echo $result2["product_code"];?>" value="<?php echo $result2["id"];?>" name="p_id">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="ni-<?php echo $result2["name_ingredient"];?>" value="<?php echo $result2["name_ingredient"];?>" name="p_name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="sq-<?php echo $result2["stock_qty"];?>" value="<?php echo $result2["stock_qty"];?>" name="p_qty">
              </div>
               <div class="form-group">
                <input type="date" class="form-control" id="exp-<?php echo $result2["date_exp"];?>" value="<?php echo $result2["date_exp"];?>" name="p_exp">
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-close" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-save-input ">บันทึก</button>
              </div>
            </form>
            </div>
          </div>
        </div>
<?php
  }
?>
  </table>
<!-- Modal insert-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เพิ่มสินค้าในต๊อก</h4>
      </div>
      <div class="modal-body">
      <form action="save_insert_stock.php" method="post">
          <div class="form-group">
           <label>ชื่อวัถุดิบ</label>
                            <input type="text" class="form-control" id="p_name" name="p_name">
          </div>

          <div class="form-group">
           <label>จำนวน</label>
                            <input type="text" class="form-control" id="p_qty" name="p_qty">
          </div>
          <div class="form-group">
           <label>วันหมดอายุ</label>

                <input type="date" class="form-control" id="p_exp"  name="p_exp">
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-close" data-dismiss="modal">ปิด</button>
            <button type="submit" class="btn btn-save-input ">บันทึก</button>
          </div>
        </form>
        </div>
      </div>
    </div>  
  </div>
<!-- <div class="container-fluid" style="margin-top: 60px; margin-bottom: 60px;"> -->

     </div>
    </div>
  </div>
</div>  