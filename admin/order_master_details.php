    <?php
    require('top.inc.php');
    isAdmin();
    $order_id=get_safe_value($con,$_GET['id']);
    if(isset($_POST['update_order_status'])){
       $update_order_status=$_POST['update_order_status'];
       mysqli_query($con,"update orders set order_status='$update_order_status' where id='$order_id'");
    }
	
    ?>
    <div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Detail</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
				   <table class="table">
                   <thead>
                        <tr>
                            <th class="product-thumbnail">Product Name</th>
                            <th class="product-thumbnail">Product Image</th>
                            <th class="product-name">Qty</th>
                            <th class="product-price">Price</th>
                            <th class="product-price">Total Price</th>
                        </tr>
                    </thead>
                      <tbody>
                            <?php
                                $res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,
                                product.name,product.image,orders.address,
                                orders.city,orders.pincode from order_detail,product,orders where 
                                order_detail.order_id='$order_id' and order_detail.product_id=product.id GROUP by order_detail.id");
                                $total_price=0;
                                while($row=mysqli_fetch_assoc($res)) {
                                    // retriving the value of address,city & pincode
                                    $address=$row['address'];
                                    $city=$row['city'];
                                    $pincode=$row['pincode'];
                                    $total_price=$total_price+($row['qty']*$row['price']);
                                    
                            ?>
                        <tr>
                            <td class="product-name"><?php echo $row['name']?></td>
                            <td class="product-name"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
                            <td class="product-name"><?php echo $row['qty']?></td>
                            <td class="product-name"><?php echo $row['price']?></td>
                            <td class="product-name"><?php echo $row['qty']*$row['price']?></td>
                                
                        </tr>
                            <?php } ?>
                        <tr>
                        <!-- colspan merges the table -->
                        <td colspan="3"></td>
                        <td class="product-name">Total Price</td>
                        <td class="product-name"><?php echo $total_price?></td>
                                
                        </tr>
                      </tbody>
                    </table>
                    <!-- to show order status,address,city and pincode  -->
                    <div id="address_details">
                        <strong>Address</strong>
                        <?php echo $address?>, <?php echo $city?>, <?php echo $pincode?><br></br>
                        <strong>Order Status</strong>
                        <!-- order ko status nikaleko -->
                        <?php 
                        $order_status_arr=mysqli_fetch_assoc(mysqli_query($con,"select order_status.name,
                        order_status.id as order_status from order_status,orders where orders.id='$order_id' 
                        and orders.order_status=order_status.id"));
                        echo $order_status_arr['name'];
                        ?>

                        <div>
                            <form method="post">
                            <select class="form-control" name="update_order_status" 
                            id="update_order_status" required onchange="select_status()">
                                <option>Select Status</option>
                                <?php
										$res=mysqli_query($con,"select * from order_status");
										while($row=mysqli_fetch_assoc($res)){
											echo "<option value=".$row['id'].">".$row['name']."</option>";
										}
										?>
                            </select>
                            <input type="submit" class="form-control"/>
                            </form>
                        </div>
                    </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>

     <?php
    require('footer.inc.php');
    ?>