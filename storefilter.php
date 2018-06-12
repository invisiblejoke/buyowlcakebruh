<?php
session_start();
require_once("dbcontroller.php");
require('cart.php');

 $_SESSION['filtercookie'] = $_POST['testdata'];
 $testcookie = $_SESSION['filtercookie'];
 $_SESSION['global'] = $testcookie;
 echo $testcookie;
?>

                <div id="product-grid">
                    <div class="row">
                    <div class="text-center"><h3>PRODUCTS</h3></div>
                    
                    <?php
                    
                         $product_array = $db_handle->runQuery("SELECT * FROM tblproduct WHERE category='".$testcookie."' ORDER BY prodid ASC");
                  
                   
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?>
                        <div class="col-lg-4 col-xs-6 text-center product-item">
                            <form id="thisform" method="post" action="catalogue.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                              
                                <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200" height="200"></div>                            
                                <hr>                                           
                                <div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
                                <div><a data-toggle="modal" data-target="#myProdModal" data-id="<?php echo $product_array[$key]["code"]?>" ><i class="fa fa-eye black" aria-hidden="true"></i></a></div>
                                <!--<a href="../buyowlcakebruh/productdetail.php?var=<?php echo $product_array[$key]["code"] ?> "><i class="fa fa-eye black" aria-hidden="true"></i></a>-->
           
                                <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                                <div>
                                    <input type="text" name="quantity" value="1" size="2" />
                                    &nbsp;&nbsp;<input type="submit" value="Add to cart" class="btn-success btn-xs" />
                                </div>
                                <br>

                            </form>
                        </div><!--end of class product-item-->
                       
                    <?php
                            }
                    }
                    ?>
                    </div><!--end of row-->

                    
                </div><!--end of product-grid-->