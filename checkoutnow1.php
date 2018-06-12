<?php
include("checkoutFunction.php");

session_start();

	echo"Please do not close this window or click the Back button on your browser.";		
		$var =$_SESSION["cart_item"];
        
		$email = $_POST['email'];

		echo "Processing Payment... ";
	
	$var = ("Please select a date");
	echo "<script type='text/javascript'>alert('$var');</script>";
		//if($result){
            $result = confirmOrder(($_SESSION["cart_item2"]), $_SESSION['dateval']);
			$sent = sendPurchasedEmail(($_SESSION["cart_item2"]), $_SESSION['dateval'],$email);
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

?>