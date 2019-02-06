<?php
session_start();
if(isset($_COOKIE['user']))
    echo("Cokie Value : {$_COOKIE['user']}");
if(isset($_GET['err']))
{
    $error =  $_GET['err'];
}
if(isset($_SESSION['id'])){
    $name =  $_SESSION['name'];
}

?>

<!DOCTYPE html>
<html>

<head>
<title>Blood Bank</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/prefixfree.min.js"></script>
</head>
<body>

<div id="header-container"> 
  <!-- menu contains divs of logo and navigation bar -->
  <div class="header">
    <div class="header-menu">
      <div id="logo">
        <h2 style="border-bottom:5px solid darkred;"> <span class="fa fa-heartbeat red"></span> Blood Bank</h2>
        <p style="margin-left: 4px;">Management System</p>
      </div>
        <div class="search-menu">
            <form method="get" action="Views/donorlist.php">
                <span class="custom-dropdown">
                    <select name="blood">
                        <option selected>Blood</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                        <option>O+</option>
                        <option>O-</option>
                    </select>
                </span>
                <span class="custom-dropdown" id="city">
                    <select name="city">
                        <option selected>City</option>
                        <option>Faisalabad</option>
                        <option>Karachi</option>
                        <option>Lahore</option>
                        <option>Islamabad</option>
                    </select>
                </span>
                <span class="custom-dropdown" id="button-search">
                    <button name="searchbtn"> Search</button>
                </span>
            </form>
           
           </div>
      <div class="login-menu">
          
              <div class='preload login--container'>
                  <?php
                  if(isset($name))
                  {
                      echo"<h1>$name</h1>";
                  ?>
                  
                  <?php

                      
                  }
                  else{?>
                  <form method="get" action="indexScript.php">
                      <div class='login--username-container'>
                          <label><span class="fa fa-user-o"> Username</label>
                          <input placeholder='Username' name="username" type='text' required>
                          <!--<input autofocus placeholder='Username' name="username" type='text'>-->
                      </div>
                      <div class='login--password-container'>

                          <label><span class="fa fa-key"> Password</label>
                          <input placeholder='Password' name="password" type='password' required>
                          <button class='js-toggle-login login--login-submit' name="login">Login</button>   
                            
                      </div>
                  </form>
                   
                  <div class='login--toggle-container'>
                      <div class='js-toggle-login'>Login</div>
                  </div>
                  <?php } ?>
              </div>
          
        
      </div>
    </div>
  </div>
  <div class="navbar">
    <nav class="displayed" id="navlinks">
      <ul>
        <li><a href="Index.php"><span class="fa fa-home"></span> Home</a></li>
        <li><a href="Views/donorlist.php">Donors List</a></li>
        <li><a href="Views/related.html">Related</a></li>
        <li><a href="Views/eligibilty.html">Eligibility</a></li>
        <li> <a href="Views/Contact us.html">Contact us</a></li>
      </ul>
    </nav>
  </div>
</div> <!--Header Menu Closing-->

<div class="body-container">
  <div class="slideshow-container">
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="img/slider/6.jpg" style="width:100%">
      <div class="text">Caption Text</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="img/slider/8.jpg" style="width:100%">
      <div class="text">Caption Two</div>
    </div>
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="img/slider/2.jpg" style="width:100%">
      <div class="text">Caption Three</div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">❮</a> <a class="next" onclick="plusSlides(1)">❯</a> </div>
  <br>
  <div style="text-align:center"> <span class="dot" onclick="currentSlide(1)"></span> <span class="dot" onclick="currentSlide(2)"></span> <span class="dot" onclick="currentSlide(3)"></span> </div>
  <div class="middle">
    <div id="discription" >
     <div class="menu-container">
     	      <div class="img">
        <h2 style="text-align:center">Save Life</h2>
        <img src="img/1.jpg" alt="save life" width="240" height="104"/>
        <p>Our motto is delivering "a million smile" means we keep customer at the center of all our decision.This customer focus has helped in delivering exceptional value to our client and has made us the logistic partner of choice for some most trusted brand in Pakistan. </p>
      </div>
      <div class="img">
        <h2 style="text-align:center">Donate Blood</h2>
        <img src="img/c-slide-1.jpg" width="240" height="104" />
        <p>Our team commerce roots have equipped us with in-depth knowledge about the operational and logistics requirement in the fast-paced e-commerce industry.Our service industry background defines our customer first approach </p>
      </div>
     </div>
     <div class="menu-container">
     	   <div class="img">
        <h2 style="text-align:center">Save Life Give Blood</h2>
        <img src="img/c-slide-3.jpg" width="239" height="104" />
        <p>The vision of becoming an industry leader in providing reliable, time-bound logistics and supply-chain solution to its business partner.Our network reach, state of the art technology platform and hands on approach makes us one of the fastest growing team. </p>
      </div>
      <div class="img">
        <h2 style="text-align:center">Donate Blood</h2>
        <img src="img/c-slide-1.jpg" width="240" height="104" />
        <p>Our team commerce roots have equipped us with in-depth knowledge about the operational and logistics requirement in the fast-paced e-commerce industry.Our service industry background defines our customer first approach </p>
      </div>
     </div>


    </div>
    <div class="signup-container">
      <div class="signup-block">
        <form action="indexscript.php"  method="post">
          <h1>Sign Up</h1>
          <input type="text" name="username" placeholder="Username" id="username"  required/>
          <input type="email" name="email" placeholder="Email" id="email"  required/>
          <input type="password" name="password" placeholder="Password" id="password"  required/>
          <input type="password" name="confirmpassword" placeholder="Confirm Password" id="confirmpassword"  required/>
            <input type="tel" name="number" placeholder="Phone Number"  required/>
           <select class="blood-group" name="blood">
                <option selected>Blood Group</option>
                 <option>A+</option>  
                 <option>A-</option>
                 <option>B+</option>
                 <option>B-</option>
                 <option>AB+</option>
                 <option>AB-</option>
                 <option>O+</option>
                 <option>O-</option>
            </select>
          <button type="submit" name="register">Register</button>
        </form>
          <br />
        <h3 style="color:red;text-align:center"></h3>
      </div>
    </div>
    
 
  </div>
  <div class="clear"></div>
  <div id="explan">
    <div id="footerdata">
      <h2>Welcome to World Bank Management System</h2>
      <p>A Blood Bank is a cache or bank of Blood or blood components, gathered as a result of blood donation or collection, stored and preserved for later us in blood transform.The term "Blood Bank" typically refers to a division of a hospital where the storage of blood product occurs and where proper testing is performed[to reduce the risk of transfusion related adverse events].However,it sometime refers to a collection center, and indeed some hospital also perform collection.</p>
    </div>
  </div>
      <?php
      if(isset($error))
      {
      ?>
     <div id="popup">
        <div class="window">
            <a href="#popup" class="close-button" title="Close">X</a>
            <h2>Something Went Wrong</h2>
            <h4>
               <?php echo"{$error}"; ?>
            </h4>
        </div>

    <!--Popup Menu Closing-->
        <?php
      }
        ?>

    </div> <!--Body Closing-->
<div class="clear" style="height: 3px;">

</div>
<div class="footer-container"> Copyright &copy Blood Bank<br/>
  Designed By: Sadia Ijaz & Abdullah Farooq 
    </div> <!--Footer Closing-->
<script src="js/jquery-3.1.1.js"></script> 
<script src="js/index.js"></script>
</body>
</html>
