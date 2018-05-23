<?php
class blog
{
  private $dbConnect;
  
  // Konstruktor
  function __construct($serverName, $userName, $password, $dbName)
  {

    // Create connection
    $this -> dbConnect = mysqli_connect($serverName, $userName, $password, $dbName);
    
    // Check connection
    if (!$this -> dbConnect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connection succesfully" ;
    
  }
  
  function pokaz()
  {
    $sql = "SELECT idPosts,postDate,postTitle FROM POSTS";
    mysqli_query($this ->dbConnect, $sql);
    mysqli_close($this ->dbConnect);
  }
    
  function dodaj($postDate, $posTitle, $postIntro, $postReadMore, $posAuthor)
  {
    $sql = "INSERT INTO Posts (postDate, postIntro, postReadMore, posAuthor, postTitle)
    VALUES ('$postDate','$postIntro','$postReadMore','$posAuthor','$postTitle',)";
    mysqli_query($this ->dbConnect, $sql);
    mysqli_close($this ->dbConnect);
  }

  function usun($idPosts)
  {
    $sql="DELETE * FROM Posts WHERE 'idPosts'= $idPosts";
    mysqli_query($this ->dbConnect, $sql);
    mysqli_close($this ->dbConnect);
  }

  function edytuj($date,$intro,$readmore,$title,$numPosts)
  {
    $sql="UPDATE Posts SET postDate='$date',postIntro= '$intro',postReadMore = '$readMore',postTitle = '$title' WHERE idPosts=$numPosts";
    mysqli_query($this ->dbConnect, $sql);
    mysqli_close($this ->dbConnect);
  }
  
  
}
$blogTomka = new blog('localhost' , 'root' , 'root' , 'Blog');

// $blogTomka -> pokaz();
// $action=$_GET['action'];    

// switch ($action) {
//   case 'pokaz':
//     $blogTomka-> pokaz();
//     break;

// }

  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<title>Admin</title>
<!-- <a href="admin2.php$action=pokaz"></a> -->

<body>
