<?php
session_start();

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "krishaak";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("set names utf8");
///receiving the values
$title= $_GET["title"];
$postbody = $_GET["body"];
$usernum = $_SESSION['phone'];
$userid = $_SESSION['id'];



if(empty($title) || empty($postbody)){
  ///echo "No post or title found";
}
else{
  $sql = "INSERT INTO post(title, details, usersphone_num, usersid, date)
          VALUES('$title','$postbody','$usernum','$userid',CURDATE())";
    // use exec() because no results are returned
    $conn->exec($sql);
    ///echo "Post successful";
    
}


// use exec() because no results are returned
$query = "SELECT * FROM post AS ps JOIN users AS us ON us.phone_num = ps.usersphone_num ORDER BY ps.Post_id DESC";
$statement = $conn->query($query);

$output="";
foreach ($statement as $row) {
  $output=$output.'<div class = bg-info p-2 id=postdiv >
      <div id = "name"><label class = "label">' . $row["name"] .'       '.$row['date']. '<label></div>
       
      <div id = "title"><label class = "labelt">শিরোনাম:' . $row["title"] . '<label></div>
      
      <div id = "post"><label class = "labeld">' . $row["details"] . '<label></div>
      </div>
      <div id = "comment"><a href="comment.php?id='.$row['Post_id'].'">কমেন্ট দেখুন</a></div>
      <br>
      <br>';
}

echo $output;

?>