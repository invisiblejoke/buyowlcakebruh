<?php

include("init.php"); 
require 'phpmailgun/vendor/autoload.php';
use Mailgun\Mailgun;

function confirmOrder($var,$collectionDate)
{
	$db = connect_database();
	$inserted=0;
	$orderFormat = mktime(date("m") , date("d"), date("Y"));
    $orderDate = date("Y-m-d",$orderFormat);
	//var_dump($var);
	//var_dump($orderDate);
	foreach ($var as $item) {

		try {
			//	echo "////////////////////////////////////////////////////////////";
				$cake = $item["name"];
				$quan = $item["quantity"];
			//	var_dump($cake);


				$query= $db->prepare("INSERT INTO orders(username,orderDate,cakeName,quantity,collectionDate) VALUES (:username,:orderDate,:cakeName,:quantity,:collectionDate)");
				$query->bindParam("username", $_SESSION["username"],PDO::PARAM_STR) ;
				$query->bindParam("orderDate", $orderDate,PDO::PARAM_STR) ;
				$query->bindParam("cakeName", $cake,PDO::PARAM_STR) ;
				$query->bindParam("quantity", $quan,PDO::PARAM_INT);
				$query->bindParam("collectionDate", $collectionDate,PDO::PARAM_STR);
				$query->execute();
				$inserted++;
			
		} catch (Exception $e) {
			$db=null;
			return $e;
		}

	}
	$db=null;
	if ($inserted>0){
		return true;
	}else{
		return false;
	}
}

function sendPurchasedEmail($var,$collectionDate,$email)
{
    require 'phpmailer/PHPMailerAutoload.php';
    require 'mailer.php';

	$username = $_SESSION["username"];
	$orderFormat = mktime(date("m") , date("d"), date("Y"));
	$orderDate = date("Y-m-d");
	
	$detail="x";
	$varl = $_SESSION["cart_item"];
	foreach ($varl as $a) {
		$detail.=  "<tr><td>".$a['name']."</td><td>".$a['quantity']."</td></tr><br>";
		
	}

 	try 
   	{
			
            //mailgun code    
            $mgClient = new Mailgun('key-0e3cc8c17c279900dc425a038a3f2efb');
            $domain = "sandbox467709fbe13544ea82279eced1d8487a.mailgun.org";

            # Make the call to the client.
            $result = $mgClient->sendMessage("$domain",
            array('from'    => 'BuyOwlCakeBruh admin <postmaster@sandbox467709fbe13544ea82279eced1d8487a.mailgun.org>',
                    'to'      => ''.$username.'<'.$email.'>',
                    'subject' => '[[BuyOwlCakeBruh] - Purchase Order',
                    'html'    => '<HTML><head></head><body> Dear '.$username.',<br>
         Thank you for the purchasing at BuyOwlCakeBruh.Attached below is the reciept for the order. Order made for date:' .$collectionDate.' can be collected from 1pm onward.Please bring this reciept along as a proof of purchase during collection.<br>
         <table cellspacing="0" style="border: 2px dashed #000000; width: 200px; height: 50px; padding: 10px">
         <thead><tr id="table"><th>Cake name</th><th>Quantity</th></tr></thead><br><tbody> '.$detail.'
         <br></tbody></body><br>  
            Thanks,<br>
            -- BuyOwlCakeBruh Team </body></HTML>'));

  			$_SESSION['cDate']=$collectionDate;

            if($result){
                return 'sent';
     
            } 
            else 
            {
               return true;
            }
       
    } catch (Exception $e) {
        return "error"; 
    }
    return "error"; 
}



?>