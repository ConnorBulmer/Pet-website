<!DOCTYPE html>
<html>
<head>
	<title>Petopedia - View Pet</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="grayscale.css" rel="stylesheet">

	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
require 'database.php' ;

   $result = mysqli_query($conn,"SELECT * FROM pets WHERE Animal_ID = '".$_GET['id']."'");

   $petdetails = mysqli_fetch_assoc($result);
   echo '<div class="container"><div class="row"><div class="col-md-6">';
   	echo '<img height="500px" width="500px" src="'.$petdetails['Image'].'"><br>';
   	echo '</div> <div class="col-md-6">';
   	echo "<h3>";
   echo 'ID : '.$petdetails['Animal_ID'].'<br>';
   echo 'Name: '.$petdetails['Animal_Name'].'<br>';
   echo 'Type: '.$petdetails['animal_type'].'<br>';
   echo 'Gender: '.$petdetails['Animal_Gender'].'<br>';
   echo 'Breed: '.$petdetails['Animal_Breed'].'<br>';
   echo 'Color: '.$petdetails['Animal_Color'].'<br>';
   echo 'Address: '.$petdetails['Address'].'<br>';
	echo "</h3>";



echo '</div></div></div>';
?>

</body>
</html>
