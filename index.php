<!DOCTYPE html>
<html>
<head>
	<title>Petopedia</title>
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
 <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Petopedia</h1>
                        <p class="intro-text">Pet adoption Catalogue<p>
                        <form method="post">
						  <input type="text" name="fname" style="color: black; height: 30px; width:300px;"><br>

						<select name="formGender" style="color: black; height: 30px; width:150px;">
						  <option value="Animal_ID">ID</option>
						  <option value="Animal_Name">Name</option>
						  <option value="animal_type">Type</option>
						  <option value="Animal_Gender">Gender</option>
						  <option value="Animal_Breed">Breed</option>
						  <option value="Animal_Color">Color</option>
						  <option value="Address">Address</option>
						</select>

						  <input type="submit" value="Submit" style="color: black; height: 30px; width:150px;" href="#pets">
						</form>
                        <a href="#pets">
                        View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
<div id="pets"></div>
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
