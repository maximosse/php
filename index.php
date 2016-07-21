<!DOCTYPE HTML>  
<html>
<head>
<meta charset = "UTF-8">
  <title>Registration</title>
<style>
p.font {
    font-family: "helvetica";
  color:blue;
  size:13px;
</style>
</head>
<body>  

<?php
$name = $email = $breed ="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['breed'])){
    echo "<h2>Your Input:</h2>";
    echo $name = $_POST['name'];
    echo "<br>";
    echo $email = $_POST['email'];
    echo "<br>";
    echo $breed = $_POST['breed'];
    echo "<br>";
    
     
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $sql = "CREATE DATABASE myDB";
// if (mysqli_query($conn, $sql)) {
//     echo "Database created successfully";
// } else {
//     echo "Error creating database: " . mysqli_error($conn);
// }

// $sql = "CREATE TABLE registration (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// firstname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// breed VARCHAR(30)
// )";

// if (mysqli_query($conn, $sql)) {
//     echo "Table registration created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// $sql = "INSERT INTO registration (firstname, email, breed)
// VALUES ('{$name}', '{$email}', '{$breed}')";
// var_dump($sql);
// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
$sql = "SELECT * FROM registration ORDER BY id DESC LIMIT 10";
  
  $res = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($res)){
    
    echo "<p class='font'>Name: ".$row['firstname']."<br></p>";
    echo "<p class='font'>Email: ".$row['email']."<br></p>";
    echo "<p class='font'>Breed: ".$row['breed']."<br></p><hr>";
  
  }
$conn->close();
}
?>

<h2>Registration form</h2>

<form method="post" action="index.php">  
  <p>Name: </p> <input type="text" name="name">
 
  <p> E-mail: </p><input type="text" name="email">
 
  <p>Breed: </p><input type="text" name="breed">
   
  <input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>
</html>