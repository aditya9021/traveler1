  <?php
//index.php

$error ='';
$fname = '';
$lname = '';
$email = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["fname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $fname = clean_text($_POST["fname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$fname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["fname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $lname = clean_text($_POST["lname"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$lname))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["lname"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your last name</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO contact (fname, lname, email, message)
VALUES ('$fname','$lname', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

  $error = '<label class="text-success"> </label>';
  $fname = '';
  $lname = '';
  $email = '';
  $message = '';
 }
}

?> 



<html>
 <head>
 <title>contact</title>
 <link rel="stylesheet" href="style.css">
 <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
 </head>
  <body style="background-color: #CEECF5">
  <div id="firsttable">
  <table one>
    <tr>
      <td width="50%" align="center" style="height:60px;width:100px;padding-left:70px"><img src="logo.png"></td>
      <td width="50%" style="padding-left: 250px"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <a href="facebook.com" class="fa fa-facebook"></a>
            <a href="twitter.com" class="fa fa-twitter"></a>
            <a href="instagram.html" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-whatsapp"></a>
            </td>
    </tr>
  </table>
  </div><hr>


   <div class="secondtable">
  <table two>
    <ul>
      <li class="active"><a href="home.html">Home</a></li>
      <li class="active"><a href="about.html">About Us</a></li>
      <li class="active">Destination
        <div class="submenu-1">
          <ul>
            <li><a href="Maharashtra.html">Maharashtra</a></li>
            <li><a href="jnk.html">J & K</a></li>
            <li><a href="#">Rajasthan</a></li>
            <li><a href="#">Goa</a></li>
            <li><a href="#">North east</a></li>
            <li><a href="#">South</a></li>
          </ul>
        </div>
      </li>
      <li class="active"><a href="blog.html">Blog</a></li>
      <li class="active"><a href="contact us.php">Contact</a></li>
    </ul>
  </table>   
  </div>

  <div class="head">We Love that you want to reach to us!</div>
      <form method="post">
     <br />
     <?php if(!empty($error)) {
         echo '<div class="alert alert-success" role="alert">'.$error.'</div>';
     }
     ?>

  <div class="contact-container">
 
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2>Contact Us</h2>
        <form method="post" action="contact.php">
        <input type="text" class="field" name="fname" placeholder="first Name" value="<?php echo $fname; ?>" />
        <input type="text" class="field" name="lname" placeholder="last name" value="<?php echo $fname; ?>" />
        <input type="email" class="field" name="email" placeholder="your Email" value="<?php echo $fname; ?>" />
        <textarea placeholder="Message" name="message" class="field"><?php echo $message; ?></textarea>
        <input type="submit" value="Submit" name="submit" class="btn btn-info" value="Submit" />
      </div>
    </div>
  </div>
</form>



  <footer>
  <div class="footer-table">

    <div class="footer-head">About<hr>
      <ul class="footer-content">
        <li><a href="about.html">About Traveler</a></li>
        <li><a href="contact us.php">Contact</a></li>
        <li><a href="privacy.html">Privacy policy</a></li>
        <li><a href="disclaimer.html">Disclaimer</a></li>
    </div>

    <div class="footer-head">Connect with us<hr>
      <ul class="footer-content" style="text-align: center;padding-right:35px">
        <li><a href="facebook.com" class="fa fa-facebook"></a></li>
        <li><a href="twitter.com" class="fa fa-twitter"></a></li>
        <li><a href="instagram.com" class="fa fa-instagram"></a></li>
        <li><a href="#" class="fa fa-whatsapp"></a></li>
    </div>

    <div class="footer-head">Looking for something specific?<hr>
      <div class="form-box">
        <input type="text" class="search-field" placeholder="Search...">
        <button class="search-btn" type="button">search</button>
      </div>
    
  </div>
</div>
</footer>
<div class="bottom">Copyright @ 2020 Traveler</div>



</body>
</html>
