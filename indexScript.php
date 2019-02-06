<?php
session_start();
include_once("includes/db.php");
$target_page = "index.php";
//Register Button
	if(isset($_COOKIE['user'])==false)
{
	setcookie("user",$_POST['username'].",".$_POST['password']);
}

   function isUnique($email)
   {
	$query = "Select * from donors where Email='$email'";
	global $db;
	$result = $db->query($query)->fetch();
	if($result>0){
		return false;
	}
	else
		return true;
}

if(isset($_POST["register"]))
{
	//copy to a variable
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirmpassword = $_POST["confirmpassword"];
	$number = $_POST['number'];
	$blood = $_POST['blood'];
	//check validations
	$nameerr = "The username must be at least 3 characters long";
	$numererr = "The Number must be 11 characters long";
	$passsize_error = "Password must contain at least 5 characters";
	$passerr = "Both passwords do not match";
	$email_error = "Email already exists, Please use another email";
	$blooderr = "You must select tour Blood Group";
	$link = "Location:" . rawurlencode($target_page)."?err=". urlencode($nameerr);
	if(strlen($username)<3){
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
	else if($number<13){
		header("Location:" . rawurlencode($target_page)."?err=" . urlencode($numererr));
		exit();
	}
	else if($blood =="Blood Group"){
		header("Location:" . rawurlencode($target_page)."?err=" . urlencode($blooderr));
		exit();
	}
	else{
		$query = "Insert into donors(username,email,password,number,blood) values('$username','$email','$password','$number','$blood')";
		$result = $db->query($query);
		if(!$result){
			die("Error" . $db->connect_error);
		}

		header("Location:" . rawurlencode($target_page)."?err=" . urlencode("Hi $username: Your account is created"));


		}
}

//LoginButton
if(isset($_GET['login']))
{

		$username =  $_GET['username'];
		$password =  $_GET['password'];

		try
		{
			$result =  $db->query("SELECT d.id,d.Name FROM donors AS d WHERE d.Username = '$username' AND d.Password = '$password'");
			$row = $result->fetch();
			if($row>0){
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['Name'];
				header("Location:" . rawurlencode($target_page)."?err=" . urlencode("Login Successfull"));
			}
			else
			{
				header("Location:" . rawurlencode($target_page)."?err=" . urlencode("Username Or Password is Incorrect"));
			}
		}catch(Exception $e){
			$e->getMessage();
		}



}


?>