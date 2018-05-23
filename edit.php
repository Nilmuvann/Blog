<!-- Connection -->

<?php
function dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName)
{
  
  $connect = mysqli_connect($dbHost, $dbUserName, $dbUserPassword, $dbName);
  
  if (!$connect) 
  {
   die("blad");
  }
  return $connect;
}
 $dbHost = "localhost";
  $dbUserName = "root";
  $dbUserPassword = "root";
  $dbName = "Blog";

 

$dbConnect = dbConnector($dbHost, $dbUserName, $dbUserPassword, $dbName);

// Download post from header url

$nrPosts=$_GET['postide'];
$sql="SELECT idPosts,postTitle,postIntro,postReadMore FROM Posts WHERE idPosts=$nrPosts";
$dbQuery=mysqli_query($dbConnect,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Post</title>
</head>
<body>
  <form action="admin.php" method="post">
    <fieldset>
      <legend>Edit Post <?php echo $nrPosts; ?>  values:</legend>
      <?php while($row=mysqli_fetch_assoc($dbQuery)){?>
      Post ID: <input type="number" name="postide" value="<?php echo $row['idPosts']?>" readonly>
      <br><br>
      Title: <input type="text" name="postNewTitle" value="<?php echo $row['postTitle']?>">
      <br><br>
      Intro: <input type="text" name="postNewIntro" value="<?php echo $row['postIntro']?>">
      <br><br>
      Read More: <input type="text" name="postNewReadMore" value="<?php echo $row['postReadMore']?>">
      <br><br>
      <input type="submit" value="Dalej">
      <?php }?>  
    </fieldset>
  </form>
</body>
</html>


 