<?php

    include("session.php");

    $itemID = 1;
    
?>
<!DOCTYPE html>
<html lang="en">

    <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>BuyOwlCakeBruh Product Details</title>
	<meta name="description" content="BuyOwlCakeBruh">
	<meta name="keywords" content="bakery, cake, pastries, fancy bakery goods">
	<script src="js/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Open+Sans|Raleway" rel="stylesheet">
	<link rel="stylesheet" href="css/flexslider.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <script src="js/bootstrap-datepicker.js"></script>

	<script src="js/flexsliderfix.js"></script>

	
	<script>
		$(function () {
			$("#header").load("../buyowlcakebruh/header.php");
			$("#footer").load("footer.html");
		});
	</script>
</head>




    <body id="top" data-spy="scroll" class="displaynone">

            <!--Header-->
            <div id="header"></div>

            <!--Heading-->
            <hr class="hr">

            <div class="background-myprofile">
                <div class="container">
                    <div class="transbox">
                        <p>CHECKOUT</p>
                    </div>
                </div>
            </div>
            <hr class="hr">
            
        <div class="container">  
            <form id="checkout" action="checkoutnow1.php" method="post" role="form" style="display: block;"> 
            <table class="table table-striped custab"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item</th>
                        <th>Product Code</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                <thead>
                  <?php
                        
                        $counter=1;
                        $_SESSION["cart_item2"] = $_SESSION["cart_item"];
                        foreach( $_SESSION["cart_item2"] as $a){
                            echo " <input type='hidden' name='item_name_$counter' value='".$a['name']."'><br>";
                            echo " <input type='hidden' name='amount_$counter' value='".$a['price']."'><br>";
                            echo " <input type='hidden' name='quantity_$counter' value='".$a['quantity']."'><br>";
                            
                            $counter++;
                               $itemID++;
               
                        }
               

                        $userDetail = $userClass->userDetails($_SESSION['uid']);
                        $email=$userDetail->email;
                        $collectionDate=$_SESSION['testdate'];


                     
                  
                ?>
                <tr>
       
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="form-group text-right">
                            <h3>Total: AUD <?php echo $_SESSION['item_total'] ."<br>"; ?> </h3>    
                            <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email ?>" style="display: none;">
                            <input type="submit" name="checkout-submit" id="checkout-submit" tabindex="4" class="form-control btn btn-success" value="Buy Now">
                           </div>
                    </td>
               </tr>
               <tr>
                   <td>
                        
                   </td>
               </tr>
            </table><!--End of table-->
            </form>
       
            <?php 
                if(isset($_POST['collectionDate'])){
                    $_SESSION['cDate']= $_POST['collectionDate'];
                }
             
            ?>

    

             </div><!--End of container-->
        <!--Footer--> 
        <div id="footer"></div>


        <!-- jQuery -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script src="js/jquery.inview.js"></script>
        <script src="js/script.js"></script>  
        <script type="text/javascript">
        $(function(){
       

                 
            document.getElementById('checkout').submit();   
          

        });
         

        </script>

    </body>



</html>