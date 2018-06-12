<?php
    include("session.php");
    session_regenerate_id();
    //include_once('modalAuth.php');
  
    $_SESSION['dateval'] = $_POST['collectionDate'];
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
            <form  id="paypal-submit" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" role="form" style="display: block;"> 
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
                    <!--Paypal-->
                    <?php   $counter=1;   ?>
                    <input type="hidden" name="business" value="bruhbusiness@gmail.com">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                
                
                <?php
                        
                        foreach($_SESSION["cart_item"] as $a){
                            echo " <input type='hidden' name='item_name_$counter' value='".$a['name']."'><br>";
                            echo " <input type='hidden' name='amount_$counter' value='".$a['price']."'><br>";
                            echo " <input type='hidden' name='quantity_$counter' value='".$a['quantity']."'><br>";
                            
                            $counter++;
                ?>  
                        <input type="hidden" name="currency_code" value="AUD">
                        <input type="hidden" name="return" value="https://infs3202-jva9d.uqcloud.net/buyowlcakebruh/checkout3.php">
                        <input type="hidden" name="cancel_return" value="https://infs3202-jva9d.uqcloud.net/buyowlcakebruh/paymentFail.php">
                        <!--<input type="hidden" name="notify_url" value="http://127.0.0.1/buyowlcakebruh/checkout2.php">-->
                    <tr>
                           <td class="col-lg-1"><?php echo $itemID ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['name'] ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['code'] ."<br>"; ?></td>
                           <td class="col-lg-3"><?php echo $a['price'] ."<br>"; ?></td>                          
                           <td class="col-lg-2"><?php echo $a['quantity']."<br><br>"; ?></td>
                           
                    </tr>
                <?php
                
                    $itemID++;
                        }

                        $userDetail = $userClass->userDetails($_SESSION['uid']);
                        $email=$userDetail->email;

                ?>
                <tr>
                    <td colspan="5"><div class="text-right"><h4>Collect date: </h4><p class="red">Please be noted that you can only preorder 2 weeks in advance.</p>  
                        
                           
                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="<?php echo $email ?>" style="display: none;">
                      
                        </div>
                    
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="form-group text-right">
                            <h3>Total: AUD <?php echo $_SESSION['item_total'] ."<br>"; ?> </h3>    
                               
                        </div>
                    </td>
               </tr>
               <tr>
                   <td>
                        
                   </td>
               </tr>
            </table><!--End of table-->
            </form>
       
          

    

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
       
            document.getElementById('paypal-submit').submit(); 
          
            



        });
         

        </script>

    </body>



</html>