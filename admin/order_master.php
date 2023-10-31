    <?php
    require('top.inc.php');

	$sql="select * from users order by id desc";
	$res=mysqli_query($con,$sql);
	
    ?>
    <div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Order Master</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
				   <table class="table">
                        <thead>
                             <tr>
                                <th class="product-thumbnail">Order ID</th>
                                <th class="product-name"><span class="nobr">Order Date</span></th>
                                <th class="product-price"><span class="nobr"> Address </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment status </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Order status </span></th>
                              </tr>
                        </thead>
                             </tbody>
                                   <?php
                                     $res=mysqli_query($con,"select orders.*,order_status.name as order_status_str from orders,order_status
                                      where order_status.id=orders.order_status");
                                      while($row=mysqli_fetch_assoc($res)) {
                                      ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="order_master_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
                                                <td class="product-name"><?php echo $row['added_on']?></a></td>
                                                <td class="product-name">
                                                    <?php echo $row['address']?></br>
                                                    <?php echo $row['city']?></br>
                                                    <?php echo $row['pincode']?>
                                                </td>
                                                <td class="product-name"><?php echo $row['payment_type']?></a></td>
                                                <td class="product-name"><?php echo $row['payment_status']?></a></td>
                                                <td class="product-name"><?php echo $row['order_status_str']?></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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