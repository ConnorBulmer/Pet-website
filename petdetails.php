<!DOCTYPE html>
<html>
<head>
	<title>Petopedia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
