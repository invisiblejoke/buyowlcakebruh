<?php
    session_start();

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
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
	<script src="js/flexsliderfix.js"></script>

	
	<script>
		$(function () {
			$("#header").load("../buyowlcakebruh/header.php");
			$("#footer").load("footer.html");
		});
	</script>
</head>




    <body id="top" data-spy="scroll">

            <!--Header-->
            <div id="header"></div>

            <!--Heading-->
            <hr class="hr">

            <div class="background-myprofile">
                <div class="container">
                    <div class="transbox">
                        <p>RECIEPT</p>
                    </div>
                </div>
            </div>
            <hr class="hr">
            
        <div class="container">  
            <form action="postPayment.php" method="post" role="form" style="display: block;"> 
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
                        
                        foreach($_SESSION["cart_item"] as $a){
                ?>  

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
                        
 
            
                ?>
                
                <tr>
                    <td colspan="5">
                        <div class="text-right"><h4>Total: AUD <?php echo $_SESSION['item_total'] ."<br>"; ?> </h4> 
                     <!--   <div class="text-right"><h4>Collect date: <?php echo $_SESSION['cDate'] ."<br>"; ?></h4> -->
                        
                           
                        
                        </div>
                    
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <div class="form-group text-right">
                            <h3>Paid: AUD <?php echo $_SESSION['item_total'] ."<br>"; ?> </h3>    
                            <?php
                                unset($_SESSION["cart_item"]);
    			                unset($_SESSION["item_total"]);
                                unset($_SESSION['cDate']);
                            ?>
                           
                            <input type="submit" name="backToCatalogue-submit" id="backToCatalogue-submit" tabindex="4" class="form-control btn btn-success" value="Catalogue">
                            <input type="submit" name="backToIndex-submit" id="backToIndex-submit" tabindex="4" class="form-control btn btn-primary" value="Home">          
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
 



  
        </script>

    </body>



</html>