<!DOCTYPE html>
<html>
<head>
	<title>Petopedia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require 'database.php' ;

   $result = mysqli_query($conn,"SELECT * FROM pets WHERE Animal_ID = '".$_GET['id']."'");

   $petdetails = mysqli_fetch_assoc($result);

   echo 'ID : '.$petdetails['Animal_ID'].'<br>';
   echo 'Name: '.$petdetails['Animal_Name'].'<br>';
   echo 'Type: '.$petdetails['animal_type'].'<br>';
   echo 'Gender: '.$petdetails['Animal_Gender'].'<br>';
   echo 'Breed: '.$petdetails['Animal_Breed'].'<br>';
   echo 'Color: '.$petdetails['Animal_Color'].'<br>';
   echo 'Address: '.$petdetails['Address'].'<br>';
	 echo 'Image: <img src="'.$petdetails['Image'].'"><br>';

?>

</body>
</html>
