<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="/krishaan/img/krishaan1.png">
<head>
<style>
  body{
    font-family:Arial, Helvetica, sans-serif;
    
    background-image: url("/krishaan/img/signinbg.jpg");
    
    background-size:cover;  
  }

  h1{
    font-family:Arial, Helvetica, sans-serif;
    color:white;
    background:#00cccc;
    

  }

  #form2{

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


  <title>Log in</title>
  
  <h1>Log in</h1>
</head>
<body>
  <DIV>
    <img src="/krishaan/img/krishaan1.png" alt="" width=250 height=180>
  </DIV>
  <form method = "post" action="login_expert.php"  id="form2">
    <div id = "input-group">
      <label for="">Mobile Number / মোবাইল নাম্বার </label><br>
      <input type="text" name="phone_num" placeholder = "01*********">
    </div>
    <div id = "input-group">
      <label for="">Password / গোপন পিন নাম্বার  </label><br>
      <input type="password" name="pass1" ><br>
    </div> 
    <div>
      <button type = "submit" name = "login" class= "btn1" >Login</button><br>
    </div>   
  
  
  </form>

<?php
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbname ="krishaak";

  if(isset($_POST['login'])){ 
    $phone_num = $_POST["phone_num"];
    
    $pass1 = $_POST["pass1"];

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      // use exec() because no results are returned
      $query = "SELECT * FROM farm_specialist WHERE phone_num ='$phone_num' AND password ='$pass1'";
      $statement = $conn->prepare($query);
      $statement->execute(


          array(
            'phone_num' => $_POST['phone_num'],
            'password' => $_POST['pass1']
          )
          


      );
      
      $count = $statement->rowCount();
      if($count > 0){

        foreach($statement as $row){  //fetching datas
          $_SESSION['name'] = $row["name"];
          
          $_SESSION['phone'] = $row["phone_num"];
          $_SESSION['id'] = $row["id"];
          $_SESSION['catg'] =1;
          
          
        }
        header("location:index.php");
        
        
      }
      
      }
      
  catch(PDOException $ex)
      {
      echo $e->getMessage();
      }
  
  $conn = null;
  }

   



?>
</body>
</html>