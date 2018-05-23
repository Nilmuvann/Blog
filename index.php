<?php

function dbConnect($dbHost, $dbUserName, $dbUserPassword, $dbName)
{
  // Create connection
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);

  // Check connection
  if (!$connect) {
      die("blad");
  }
  return $connect;
}
$dbHost = "localhost";
$dbUserName = "root";
$dbUserPassword = "root";
$dbName = "Blog";

$dbConnect = dbConnect($dbHost, $dbUserName, $dbUserPassword, $dbName);
/* print_r($dbConnect); */

if(!isset($_GET['idPost'])){
  //Pobranie wszystkich postów bloga

  $sql = "SELECT idPosts,postDate,posAuthor,postTitle,postIntro FROM Posts";
  $dbQuery = mysqli_query($dbConnect, $sql);

  include('blog.php');
  
}

if(isset($_GET['idPost'])){

  $postNumber = $_GET['idPost'];

  //Pobieranie jednego posta bloga

  $sql = "SELECT idPosts,postDate,posAuthor,postTitle,postIntro,postReadMore FROM Posts WHERE idPosts=$postNumber";
  $dbQuery = mysqli_query($dbConnect, $sql);

  include('post.php');
}



?>