<?php
  session_start();
  include("commentserver.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="/krishaan/img/krishaan1.png">
  <title>Comments</title>
  <style>
        #nav{
      display: block;
      background: #00cccc;
      padding: 10px;
    }
            span{
      display:inline block;
      background:#00cccc;
      border:2px solid black;
      padding:6px;
      
    }
            #postdiv{
      border:10px solid #00cccc;
    }
    #span{
      background:white;
      
    }
    body{
      background-image:url('/krishaan/img/comment.jpeg');
    }
    #name {
      display: ;
      border: 5px solid #C6EAF9;



      background: #C6EAF9;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }

    #title {
      display: ;
      border: 1px solid black;



      background: #C6EAF9;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }

    #post {
      display: ;
      border: 2px solid #DDF9AD;



      background: #DDF9AD;

      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
    }
    #comment{
      background:white;

    }


    .label {

      position: relative;
      left: 15px;
      color: Green;

      font-weight: bold;
    }

    .labelt {
      position: relative;
      left: 30px;
      color: BLACK;


    }

    .labeld {
      position: relative;
      left: 30px;
      color: black;


    }


    .form {
      background: yellow;

    }
  </style>
</head>
<body>



  <!-- <form action="#">
    <div>
      <a href="forumwrite.php"> <h1>Write post... </h1></a>
    </div>

  <br><br> -->
  <div id="nav">
  <span>
    <a href="forum.php" ><font color="white">পিছনে</font></a>
  </span>
  <span>
    <a href="index.php" ><font color="blue">মূলপাতা</font></a>
  </span>
  <br>
  </div>

<div id="showpost">  
  <?php

  $servername = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "krishaak";
  $_SESSION['postid'] = $_GET['id'];


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");

    // use exec() because no results are returned
    $query1 = "SELECT * FROM post AS ps JOIN users AS us ON us.phone_num = ps.usersphone_num WHERE ps.Post_id LIKE '$_GET[id]' ORDER BY ps.Post_id DESC";//get post
    $statement1 = $conn->query($query1);

    foreach ($statement1 as $row1) {
      echo '<div class = bg-info p-2 >
          <div id = "name"><label class = "label">' . $row1["name"] . '<label></div>
           
          <div id = "title"><label class = "labelt">শিরোনাম:' . $row1["title"] . '<label></div>
          
          <div id = "post"><label class = "labeld">' . $row1["details"] . '<label></div>
          
          
          </div>
          ';?>

  <form action="#" method = "post">

    <div id="response">
      <textarea name="postbody" id="postbody" cols="60" rows="5" placeholder="কমেন্ট লিখুন..."></textarea><br>
      <input type="submit" name="submitc" id="submitc" value="Comment" ><br><br>
      
      
    </div>

    </form>

    <div>
      <?php
      
        $query = "SELECT * FROM comment WHERE POSTPOST_id ='$_SESSION[postid]' ORDER BY Comment_id";
        $statement = $conn->query($query);

        foreach ($statement as $row) {
          echo '<div class = bg-info p-2 >
              <div id = "name"><label class = "label">' . $row["name"] .'  '.$row['date'].'<label></div>
               
              <div id = "title"><label class = "labelt">' . $row["details"] . '<label></div>
              
              
              </div>
              <br>';
        }

    
        






      ?>
      
    
    
    
    
    </div>


        
  <?php   
  
         
    }
  } catch (PDOException $ex) {
    echo $e->getMessage();
  }
  ?>