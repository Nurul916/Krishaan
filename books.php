<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Book</title>

  <style>
    #title{
      font-weight:bold;
      color: black;
    }

    body{
      background-image: linear-gradient(to right, green , yellow);
      color:white;
      font-family: 'Mukti','Arial','sans-serif';
    }
  #dbook{
    text-align: center;
    
    margin-bottom:15px;
    

  }
  #book{
    padding:10px;
  
    
  }
  #but{
    background:blueviolet;
  }

  
  </style>
</head>
<body class=container>
<span id=but> 
    <a href="index.php" ><font color="white">মূ্লপাতা</font></a>
  </span>
  
<h1>কৃষি বিষয়ক বই সমূহ </h1>



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
      $query = "SELECT * FROM book";
      $statement = $conn->query($query);
      

      foreach($statement as $row){  //fetching datas
        echo "<div id=dbook >";
        echo '<span id=book>';
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" height=300px width=250px><br>';
        echo '<span id=title>'.$row['title'].'</span><br>';
        echo '<span> <a href="'.$row["dlink"].'" target="_blank">ডাউনলোড করুন অথবা পড়ুন</a></span><br>';

       
        


        echo '</span>';
        echo '</div>';

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