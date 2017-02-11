<!DOCTYPE html>
<html>
<head>
	<title>Petopedia</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post">
  <input type="text" name="fname"><br>

<select name="formGender">
  <option value="Animal_ID">ID</option>
  <option value="Animal_Name">Name</option>
  <option value="animal_type">Type</option>
  <option value="Animal_Gender">Gender</option>
  <option value="Animal_Breed">Breed</option>
  <option value="Animal_Color">Color</option>
  <option value="Address">Address</option>
</select>

  <input type="submit" value="Submit">
</form>
<?php

// Create connection
/************** CREATE DATABASE CONNECTION **************/

	// define connection constants
	defined('db_host')? null : define("db_host", "fdb13.awardspace.net") ;
	defined('db_user')? null : define("db_user", "2161185_petdb") ;
  defined('db_pass')? null : define("db_pass", "Runescape12") ;
	defined('db_name')? null : define("db_name", "2161185_petdb") ;


	//database connection proccess
	$conn = mysqli_connect(db_host , db_user , db_pass, db_name);

	// database connection success check

	if (mysqli_connect_errno()) {
		die("Database connection failed." . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")");
	}
?>

<?php

	if ($_POST) {
		$result = mysqli_query($conn,"SELECT * FROM pets WHERE ". $_POST['formGender'] . "='" .$_POST['fname']."'" );
	}else {
		$result = mysqli_query($conn,"SELECT * FROM pets");
	}



    echo "<table >
    <tr>
    <th>Pet ID</th>
    <th>Name</th>
    <th>Type</th>
    <th>Gender</th>
    <th>Breed</th>
    <th>Color</th>
    <th>Address</th>
    </tr>";

    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Animal_ID'] . "</td>";
    echo "<td>" . $row['Animal_Name'] . "</td>";
    echo "<td>" . $row['animal_type'] . "</td>";
    echo "<td>" . $row['Animal_Gender'] . "</td>";
    echo "<td>" . $row['Animal_Breed'] . "</td>";
    echo "<td>" . $row['Animal_Color'] . "</td>";
    echo "<td>" . $row['Address'] . "</td>";
    echo "<td><a href='petdetails.php?id=".$row['Animal_ID']."'>View pet</td>";

    echo "</tr>";
    }

echo "</table>";

mysqli_close($conn);
?>


</body>
</html>
