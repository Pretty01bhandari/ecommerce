<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
    header('location:login.php');
    die();
}
$categories_id=get_safe_value($con,$_POST['categories_id']);
$res=mysqli_query($con,"select * from sub_categories where categories_id='$categories_id' and status='1'");
if(mysqli_num_rows($res)>0){
	$html='';
	while($row=mysqli_fetch_assoc($res)){
		$html="<option value=".$row['sub_categories'].">".$row['sub_categories']."</option>";
	}
	echo $html;
}else{
	echo "<option value=''>No Sub Categories found</option>";
}
?>