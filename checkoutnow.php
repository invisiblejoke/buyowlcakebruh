<?php
include('checkoutFunction.php');
session_start();


		echo"Please do not close this window or click the Back button on your browser.";

								
		$collectionDate = $_POST['collectionDate'];
		if($collectionDate !="")
		{

		}
		else

		$var =$_SESSION["cart_item"];
	

		$email = $_POST['email'];
		$result = confirmOrder(($_SESSION["cart_item"]),$collectionDate);
		
		echo "Processing Payment... ";


	
	$var = ("Please select a date");
	echo "<script type='text/javascript'>alert('$var');</script>";
		if($result){
			$sent = sendPurchasedEmail(($_SESSION["cart_item"]),$collectionDate,$email);
			echo "Processing Order... ";

			if ($sent)
			{
				echo " Order Complete. ";
					
				$url=BASE_URL.'paymentComplete.php';
				header("Location: $url");				
				
			}else{

				$url=BASE_URL.'paymentFail.php';
				header("Location: $url");

			}
		}

	if(isset($_POST['checkout-submit']))
	{

	}

	if(isset($_POST['paypal-submit']))
	{

	}


?>