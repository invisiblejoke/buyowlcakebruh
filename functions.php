<?php

include("init.php"); 
require 'phpmailgun/vendor/autoload.php';
use Mailgun\Mailgun;

function sendPasswordEmail($email)
{

	$db = connect_database();
    $query = $db->prepare("SELECT uid, username FROM users WHERE email LIKE :email");
    $query->bindParam("email", $email,PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetch(PDO::FETCH_OBJ);

	if(!($data))
    {  
        return "nonexist";     
    }
    else
    {
        try 
        {
            try 
            {
                $uid = $data->uid;
                $username = $data->username;
                $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
                $expDate = date("Y-m-d H:i:s",$expFormat);
            }
            catch (Exception $e) 
            {
               return 'error'; 
            } 
            
            $ukey = md5($username . '_' . $email . rand(0,10000) .$expDate );
            $SQL = $db->prepare("INSERT INTO recoveryemails_enc(uid,ukey,expDate) VALUES (:uid,:ukey,:expDate)");

            $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
            $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
            $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);

            $SQL -> execute();
            $db = null;
            $passwordLink = "<a href=\"?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "\">https://infs3202-jva9d.uqcloud.net/buyowlcakebruh/recoverPass.php?a=recover&email=" . $ukey . "&u=" . urlencode(base64_encode($uid)) . "</a>";

            //mailgun code    
            $mgClient = new Mailgun('key-0e3cc8c17c279900dc425a038a3f2efb');
            $domain = "sandbox467709fbe13544ea82279eced1d8487a.mailgun.org";

            # Make the call to the client.
            $result = $mgClient->sendMessage("$domain",
            array('from'    => 'BuyOwlCakeBruh admin <postmaster@sandbox467709fbe13544ea82279eced1d8487a.mailgun.org>',
                    'to'      => ''.$username.' <'.$email.'>',
                    'subject' => '[BuyOwlCakeBruh] - Your Lost Password',
                    'html'    => '<HTML> Dear '.$username.',<br>
                Please visit the following link to reset your password:<br>
                -----------------------<br>
                '.$passwordLink.'<br>
                -----------------------<br>
                If clicking doesnt work, please copy the entire link into your browser. The link will expire after 3 days for security reasons.<br>
                If you did not request this forgotten password email, no action is needed, your password will not be reset as long as the link above is not visited. <br>
                Thanks,<br>
                -- BuyOwlCakeBruh Team </HTML>'));


            if($result){
                return 'sent';
            }

       
        } catch (Exception $e) {
            //return $check;
            return "error";
        }
    }
    //return $check;
   return 'error';     
}


function checkEmailKey($ukey,$uid)
{
    try  
    {
    	$db = connect_database();
        $expDate = date("Y-m-d H:i:s");
    	$SQL = $db->prepare("SELECT uid FROM recoveryemails_enc WHERE ukey=:ukey AND uid=:uid AND expDate>=:expDate");
        {
            $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
            $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
            $SQL -> bindParam("expDate", $expDate,PDO::PARAM_STR);
            $SQL -> execute();
           
           
            $count = $SQL->rowCount();
            $db = null;
            $data = $SQL->fetch(PDO::FETCH_OBJ);
            $uid = $data->uid;
       
            if ($count > 0 && $uid != '')
            
            {

                return array('status'=>true,'ruid'=>$uid,'rukey'=>$ukey);
            }
            return array('status'=>false,'uid'=>"");
        }
    }
    catch (Exception $e)
    {
       // return false;
        return array('status'=>false,'uid'=>"");
    }
    //return false;
}


function updateUserPassword($uid,$password,$ukey)
{
    $db = connect_database();

    $SQL = $db->prepare("UPDATE users SET password=:hash_password WHERE uid=:uid");
    try 
    {
        $hash_password= hash('sha256', $password);
        $SQL -> bindParam("hash_password", $hash_password,PDO::PARAM_STR);
        $SQL -> bindParam("uid", $uid,PDO::PARAM_INT);
        $SQL -> execute();
    
        $SQL = $db->prepare("DELETE FROM recoveryemails_enc WHERE ukey=:ukey");
        $SQL -> bindParam("ukey", $ukey,PDO::PARAM_STR);
        $SQL -> execute();
        $db = null;
        return true;
    
    } catch (Exception $e) {
        return false; 
    }
   
    return false;
}





?>


