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
  
  $sql = "SELECT idPosts,postDate,postTitle FROM Posts";
  $dbQuery = mysqli_query($dbConnect, $sql);
?>




<!-- HTML View -->

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
</head>
<body>
<?php while($row=mysqli_fetch_assoc($dbQuery)){?>
<article>
  <?php echo $row['postDate']?>
  <?php echo $row['postTitle']?>
  <a href="admin.php?postidd=<?php echo $row['idPosts'];?>">Usuń</a>
  <a href="edit.php?postide=<?php echo $row['idPosts'];?>">Edytuj</a>
  <br><br>
</article>  
<?php } ?>

<!-- Delete Function -->

<?php
  if(isset($_GET['postidd']))
  {
    $nrPosts=$_GET['postidd'];
    $sql="DELETE FROM Posts WHERE idPosts= $nrPosts";
    $dbQuery=mysqli_query($dbConnect, $sql);
    
    header('Location:admin.php');
    exit;
  }
?>

<!-- Update function -->


<?php
  if(isset($_POST['postide']))
  {
    
    $numPosts = $_POST['postide'];
    $title = ($_POST['postNewTitle']);
    $intro = $_GET['postNewIntro'];
    $readMore = $_GET['postNewReadMore'];
    
    $sql="UPDATE Posts SET postTitle = '$title' , postIntro= '$intro', postReadMore = '$readMore' WHERE idPosts=$numPosts";
    $dbQuery=mysqli_query($dbConnect, $sql);
    
    header('Location:admin.php');
    exit;
  }
?>



</body>
</html> 