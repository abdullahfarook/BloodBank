<?php
session_start();
include("includes/config.php");
include("includes/db.php");
include("includes/functions.php");

if(loggedIn()){
    header("location:myaccount.php");
    exit();
}
function isUnique($email){
    $query = "Select * from users where email='$email'";
    global $db;
    $result = $db->query($query);
    if($result->num_rows>0){
        return false;
    }
    else
        return true;
}

if(isset($_POST["register"])){
    //copy to a variable
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    //check validations
    $nameerr = "The username must be at least 3 characters long";
    $passsize_error = "Password must contain at least 5 characters";
    $passerr = "Both passwords do not match";
    $email_error = "Email already exists, Please use another email";
    $target_page = "register.php";
    $link = "Location:" . rawurlencode($target_page)."?err=". urlencode($nameerr);
    if(strlen($name)<3){
        header($link);
        // or
        //  header("Location:" . rawurlencode($target_page)."?err=" . urlencode($nameerr));
        exit();
    }
    else if($password !== $confirmpassword){
        header("Location:" . rawurlencode($target_page)."?err=" . urlencode($passerr));
        exit();
    }
    else if(strlen($password)<5){
        header("Location:" . rawurlencode($target_page)."?err=" . urlencode($passsize_error));
        exit();
    }
    else if(strlen($confirmpassword)<5){
        header("Location:" . rawurlencode($target_page)."?err=" . urlencode($passsize_error));
        exit();
    }
    else if(!isUnique($email)){
        header("Location:" . rawurlencode($target_page)."?err=" . urlencode($email_error));
        exit();
    }
    else{
        $nm=$db->real_escape_string($name);
        $em=$db->real_escape_string($email);
        $pw=$db->real_escape_string($password);
        $token = bin2hex(openssl_random_pseudo_bytes(32));

        $query = "Insert into users(name,email,password,token) values('$nm','$em','$pw','$token')";
        $result = $db->query($query);
        if(!$result){
            die("Error" . $db->connect_error);
        }
        $activationmessage = "Hi $nm: Your account is created. Now you need to "
        . "activate the account. So click this activation link " . "http://localhost/Login_System/activate.php?token=$token";


        try {
            // prepare email message
            $message = Swift_Message::newInstance()
                ->setSubject('NTU Activate Account')
                ->setFrom($from)
                ->setTo($em)
                ->setBody($activationmessage);

            // create the transport
            $transport = Swift_SmtpTransport::newInstance($smtp_server,465,'ssl')
                ->setUsername($username)
                ->setPassword($password);
            $mailer = Swift_Mailer::newInstance($transport);
            $result = $mailer->send($message);
            if ($result) {
                header("Location:" . rawurlencode("index.php") . "?success=" .
                       urlencode("Activation Email Sent!"));
                exit();
            } else {
                echo "Couldn't send email";
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}


?>