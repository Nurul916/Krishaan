<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>News</title>
  <link rel="icon" href="/krishaan/img/krishaan1.png">

  <style>
    #btn1{
      background:#00cccc;
      padding: 10px;
    }
    h1{
      background:#00cccc;
      border : 5px solid #00cccc;
      padding: 10px
    }
    body{
      background-image: linear-gradient(to right, red , yellow);
      font-family: Arial, Helvetica, sans-serif;
    }
    #title{
      display:block;
      background:#83E745;
      font-family: Arial, Helvetica, sans-serif;
      padding:10px;
      border-radius:5px;

    }
    #news{
      margin:auto;
      text-align:center;
    }
  </style>
</head >
<body class=container>
<div>
      <button type = "button" name = "sub" id= "btn1" > <a href="index.php" style = "text-decoration:none">মূলপাতা</a></button><br>
      
    </div>
    <h1>সংবাদ</h1>

<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname ="krishaak";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->exec("set names utf8");
  
  // use exec() because no results are returned
  $query = "SELECT * FROM news ORDER BY news_id DESC";
  $statement = $conn->query($query);
  
  
  foreach($statement as $row){
    $news_details = $row['details'];
    $news_link = $row['link'];
    ?>
    <br>
    <label for="title" id = "title"><?php echo  $news_details; ?></label> 
    <div id = "news">
      
      <iframe width= "420" height = "315" src="<?php echo $news_link; ?>" frameborder="0"></iframe><br>
    </div>

    <?php



  }

    
    
  }
  
  
  
catch(PDOException $ex)
  {
  echo $e->getMessage();
  }

$conn = null;




?>

</body>
</html>