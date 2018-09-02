Question 2 : Write a function to process the vouchers based on the given conditions.
<br><br><br><br><br><br><br><br>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

</html>

<?php 

include("../includes/db.php");

function vouchers(){

    //assume customer click the "apply coupon" button
    





    // if(isset($_POST['apply_coupon'])){

    //     $code = "20FORME";
        
    //     if($code == ""){
        
    //     }else{
        
    //         $get_coupons = "select * from coupons where coupon_code='$code'";
            
    //         $run_coupons = mysqli_query($con,$get_coupons);
            
    //         $check_coupons = mysqli_num_rows($run_coupons);
            
    //         if($check_coupons == 1){
            
    //             $row_coupons = mysqli_fetch_array($run_coupons);
                
    //             $coupon_pro = $row_coupons['product_id'];
                
    //             $coupon_price = $row_coupons['coupon_price'];
                
    //             $coupon_limit = $row_coupons['coupon_limit'];
                
    //             $coupon_used = $row_coupons['coupon_used'];
            
            
    //         if($coupon_limit == $coupon_used){
            
    //             echo "<script>alert('Your Coupon Code Has Been Expired')</script>";
            
    //         }
    //         else{
            
    //             $get_cart = "select * from cart where p_id='$coupon_pro' AND ip_add='$ip_add'";
                
    //             $run_cart = mysqli_query($con,$get_cart);
                
    //             $check_cart = mysqli_num_rows($run_cart);
            
            
    //         if($check_cart == 1){
            
    //             $add_used = "update coupons set coupon_used=coupon_used+1 where coupon_code='$code'";
                
    //             $run_used = mysqli_query($con,$add_used);
                
    //             $update_cart = "update cart set p_price='$coupon_price' where p_id='$coupon_pro' AND ip_add='$ip_add'";
                
    //             $run_update = mysqli_query($con,$update_cart);
                
    //             echo "<script>alert('Your Coupon Code Has Been Applied')</script>";
                
    //             echo "<script>window.open('cart.php','_self')</script>";
            
    //         }else{
            
    //             echo "<script>alert('Product Does Not Exist In Cart')</script>";
            
    //         }
            
    //         }
            
    //         }else{
            
    //             echo "<script> alert('Your Coupon Code Is Not Valid') </script>";
            
    //         }
        
    //     }
        
        
    //     }
}

vouchers();

?>