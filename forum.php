<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="/krishaan/img/krishaan1.png">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <title>Forum</title>
  <style>
    #postdiv{
      border:10px solid #00cccc;
    }
    #nav{
      display: block;
      background: #00cccc;
      padding: 10px;
    }
    body{
      background-image: linear-gradient(to right, green , yellow);
      
    }
    span{
      display:inline block;
      background:#00cccc;
      border:2px solid black;
      padding:6px;
      
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

<body class = container>
 
<div id="nav">
  <span>
    <a href="index.php" ><font color="white">মূ্লপাতা</font></a>
  </span>
  <span>
    <a href="myforum.php" ><font color="blue">আপনার প্রশ্ন</font></a>
  </span>
  </div>

  <div>
    <div id="response">
      <textarea name="title" id="title" cols="136" rows="2" placeholder="শিরোনাম.."></textarea><br>
    </div>
    <div id="response">
      <textarea name="postbody" id="postbody" cols="150" rows="4" placeholder="পোস্ট লিখুন..."></textarea><br>
      <input type="button" name="submitp" id="submitp" value="পোস্ট করুন" onclick="callajax()"><br>
      
    </div>

  </div>

  <!-- <form action="#">
    <div>
      <a href="forumwrite.php"> <h1>Write post... </h1></a>
    </div>

  <br><br> -->

<div id="showpost">  
  <?php

  $servername = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "krishaak";


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    // use exec() because no results are returned
    $query = "SELECT * FROM post AS ps JOIN users AS us ON us.phone_num = ps.usersphone_num ORDER BY ps.Post_id DESC";
    $statement = $conn->query($query);

    foreach ($statement as $row) {
      echo '<div class = bg-info p-2 id = postdiv>
          <div id = "name"><label class = "label">' . $row["name"] .'       '.$row['date']. '<label></div>
           
          <div id = "title"><label class = "labelt">শিরোনাম:' . $row["title"] . '<label></div>
          
          <div id = "post"><label class = "labeld">' . $row["details"] . '<label></div>
          
          
          </div>
          ';?>
        <div id = "comment"><a href="comment.php?id=<?php echo $row['Post_id']; ?>">কমেন্ট দেখুন</a></div>
        <br>
        <?php    
    }
  } catch (PDOException $ex) {
    echo $e->getMessage();
  }

  $conn = null;
  ?>

</div>

  <!-- </form> -->
  <script>
    var httprequest;
    function callajax() {
      httprequest=new XMLHttpRequest();

      var titlecomp=document.getElementById('title');
      var pbodycomp=document.getElementById('postbody');
      var titleval=titlecomp.value;
      var pbodyval=pbodycomp.value;

      httprequest.onreadystatechange=showupdategui;

      httprequest.open("GET","ajaxpage.php?title="+titleval+"&body="+pbodyval);
      httprequest.send();
      document.getElementById('title').value = '';
      document.getElementById('postbody').value = '';
      
      

    }


    function showupdategui(){
      console.log(this.readyState);
      if(this.readyState === XMLHttpRequest.DONE){
        console.log("I am called");
          if(this.status==200){
            ///alert(httprequest.responseText);
            var catchedupdatedgui=httprequest.responseText;
            var showpostcomp=document.getElementById('showpost');
            ///deleting the previous html codes
            showpost.innerHTML="";
            ///placing the new html codes
            showpost.innerHTML=catchedupdatedgui;
          }
      }
    }
  </script>
</body>

</html>