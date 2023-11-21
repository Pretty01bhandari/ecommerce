    <?php
    require('top.inc.php');

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
                                <th class="product-name"><span class="nobr">Product/Qty</span></th>
                                <th class="product-price"><span class="nobr"> Address </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment Type </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Payment status </span></th>
                                <th class="product-stock-stauts"><span class="nobr"> Order status </span></th>
                              </tr>
                        </thead>
                             </tbody>
                                   <?php
                                     $res=mysqli_query($con,"select order_detail.qty,product.name,
                                     orders.*,order_status.name as order_status_str from order_detail
                                     ,product,orders,order_status where order_status.id=orders.order_status 
                                     and product.id=order_detail.product_id and orders.id=order_detail.order_id 
                                     and product.added_by='".$_SESSION['ADMIN_ID']."' order by orders.id desc");
                                      while($row=mysqli_fetch_assoc($res)) {
                                      ?>
                                            <tr>
                                                <td class="product-add-to-cart"><?php echo $row['id']?><br/>
                                                </td>
                                                <td class="product-name">
                                                    <?php echo $row['name']?><br/>
                                                    <?php echo $row['qty']?></td>
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