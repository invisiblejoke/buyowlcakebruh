<?php

session_start();

require 'phpmailgun/vendor/autoload.php';
use Mailgun\Mailgun;


if (!empty($_POST['contact-submit'])) 
{
  
    $email=$_POST['email'];
    $phoneNo=$_POST['phoneNo'];
    $name=$_POST['name'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    /* Regular expression check */
    $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
 
    $phoneNo_check = preg_match('~^[0-9!_]{2}+-[0-9!_]{8}$~i', $phoneNo);

    if(!$email_check)
    {
        $_SESSION['message-updateProfile'] = "email require @  .com";
        header("Location:". $_SERVER['HTTP_REFERER']);    
    }

    if(!$phoneNo_check)
    {
        $_SESSION['message-updateProfile'] = "phone no require 2 digit number, follow by a -, follow by 8 digit number";
        header("Location:". $_SERVER['HTTP_REFERER']);       
    }
    if($email_check && $phoneNo_check) 
    {

        try 
        {
            
        //mailgun code    
        $mgClient = new Mailgun('key-0e3cc8c17c279900dc425a038a3f2efb');
        $domain = "sandbox467709fbe13544ea82279eced1d8487a.mailgun.org";

        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain",
        array('from'    => ''.$name.' <postmaster@sandbox467709fbe13544ea82279eced1d8487a.mailgun.org>',
                'to'      => 'BuyOwlCakeBruh-Admin <buyowlcakebruh@gmail.com>',
                'subject' => 'Form submission: '.$subject.'',
                'html'    => '<HTML> To BuyOwlCakeBruh Admin, <br>
                From: '.$name.'<br>  
                Email: '.$email.'<br>
                Mobile number: '.$phoneNo.'<br>
                Wrote the following: '.$message.'<br>        
                -- BuyOwlCakeBruh Team </HTML>'));

        if($result){
            $var =( "Mail Sent. Thank you ".$name.", we will contact you shortly.");
    
            header("refresh:0; url=contact.php");

            echo "<script type='text/javascript'>alert('$var');</script>";
  
            
        }

  
        }catch(Exception $e){
            $_SESSION['message-updateProfile'] = $e;
            header("Location:". $_SERVER['HTTP_REFERER']);
        }
    }
}
else
{
    $_SESSION['message-updateProfile'] = 'please fill up all the field';
    header("Location:". $_SERVER['HTTP_REFERER']);
}
    
?>


          
