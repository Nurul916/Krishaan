<?php
  include('server.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/krishaan/img/krishaan1.png">

<style>
  body{
    font-family:Arial, Helvetica, sans-serif;
    background-image: url("/krishaan/img/signinbg.jpg");
    background-size:cover;
  }

  .header{
    font-family:Arial, Helvetica, sans-serif;
    color:white;
    background:#00cccc;
    

  }

  #form{

    margin:auto;
    border-radius:25px;
    max-width:200px;
    background : #00cccc;
    border:20px solid #00cccc;
    font-family:Arial, Helvetica, sans-serif;
  }

  .btn{
    
  }
  input[type=text], input[type=password], input[type = email] {
  width: 100%;
  padding: 8px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}


</style>




  <title>Login and Register</title>

</head>
<body>

  <div class = "header" >

    <h2>Register</h2>
  
  </div>
  <DIV>
    <img src="/krishaan/img/krishaan1.png" alt="" width=250 height=180>
  </DIV>
  
  <form method="post" action="register.php" id = "form" >
    <div class = "input-group">
      <label for="">Username / নাম</label><br>
      <input type="text" name = "username" placeholder = "username" required><br>
    </div>
    <div>
    <label for="">Email / ইমেইল</label><br>
      <input type="email" name = "email" placeholder = "abc@gmail.com" required><br>
    </div>
    <div>
    <label for="">Mobile No. / মোবাইল নাম্বার</label><br>
      <input type="text" name = "mobile" required><br>
    </div>
    <div>
    <label for="">Password / গোপন পিন নাম্বার</label><br>
      <input type="password" name = "password1" id = "pass1"><br>
    </div>
    <div>
    <label for="">Confirm Password</label><br>
      <input type="password" name = "password2" id="pass2" required><br>
    </div>
    <div>
    <label for="">Address / ঠিকানা</label><br>
      
    </div>
    <div>
    <label for="">District / জেলা</label><br>
      <input type="text" name = "dist" required><br>
    </div>
    <div>
    <label for="">Subdist / উপজেলা</label><br>
      <input type="text" name = "subdist" required><br>
    </div>
    <div>
    <label for="">Village / গ্রাম</label><br>
      <input type="text" name = "vill" required><br>
    </div>
    <div>
    <label for="">Postal Code / পোস্ট নাম্বার</label><br>
      <input type="text" name = "post" required><br>
    </div>
    <div>
    <label for=""></label><br>
      <button type = "submit" name = "register" class= "btn">Register</button><br>
    </div>
    <p>
      Already a member? আপনি কি মেম্বার? <a href="login.php">Sign in</a>
    </p>
  
  
  </form>



  
</body>
</html>